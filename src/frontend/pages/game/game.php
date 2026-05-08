<?php
$game_id = (int)($_GET['id'] ?? 0);
$game    = $game_id ? getGameById($game_id) : null;

if (!$game) {
    header('Location: /?page=store');
    exit;
}

$discounted = $game['discount'] > 0 ? $game['price'] * (1 - $game['discount'] / 100) : null;
$inCart     = isLoggedIn() ? isInCart(getCurrentUser()['id'], $game['id']) : false;
$inLibrary  = false;
if (isLoggedIn()) {
    require_once __DIR__ . '/../../../backend/models/Library.php';
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM library WHERE user_id = ? AND game_id = ?');
    $stmt->execute([getCurrentUser()['id'], $game['id']]);
    $inLibrary = (bool)$stmt->fetch();
}

// Load screenshots for gallery
$gameImages    = getGameImages($game_id);
$galleryImages = [];
if (!empty($gameImages)) {
    foreach ($gameImages as $img) {
        $galleryImages[] = '/uploads/games/' . $img['filename'];
    }
} elseif (!empty($game['image'])) {
    $galleryImages[] = '/uploads/games/' . $game['image'];
}

// Fetch reviews for this specific game
$gameReviews = [];
try {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT r.*, u.username
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        WHERE r.game_id = ?
        ORDER BY r.created_at DESC
    ');
    $stmt->execute([$game['id']]);
    $gameReviews = $stmt->fetchAll();
} catch (Exception $e) {
    $gameReviews = [];
}

// Review summary
$reviewCount = count($gameReviews);
$avgRating   = $reviewCount > 0 ? array_sum(array_column($gameReviews, 'rating')) / $reviewCount : 0;
if ($reviewCount === 0) {
    $reviewLabel = 'No Reviews Yet';
    $reviewColor = 'var(--text-dim)';
} elseif ($avgRating >= 4.5) {
    $reviewLabel = 'Overwhelmingly Positive';
    $reviewColor = '#4a8a5a';
} elseif ($avgRating >= 4.0) {
    $reviewLabel = 'Very Positive';
    $reviewColor = '#5a9a6a';
} elseif ($avgRating >= 3.5) {
    $reviewLabel = 'Mostly Positive';
    $reviewColor = '#7aaa5a';
} elseif ($avgRating >= 3.0) {
    $reviewLabel = 'Mixed';
    $reviewColor = '#b8882a';
} elseif ($avgRating >= 2.0) {
    $reviewLabel = 'Mostly Negative';
    $reviewColor = '#b85a2a';
} else {
    $reviewLabel = 'Overwhelmingly Negative';
    $reviewColor = 'var(--accent)';
}
?>

<!-- BACK BUTTON -->
<div style="margin-bottom:16px">
    <a href="javascript:history.back()" class="btn btn-outline btn-sm">← Back</a>
</div>

<!-- Title + Tags (standalone, above panels) -->
<div style="margin-bottom:16px">
    <div style="display:flex;gap:8px;margin-bottom:8px;flex-wrap:wrap;align-items:center">
        <span class="tag"><?= htmlspecialchars($game['genre']) ?></span>
        <?php if ($game['is_free']): ?><span class="tag tag-green">Free to Play</span><?php endif; ?>
        <?php if ($game['discount'] > 0): ?><span class="tag tag-danger">-<?= $game['discount'] ?>% OFF</span><?php endif; ?>
    </div>
    <h1 style="font-size:24px;font-weight:800;color:var(--text-white);margin:0"><?= htmlspecialchars($game['title']) ?></h1>
</div>

