<?php if (empty($games)): ?>
<div class="card" style="padding:40px;text-align:center">
    <p class="text-secondary">Tidak ada game di kategori ini.</p>
</div>
<?php else: ?>
<h2 class="section-title"><?= htmlspecialchars($_GET['genre'] ?? '') ?></h2>
<div class="grid-4">
    <?php foreach ($games as $game): ?>
    <div class="card game-card">
        <div class="game-card-img">No Image</div>
        <div class="game-card-body">
            <p class="game-card-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-card-genre"><?= $game['hours_played'] ?> hours played</p>
            <div class="flex-between mt-8">
                <?php if ($game['is_installed']): ?>
                    <span class="tag tag-green">Installed</span>
                    <a href="#" class="btn btn-green btn-sm">Play</a>
                <?php else: ?>
                    <span class="tag">Not Installed</span>
                    <a href="#" class="btn btn-outline btn-sm">Install</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
