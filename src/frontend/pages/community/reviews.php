<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_review' && isLoggedIn()) {
    $game_id = (int)($_POST['game_id'] ?? 0);
    $rating  = (int)($_POST['rating'] ?? 5);
    $content = trim($_POST['content'] ?? '');
    if ($game_id && $content) {
        createReview(getCurrentUser()['id'], $game_id, $rating, $content);
        header('Location: /?page=community&tab=reviews');
        exit;
    }
}

$userGames = isLoggedIn() ? getUserLibrary(getCurrentUser()['id']) : [];
?>

<!-- Write Review Form -->
<?php if (isLoggedIn() && !empty($userGames)): ?>
<div class="card" style="padding:20px;margin-bottom:24px">
    <h2 class="section-title">Tulis Review</h2>
    <form method="POST">
        <input type="hidden" name="action" value="create_review">
        <div class="form-group">
            <label class="form-label">Game</label>
            <select name="game_id" class="form-select">
                <?php foreach ($userGames as $g): ?>
                <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['title']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Rating</label>
            <select name="rating" class="form-select">
                <?php for ($i = 5; $i >= 1; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?> / 5</option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Review</label>
            <textarea name="content" class="form-textarea" placeholder="Tulis reviewmu..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
<?php endif; ?>

<!-- Reviews List -->
<?php if (empty($reviews)): ?>
<div class="card" style="padding:40px;text-align:center">
    <p class="text-secondary">Belum ada review.</p>
</div>
<?php else: ?>
<div style="display:flex;flex-direction:column;gap:16px">
    <?php foreach ($reviews as $review): ?>
    <div class="card" style="padding:20px">
        <div class="flex-between mb-16">
            <div class="flex-gap">
                <div style="width:40px;height:40px;background:var(--bg-secondary);border:2px solid var(--accent);flex-shrink:0"></div>
                <div>
                    <p class="text-white" style="font-weight:600"><?= htmlspecialchars($review['username']) ?></p>
                    <p class="text-secondary text-sm">
                        <?= htmlspecialchars($review['game_title']) ?>
                        <?php if ($review['hours_played']): ?>
                        &bull; <?= $review['hours_played'] ?> jam dimainkan
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <p class="text-warning" style="font-weight:700"><?= $review['rating'] ?> / 5</p>
        </div>
        <p class="text-primary" style="line-height:1.8"><?= htmlspecialchars($review['content']) ?></p>
        <div class="flex-gap mt-16">
            <span class="text-secondary text-sm"><?= timeAgo($review['created_at']) ?></span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
