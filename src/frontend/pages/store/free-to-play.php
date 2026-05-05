<?php $freeGames = getFreeGames(); ?>

<h2 class="section-title">All Free to Play</h2>
<div class="grid-4">
    <?php foreach ($freeGames as $game): ?>
    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= htmlspecialchars($game['genre']) ?></p>
            <div class="game-card-price">
                <span class="price-free">Free to Play</span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
