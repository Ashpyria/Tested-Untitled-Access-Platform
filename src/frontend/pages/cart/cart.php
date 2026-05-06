<?php
requireLogin();
$user_id = getCurrentUser()['id'];
$items   = getCartItems($user_id);
$total   = getCartTotal($items);
?>

<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Shopping Cart</h1>
    <a href="/?page=store" class="btn btn-outline btn-sm">+ Add More Games</a>
</div>

<?php if (empty($items)): ?>
<div class="card" style="padding:60px;text-align:center">
    <p class="text-secondary" style="margin-bottom:16px">Cart kamu kosong.</p>
    <a href="/?page=store" class="btn btn-primary">Browse Store</a>
</div>
<?php else: ?>

<div style="display:grid;grid-template-columns:1fr 360px;gap:24px;align-items:start">

    <!-- ITEMS -->
    <div style="display:flex;flex-direction:column;gap:8px">
        <?php foreach ($items as $item): ?>
        <?php $price = $item['discount'] > 0 ? $item['price'] * (1 - $item['discount'] / 100) : $item['price']; ?>
        <div class="card" style="padding:20px">
            <div class="flex-between">
                <div class="flex-gap" style="gap:16px">
                <div style="width:80px;height:60px;background:var(--bg-secondary);flex-shrink:0;border-radius:var(--radius-sm);overflow:hidden;display:flex;align-items:center;justify-content:center">
                    <?php if (!empty($item['image'])): ?>
                        <img src="/uploads/games/<?= htmlspecialchars($item['image']) ?>" style="width:100%;height:100%;object-fit:cover">
                    <?php else: ?>
                        <span class="text-secondary" style="font-size:11px">No Image</span>
                    <?php endif; ?>
                </div>
                    <div>
                        <p class="text-white" style="font-weight:600;margin-bottom:4px"><?= htmlspecialchars($item['title']) ?></p>
                        <div class="flex-gap mt-8">
                            <?php if ($item['discount'] > 0): ?>
                            <span class="price-discount">-<?= $item['discount'] ?>%</span>
                            <?php endif; ?>
                            <span class="price-tag">Rp <?= number_format($price, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
                <a href="/?action=remove_from_cart&game_id=<?= $item['game_id'] ?>" class="btn btn-danger btn-sm">Remove</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- ORDER SUMMARY -->
    <div class="card" style="padding:24px">
        <h2 class="section-title">Order Summary</h2>

        <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:16px">
            <?php foreach ($items as $item): ?>
            <?php $price = $item['discount'] > 0 ? $item['price'] * (1 - $item['discount'] / 100) : $item['price']; ?>
            <div class="flex-between">
                <span class="text-secondary text-sm"><?= htmlspecialchars($item['title']) ?></span>
                <span class="text-white text-sm">Rp <?= number_format($price, 0, ',', '.') ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <hr class="divider">

        <div class="flex-between mb-24">
            <span class="text-white" style="font-weight:700">Total</span>
            <span class="text-white" style="font-weight:800;font-size:18px">Rp <?= number_format($total, 0, ',', '.') ?></span>
        </div>

        <a href="/?action=checkout" class="btn btn-green btn-lg btn-block">Checkout</a>
        <a href="/?page=store" class="btn btn-outline btn-block mt-8">Lanjut Belanja</a>
    </div>

</div>
<?php endif; ?>
