<?php
$game_id = (int)($_GET['id'] ?? 0);
$game    = $game_id ? getGameById($game_id) : null;

if (!$game) {
    header('Location: /?page=store');
    exit;
}

$discounted = $game['discount'] > 0 ? $game['price'] * (1 - $game['discount'] / 100) : null;
$reviews    = getAllReviews();
$gameReviews = array_filter($reviews, fn($r) => $r['game_id'] === $game['id']);
$inCart     = isLoggedIn() ? isInCart(getCurrentUser()['id'], $game['id']) : false;
$inLibrary  = false;
if (isLoggedIn()) {
    require_once __DIR__ . '/../../../backend/models/Library.php';
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM library WHERE user_id = ? AND game_id = ?');
    $stmt->execute([getCurrentUser()['id'], $game['id']]);
    $inLibrary = (bool)$stmt->fetch();
}
?>

<!-- BACK BUTTON -->
<div style="margin-bottom:20px">
    <a href="javascript:history.back()" class="btn btn-outline btn-sm">← Back</a>
</div>

<!-- GAME HEADER -->
<div class="card" style="padding:32px;margin-bottom:24px">
    <div class="grid-2" style="gap:32px;align-items:start">

        <!-- Cover Image -->
        <div style="background:var(--bg-secondary);border:1px solid var(--border);border-radius:var(--radius);aspect-ratio:16/9;overflow:hidden;display:flex;align-items:center;justify-content:center">
            <?php if (!empty($game['image'])): ?>
                <img src="/uploads/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>" style="width:100%;height:100%;object-fit:cover">
            <?php else: ?>
                <span class="text-secondary">No Image</span>
            <?php endif; ?>
        </div>

        <!-- Info -->
        <div>
            <div style="display:flex;gap:8px;margin-bottom:12px;flex-wrap:wrap">
                <span class="tag"><?= htmlspecialchars($game['genre']) ?></span>
                <?php if ($game['is_free']): ?>
                    <span class="tag tag-green">Free to Play</span>
                <?php endif; ?>
                <?php if ($game['discount'] > 0): ?>
                    <span class="tag tag-danger">-<?= $game['discount'] ?>% OFF</span>
                <?php endif; ?>
            </div>

            <h1 style="font-size:26px;font-weight:800;color:var(--text-white);margin-bottom:8px">
                <?= htmlspecialchars($game['title']) ?>
            </h1>

            <p class="text-secondary" style="font-size:14px;line-height:1.7;margin-bottom:20px">
                <?= htmlspecialchars($game['description'] ?? 'Tidak ada deskripsi tersedia.') ?>
            </p>

            <!-- Price -->
            <div style="margin-bottom:20px">
                <?php if ($game['is_free']): ?>
                    <span style="font-size:24px;font-weight:800;color:var(--success)">Free to Play</span>
                <?php elseif ($discounted): ?>
                    <div style="display:flex;align-items:center;gap:12px">
                        <span style="font-size:14px;color:var(--text-secondary);text-decoration:line-through">
                            Rp <?= number_format($game['price'], 0, ',', '.') ?>
                        </span>
                        <span style="font-size:24px;font-weight:800;color:var(--text-white)">
                            Rp <?= number_format($discounted, 0, ',', '.') ?>
                        </span>
                    </div>
                <?php else: ?>
                    <span style="font-size:24px;font-weight:800;color:var(--text-white)">
                        Rp <?= number_format($game['price'], 0, ',', '.') ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Action Button -->
            <?php if ($inLibrary): ?>
                <a href="/?page=library" class="btn btn-outline" style="width:100%;text-align:center">
                    Already in Library
                </a>
            <?php elseif (isLoggedIn()): ?>
                <?php if ($inCart): ?>
                    <a href="/?page=cart" class="btn btn-outline" style="width:100%;text-align:center">In Cart</a>
                <?php else: ?>
                    <a href="/?action=add_to_cart&game_id=<?= $game['id'] ?>" class="btn btn-primary" style="width:100%;text-align:center">
                        <?= $game['is_free'] ? 'Get Free' : 'Add to Cart' ?>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="/?page=login" class="btn btn-outline" style="width:100%;text-align:center">Login to Buy</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- GAME INFO -->
<div class="grid-2" style="gap:24px;margin-bottom:24px;align-items:start">

    <!-- System Requirements -->
    <div class="card" style="padding:24px">
        <h2 class="section-title">System Requirements</h2>
        <div style="display:flex;flex-direction:column;gap:10px">
            <div class="flex-between">
                <span class="text-secondary text-sm">OS</span>
                <span class="text-white text-sm">Windows 10/11 64-bit</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Processor</span>
                <span class="text-white text-sm">Intel Core i5 / AMD Ryzen 5</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Memory</span>
                <span class="text-white text-sm">8 GB RAM</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Graphics</span>
                <span class="text-white text-sm">GTX 1060 / RX 580</span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Storage</span>
                <span class="text-white text-sm">20 GB available</span>
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
                        ★ <?= $review['rating'] ?>/5
                    </span>
                </div>
                <p class="text-secondary text-sm" style="line-height:1.7"><?= htmlspecialchars($review['content']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
