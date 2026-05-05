<?php
$saleGames = getOnSaleGames();
$dealOfDay = $saleGames[0] ?? null;
?>

<?php if ($dealOfDay): ?>
<?php $dealPrice = $dealOfDay['price'] * (1 - $dealOfDay['discount'] / 100); ?>
<div class="card" style="padding:20px;margin-bottom:24px;display:flex;align-items:center;gap:24px">
    <div style="width:120px;height:80px;background:var(--bg-secondary);flex-shrink:0;display:flex;align-items:center;justify-content:center;color:var(--text-secondary);font-size:12px">No Image</div>
    <div style="flex:1">
        <p class="text-secondary text-sm" style="margin-bottom:4px;text-transform:uppercase;letter-spacing:1px">Deal of the Day</p>
        <p class="text-white" style="font-size:18px;font-weight:700;margin-bottom:4px"><?= htmlspecialchars($dealOfDay['title']) ?></p>
        <p class="text-secondary text-sm"><?= htmlspecialchars($dealOfDay['genre']) ?></p>
    </div>
    <div style="text-align:right;flex-shrink:0">
        <div class="flex-gap" style="justify-content:flex-end;margin-bottom:8px">
            <span class="price-discount" style="font-size:14px;padding:4px 10px">-<?= $dealOfDay['discount'] ?>%</span>
            <span class="price-tag" style="font-size:18px">Rp <?= number_format($dealPrice, 0, ',', '.') ?></span>
        </div>
        <a href="#" class="btn btn-green">Add to Cart</a>
    </div>
</div>
<?php endif; ?>

<h2 class="section-title">All Deals</h2>
<div class="grid-4">
    <?php foreach ($saleGames as $game): ?>
    <?php $discounted = $game['price'] * (1 - $game['discount'] / 100); ?>
    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= htmlspecialchars($game['genre']) ?></p>
            <div class="game-card-price">
                <span class="price-discount">-<?= $game['discount'] ?>%</span>
                <span class="price-tag">Rp <?= number_format($discounted, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
