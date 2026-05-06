<div class="grid-3">
    <?php foreach ($allAchievements as $ach): ?>
    <?php $unlocked = in_array($ach['id'], $unlockedIds); ?>
    <div class="card" style="padding:20px;text-align:center;<?= !$unlocked ? 'opacity:0.45' : '' ?>">
        <p class="text-white" style="font-weight:600;margin-bottom:4px"><?= htmlspecialchars($ach['name']) ?></p>
        <p class="text-secondary text-sm" style="margin-bottom:8px"><?= htmlspecialchars($ach['description']) ?></p>
        <span class="tag <?= $rarityClass[$ach['rarity']] ?? '' ?>"><?= $ach['rarity'] ?></span>
        <?php if (!$unlocked): ?>
        <p class="text-secondary text-sm mt-8">Belum terbuka</p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>
