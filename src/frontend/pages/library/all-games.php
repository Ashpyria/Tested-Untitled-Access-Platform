<?php if (empty($games)): ?>
<div class="card" style="padding:40px;text-align:center">
    <p class="text-secondary">Library kamu kosong. <a href="/?page=store">Beli game di Store</a></p>
</div>
<?php else: ?>
<div class="grid-4">
    <?php foreach ($games as $game): ?>
    <div class="card game-card">
        <div class="game-card-img">
            <?php if (!empty($game['image'])): ?>
                <img src="/uploads/games/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>" style="width:100%;height:100%;object-fit:cover">
            <?php else: ?>
                <span class="text-secondary" style="font-size:12px">No Image</span>
            <?php endif; ?>
        </div>

        <div class="game-card-body">
            <div class="flex-between">
                <p class="game-card-title" style="margin-bottom:0"><?= htmlspecialchars($game['title']) ?></p>
                <a href="/?action=favorite&game_id=<?= $game['id'] ?>&filter=<?= $filter ?>"
                   title="<?= $game['is_favorite'] ? 'Remove from Favorites' : 'Add to Favorites' ?>"
                   style="color:<?= $game['is_favorite'] ? '#b8a060' : 'var(--text-secondary)' ?>;font-size:16px">
                   <?= $game['is_favorite'] ? '★' : '☆' ?>
                </a>
            </div>
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
