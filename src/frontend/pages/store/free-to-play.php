<?php $freeGames = getFreeGames(); ?>

<h2 class="section-title">All Free to Play</h2>
<div class="grid-4">
    <?php foreach ($freeGames as $game): ?>
    <div class="card game-card">
        <div class="game-card-img">
            <?php if (!empty($game['image'])): ?>
                <img src="/uploads/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>" style="width:100%;height:100%;object-fit:cover">
            <?php else: ?>
                <span class="text-secondary" style="font-size:12px">No Image</span>
            <?php endif; ?>
        </div>
        <div class="game-card-body">
            <a href="/?page=game&id=<?= $game['id'] ?>" style="text-decoration:none">
                <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            </a>
            <p class="game-card-genre"><?= htmlspecialchars($game['genre']) ?></p>
            <div class="game-card-price">
                <div>
                    <span class="price-discount" style="background:rgba(74,138,90,0.15);color:var(--accent-green);border-color:rgba(74,138,90,0.3)">FREE</span>
                </div>
                <div>
                    <span class="price-free">Free</span>
                </div>
            </div>
            <div class="mt-8">
                <?php if (isLoggedIn()): ?>
                    <?php if (isInCart(getCurrentUser()['id'], $game['id'])): ?>
                        <a href="/?page=cart" class="btn btn-outline btn-sm btn-block">In Cart</a>
                    <?php else: ?>
                        <a href="/?action=add_to_cart&game_id=<?= $game['id'] ?>" class="btn btn-green btn-sm btn-block">Get Free</a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="/?page=login" class="btn btn-outline btn-sm btn-block">Login to Buy</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
