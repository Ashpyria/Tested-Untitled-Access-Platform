<?php if (empty($games)): ?>
<div class="card" style="padding:40px;text-align:center">
    <p class="text-secondary">Semua game sudah terinstall.</p>
</div>
<?php else: ?>
<div class="grid-4">
    <?php foreach ($games as $game): ?>
    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= $game['hours_played'] ?> hours played</p>
            <div class="flex-between mt-8">
                <span class="tag">Not Installed</span>
                <a href="#" class="btn btn-outline btn-sm">Install</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
