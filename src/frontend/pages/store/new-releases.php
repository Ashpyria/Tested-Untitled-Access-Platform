<?php $newGames = getNewReleases(); ?>

<h2 class="section-title">Recently Released</h2>
<div class="grid-4">
    <?php foreach ($newGames as $game): ?>
    <?php $discounted = $game['discount'] > 0 ? $game['price'] * (1 - $game['discount'] / 100) : null; ?>
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
                <?php if ($game['is_free']): ?>
                    <span class="price-free">Free</span>
                <?php elseif ($discounted): ?>
                    <span class="price-discount">-<?= $game['discount'] ?>%</span>
                    <span class="price-tag">Rp <?= number_format($discounted, 0, ',', '.') ?></span>
                <?php else: ?>
                    <span class="price-tag">Rp <?= number_format($game['price'], 0, ',', '.') ?></span>
                <?php endif; ?>
                    <span class="tag tag-danger" style="font-size:10px">New</span>
            </div>
            <div class="mt-8">
                <?php if (isLoggedIn()): ?>
                    <?php if (isInCart(getCurrentUser()['id'], $game['id'])): ?>
                        <a href="/?page=cart" class="btn btn-outline btn-sm btn-block">In Cart</a>
                    <?php elseif ($game['is_free']): ?>
                        <a href="/?action=add_to_cart&game_id=<?= $game['id'] ?>" class="btn btn-green btn-sm btn-block">Get Free</a>
                    <?php else: ?>
                        <a href="/?action=add_to_cart&game_id=<?= $game['id'] ?>" class="btn btn-green btn-sm btn-block">Add to Cart</a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="/?page=login" class="btn btn-outline btn-sm btn-block">Login to Buy</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
