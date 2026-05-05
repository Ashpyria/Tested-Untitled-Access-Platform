<?php $games = getFeaturedGames(); ?>

<div class="grid-4">
    <?php foreach ($games as $game): ?>
    <?php $discounted = $game['discount'] > 0 ? $game['price'] * (1 - $game['discount'] / 100) : null; ?>

    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= htmlspecialchars($game['genre']) ?></p>
            <div class="game-card-price">
                <?php if ($discounted): ?>
                    <span class="price-discount">-<?= $game['discount'] ?>%</span>
                    <span class="price-tag">Rp <?= number_format($discounted, 0, ',', '.') ?></span>
                <?php else: ?>
                    <span class="price-tag">Rp <?= number_format($game['price'], 0, ',', '.') ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
</div>
