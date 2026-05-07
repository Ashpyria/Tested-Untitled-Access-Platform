<?php if (empty($guides)): ?>
<div class="card" style="padding:48px;text-align:center">
    <p class="text-secondary">No guides yet.</p>
</div>
<?php else: ?>
<div class="grid-3">
    <?php foreach ($guides as $guide): ?>
    <div class="card" style="padding:20px">
        <span class="tag tag-accent mb-8" style="display:inline-block"><?= htmlspecialchars($guide['game_title']) ?></span>
        <p class="text-white mb-8" style="font-weight:600;font-size:14px"><?= htmlspecialchars($guide['title']) ?></p>
        <p class="text-secondary text-sm mb-16" style="line-height:1.7">
            <?= htmlspecialchars(mb_substr($guide['content'], 0, 100)) ?>...
        </p>
        <div class="flex-between">
            <span class="text-secondary text-sm">by <span class="text-accent"><?= htmlspecialchars($guide['username']) ?></span></span>
            <span class="text-dim text-sm"><?= number_format($guide['views']) ?> views</span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