<!-- Two separate panels side by side -->
<div style="display:flex;gap:16px;align-items:stretch;margin-bottom:20px">

    <!-- LEFT PANEL: Gallery -->
    <div class="card" style="flex:1;min-width:0;padding:16px">
        <div style="aspect-ratio:16/9;overflow:hidden;border-radius:var(--radius-sm);margin-bottom:8px">
            <?php if (!empty($galleryImages)): ?>
                <img id="gallery-main" src="<?= htmlspecialchars($galleryImages[0]) ?>" alt="<?= htmlspecialchars($game['title']) ?>" style="width:100%;height:100%;object-fit:cover;display:block">
            <?php else: ?>
                <div style="width:100%;height:100%;background:var(--bg-secondary);display:flex;align-items:center;justify-content:center">
                    <span class="text-secondary">No Image</span>
                </div>
            <?php endif; ?>
        </div>
        <?php if (count($galleryImages) > 1): ?>
        <div style="display:flex;gap:5px;overflow-x:auto;padding-bottom:2px">
            <?php foreach ($galleryImages as $i => $src): ?>
            <div onclick="gallerySwitch(<?= $i ?>)" id="gthumb-<?= $i ?>"
                 style="flex-shrink:0;width:88px;height:56px;border-radius:3px;overflow:hidden;border:2px solid <?= $i === 0 ? 'var(--accent)' : 'transparent' ?>;cursor:pointer;transition:border-color .15s">
                <img src="<?= htmlspecialchars($src) ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block">
            </div>
            <?php endforeach; ?>
        </div>
        <script>
        var _gal = <?= json_encode($galleryImages) ?>;
        function gallerySwitch(i) {
            document.getElementById('gallery-main').src = _gal[i];
            for (var j = 0; j < _gal.length; j++) {
                document.getElementById('gthumb-' + j).style.borderColor = j === i ? 'var(--accent)' : 'transparent';
            }
        }
        </script>
        <?php endif; ?>

    </div>

    <!-- RIGHT COLUMN: Info + Review Summary -->
    <div style="width:420px;flex-shrink:0;display:flex;flex-direction:column;gap:16px;min-height:0">

    <!-- RIGHT PANEL: Info -->
    <div class="card" style="padding:20px;display:flex;flex-direction:column;gap:14px">

        <!-- Cover image -->
        <?php if (!empty($game['image'])): ?>
        <div style="aspect-ratio:16/9;overflow:hidden;border-radius:var(--radius-sm)">
            <img src="/uploads/games/<?= htmlspecialchars($game['image']) ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block">
        </div>
        <?php endif; ?>

        <!-- Short description -->
        <?php $shortDesc = trim($game['description'] ?? ''); ?>
        <?php if ($shortDesc): ?>
        <p class="text-secondary" style="font-size:12px;line-height:1.65;margin:0"><?= htmlspecialchars(mb_strlen($shortDesc) > 160 ? mb_substr($shortDesc, 0, 160) . '...' : $shortDesc) ?></p>
        <?php endif; ?>

        <div style="border-top:1px solid var(--border)"></div>

        <!-- Meta -->
        <div style="display:flex;flex-direction:column;gap:10px">
            <?php if (!empty($game['release_date'])): ?>
            <div>
                <div style="font-size:10px;text-transform:uppercase;letter-spacing:.07em;color:var(--text-dim);margin-bottom:2px">Release Date</div>
                <div class="text-white" style="font-size:12px"><?= date('d M, Y', strtotime($game['release_date'])) ?></div>
            </div>
            <?php endif; ?>
            <?php if (!empty($game['developer'])): ?>
            <div>
                <div style="font-size:10px;text-transform:uppercase;letter-spacing:.07em;color:var(--text-dim);margin-bottom:2px">Developer</div>
                <div class="text-white" style="font-size:12px"><?= htmlspecialchars($game['developer']) ?></div>
            </div>
            <?php endif; ?>
            <?php if (!empty($game['publisher'])): ?>
            <div>
                <div style="font-size:10px;text-transform:uppercase;letter-spacing:.07em;color:var(--text-dim);margin-bottom:2px">Publisher</div>
                <div class="text-white" style="font-size:12px"><?= htmlspecialchars($game['publisher']) ?></div>
            </div>
            <?php endif; ?>
        </div>

        <div style="border-top:1px solid var(--border)"></div>

        <!-- Price -->
        <div>
            <?php if ($game['is_free']): ?>
                <span style="font-size:20px;font-weight:800;color:var(--success)">Free to Play</span>
            <?php elseif ($discounted): ?>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
                    <span style="font-size:12px;color:var(--text-secondary);text-decoration:line-through">Rp <?= number_format($game['price'], 0, ',', '.') ?></span>
                    <span style="font-size:20px;font-weight:800;color:var(--text-white)">Rp <?= number_format($discounted, 0, ',', '.') ?></span>
                </div>
            <?php else: ?>
                <span style="font-size:20px;font-weight:800;color:var(--text-white)">Rp <?= number_format($game['price'], 0, ',', '.') ?></span>
            <?php endif; ?>
        </div>

        <!-- Action Button -->
        <?php if ($inLibrary): ?>
            <a href="/?page=library" class="btn btn-outline" style="text-align:center">Already in Library</a>
        <?php elseif (isLoggedIn()): ?>
            <?php if ($inCart): ?>
                <a href="/?page=cart" class="btn btn-outline" style="text-align:center">In Cart</a>
            <?php else: ?>
                <a href="/?action=add_to_cart&game_id=<?= $game['id'] ?>" class="btn btn-primary" style="text-align:center">
                    <?= $game['is_free'] ? 'Get Free' : 'Add to Cart' ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <a href="/?page=login" class="btn btn-outline" style="text-align:center">Login to Buy</a>
        <?php endif; ?>

    </div>

    <!-- REVIEW SUMMARY PANEL -->
    <div class="card" style="padding:24px;flex:1;display:flex;flex-direction:column;justify-content:flex-start;gap:14px">
        <div style="font-size:10px;text-transform:uppercase;letter-spacing:.07em;color:var(--text-dim)">User Reviews</div>
        <?php if ($reviewCount > 0):
            $pct = round(($avgRating / 5) * 100);
        ?>
        <div style="display:flex;align-items:baseline;gap:6px">
            <span style="font-size:36px;font-weight:800;color:var(--text-white);line-height:1"><?= number_format($avgRating, 1) ?></span>
            <span style="font-size:13px;color:var(--text-dim);font-weight:400">/ 5</span>
        </div>
        <div style="font-size:14px;font-weight:700;color:<?= $reviewColor ?>;line-height:1.3"><?= $reviewLabel ?></div>
        <div style="height:4px;background:var(--bg-secondary);border-radius:2px;overflow:hidden">
            <div style="height:100%;width:<?= $pct ?>%;background:<?= $reviewColor ?>;border-radius:2px"></div>
        </div>
        <div style="font-size:11px;color:var(--text-dim)"><?= $reviewCount ?> review<?= $reviewCount !== 1 ? 's' : '' ?></div>
        <?php else: ?>
        <div style="font-size:14px;font-weight:600;color:var(--text-dim)"><?= $reviewLabel ?></div>
        <div style="font-size:12px;color:var(--text-dim);line-height:1.5">Be the first to review this game.</div>
        <?php endif; ?>
    </div>

    </div><!-- end right column -->
