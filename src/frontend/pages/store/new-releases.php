<?php $newGames = getNewReleases(); ?>

<h2 class="section-title">Recently Released</h2>
<div class="grid-4">
    <?php foreach ($newGames as $game): ?>
    <?php $discounted = $game['discount'] > 0 ? $game['price'] * (1 - $game['discount'] / 100) : null; ?>
    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= htmlspecialchars($game['genre']) ?></p>
            <div class="game-card-price" style="justify-content:space-between">
                <?php if ($game['is_free']): ?>
                    <span class="price-free">Free to Play</span>
                <?php elseif ($discounted): ?>
                    <span class="price-discount">-<?= $game['discount'] ?>%</span>
                    <span class="price-tag">Rp <?= number_format($discounted, 0, ',', '.') ?></span>
                <?php else: ?>
                    <span class="price-tag">Rp <?= number_format($game['price'], 0, ',', '.') ?></span>
                <?php endif; ?>
                <span class="tag tag-green" style="font-size:10px">New</span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
