<div class="grid-3">
    <?php if (empty($guides)): ?>
    <div class="card" style="padding:40px;text-align:center;grid-column:1/-1">
        <p class="text-secondary">Belum ada guide.</p>
    </div>
    <?php else: ?>
    <?php foreach ($guides as $guide): ?>
    <div class="card" style="padding:20px">
        <p class="tag tag-accent" style="margin-bottom:8px"><?= htmlspecialchars($guide['game_title']) ?></p>
        <p class="text-white" style="font-weight:600;margin-bottom:8px"><?= htmlspecialchars($guide['title']) ?></p>
        <p class="text-secondary text-sm" style="margin-bottom:16px;line-height:1.7">
            <?= htmlspecialchars(substr($guide['content'], 0, 100)) ?>...
        </p>
        <div class="flex-between">
            <span class="text-secondary text-sm">by <span class="text-accent"><?= htmlspecialchars($guide['username']) ?></span></span>
            <span class="text-secondary text-sm"><?= number_format($guide['views']) ?> views</span>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