</div>

<!-- ABOUT THIS GAME -->
<?php if (!empty(trim($game['description'] ?? ''))): ?>
<div class="card" style="padding:24px;margin-bottom:20px">
    <h2 class="section-title">About This Game</h2>
    <p class="text-secondary" style="font-size:14px;line-height:1.8;white-space:pre-wrap"><?= htmlspecialchars(trim($game['description'])) ?></p>
</div>
<?php endif; ?>

<!-- GAME INFO -->
<div class="grid-2" style="gap:20px;margin-bottom:20px;align-items:start">

    <!-- System Requirements -->
    <div class="card" style="padding:24px">
        <h2 class="section-title">System Requirements</h2>
        <div style="display:flex;flex-direction:column;gap:10px">
            <div class="flex-between">
                <span class="text-secondary text-sm">OS</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['req_os'] ?: '-') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Processor</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['req_processor'] ?: '-') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Memory</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['req_memory'] ?: '-') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Graphics</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['req_graphics'] ?: '-') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Storage</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['req_storage'] ?: '-') ?></span>
            </div>
        </div>
    </div>

    <!-- Game Details -->
    <div class="card" style="padding:24px">
        <h2 class="section-title">Game Details</h2>
        <div style="display:flex;flex-direction:column;gap:10px">
            <div class="flex-between">
                <span class="text-secondary text-sm">Genre</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['genre']) ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Developer</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['developer'] ?? 'Unknown') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Publisher</span>
                <span class="text-white text-sm"><?= htmlspecialchars($game['publisher'] ?? 'Unknown') ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Release Date</span>
                <span class="text-white text-sm">
                    <?= !empty($game['release_date']) ? date('d M Y', strtotime($game['release_date'])) : '-' ?>
                </span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Price</span>
                <span class="text-white text-sm">
                    <?= $game['is_free'] ? 'Free' : 'Rp ' . number_format($game['price'], 0, ',', '.') ?>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- REVIEWS -->
<div class="card" style="padding:24px">
    <h2 class="section-title">User Reviews</h2>
    <?php if (empty($gameReviews)): ?>
        <p class="text-secondary text-sm">Belum ada review untuk game ini.</p>
    <?php else: ?>
        <div style="display:flex;flex-direction:column;gap:16px">
            <?php foreach ($gameReviews as $review): ?>
            <div style="border-bottom:1px solid var(--border);padding-bottom:16px">
                <div class="flex-between" style="margin-bottom:6px">
                    <span class="text-white" style="font-weight:600"><?= htmlspecialchars($review['username']) ?></span>
                    <span class="tag <?= $review['rating'] >= 4 ? 'tag-green' : ($review['rating'] >= 3 ? 'tag-warning' : 'tag-danger') ?>">
                        <?= $review['rating'] ?>/5
                    </span>
                </div>
                <p class="text-secondary text-sm" style="line-height:1.7"><?= htmlspecialchars($review['content']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
