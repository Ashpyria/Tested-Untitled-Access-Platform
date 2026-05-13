<?php
requireLogin();
$user_id        = getCurrentUser()['id'];
$tab            = $_GET['tab']    ?? 'all';
$search         = trim($_GET['q'] ?? '');
$totalGames     = getLibraryCount($user_id);
$totalHours     = getTotalHours($user_id);
$totalInstalled = getInstalledCount($user_id);
$totalFavorites = getFavoriteCount($user_id);
$recentGames    = getRecentlyPlayed($user_id, 5);

switch ($tab) {
    case 'installed':     $games = getInstalledGames($user_id);    break;
    case 'not-installed': $games = getNotInstalledGames($user_id); break;
    case 'favorites':     $games = getFavoriteGames($user_id);     break;
    default:              $tab = 'all'; $games = getUserLibrary($user_id); break;
}

if ($search) {
    $q = strtolower($search);
    $games = array_filter($games, fn($g) =>
        str_contains(strtolower($g['title']), $q) ||
        str_contains(strtolower($g['genre']), $q)
    );
}
?>

<!-- ===================== HEADER ===================== -->
<div class="lib-header">
    <div class="lib-header-left">
        <h1 class="lib-title">My Library</h1>
        <p class="lib-subtitle">
            <?= $totalGames ?> game<?= $totalGames != 1 ? 's' : '' ?> &middot;
            <?= number_format($totalHours) ?> hours logged across all titles
        </p>
    </div>
    <div class="lib-header-stats">
        <div class="lib-stat">
            <span class="lib-stat-val"><?= number_format($totalGames) ?></span>
            <span class="lib-stat-lbl">Games</span>
        </div>
        <div class="lib-stat">
            <span class="lib-stat-val"><?= number_format($totalHours) ?></span>
            <span class="lib-stat-lbl">Hours</span>
        </div>
        <div class="lib-stat">
            <span class="lib-stat-val"><?= $totalFavorites ?></span>
            <span class="lib-stat-lbl">Favorites</span>
        </div>
        <div class="lib-stat">
            <span class="lib-stat-val"><?= $totalInstalled ?></span>
            <span class="lib-stat-lbl">Installed</span>
        </div>
    </div>
</div>

<!-- ===================== TABS ===================== -->
<div class="lib-tabs">
    <a href="/?page=library&tab=all<?= $search ? '&q='.urlencode($search) : '' ?>"
       class="lib-tab <?= $tab === 'all' ? 'active' : '' ?>">All Games</a>
    <a href="/?page=library&tab=installed<?= $search ? '&q='.urlencode($search) : '' ?>"
       class="lib-tab <?= $tab === 'installed' ? 'active' : '' ?>">Installed</a>
    <a href="/?page=library&tab=not-installed<?= $search ? '&q='.urlencode($search) : '' ?>"
       class="lib-tab <?= $tab === 'not-installed' ? 'active' : '' ?>">Not Installed</a>
    <a href="/?page=library&tab=favorites<?= $search ? '&q='.urlencode($search) : '' ?>"
       class="lib-tab <?= $tab === 'favorites' ? 'active' : '' ?>">Favorites</a>
</div>

<!-- ===================== TOOLBAR ===================== -->
<div class="lib-toolbar">
    <form method="GET" class="lib-search-form">
        <input type="hidden" name="page" value="library">
        <input type="hidden" name="tab" value="<?= htmlspecialchars($tab) ?>">
        <span class="lib-search-icon">&#9679;</span>
        <input type="text" name="q" value="<?= htmlspecialchars($search) ?>"
               placeholder="Search your library..." class="lib-search-input" autocomplete="off">
        <?php if ($search): ?>
        <a href="/?page=library&tab=<?= $tab ?>" class="lib-search-clear">&times;</a>
        <?php endif; ?>
    </form>
</div>

<?php if ($tab === 'all' && empty($search) && !empty($recentGames)): ?>
<!-- ===================== RECENTLY PLAYED ===================== -->
<div class="lib-section">
    <div class="lib-section-header">
        <span class="lib-section-title">Recently Played</span>
        <span class="lib-section-count"><?= count($recentGames) ?> titles</span>
    </div>
    <div class="lib-recent-row">
        <?php foreach ($recentGames as $rg):
            $initials = implode('', array_map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)),
                array_slice(explode(' ', $rg['title']), 0, 2)));
            $colors = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
            $color  = $colors[crc32($rg['title']) % count($colors)];
        ?>
        <a href="/?page=game&id=<?= $rg['id'] ?>" class="lib-recent-chip">
            <div class="lib-chip-icon" style="background:<?= $color ?>22;border-color:<?= $color ?>55">
                <span style="color:<?= $color ?>"><?= htmlspecialchars($initials) ?></span>
            </div>
            <div class="lib-chip-info">
                <span class="lib-chip-title"><?= htmlspecialchars(strtoupper($rg['title'])) ?></span>
                <span class="lib-chip-sub"><?= number_format($rg['hours_played'] ?? 0) ?> hrs played</span>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- ===================== GAME GRID ===================== -->
<div class="lib-section">
    <div class="lib-section-header">
        <span class="lib-section-title">
            <?php if ($tab === 'favorites'): ?>Favorites
            <?php elseif ($tab === 'installed'): ?>Installed
            <?php elseif ($tab === 'not-installed'): ?>Not Installed
            <?php else: ?>All Games<?php endif; ?>
        </span>
        <span class="lib-section-count"><?= count($games) ?> title<?= count($games) != 1 ? 's' : '' ?></span>
    </div>

    <?php if (empty($games)): ?>
    <div style="padding:48px;text-align:center;background:var(--bg-card);border:1px solid var(--border)">
        <?php if ($search): ?>
            <p class="text-secondary">No results for "<?= htmlspecialchars($search) ?>".</p>
        <?php elseif ($tab === 'favorites'): ?>
            <p class="text-secondary">No favorites yet. Click the star on any game.</p>
        <?php elseif ($tab === 'installed'): ?>
            <p class="text-secondary">No games installed.</p>
        <?php elseif ($tab === 'not-installed'): ?>
            <p class="text-secondary">All games are installed.</p>
        <?php else: ?>
            <p class="text-secondary">Library kosong. <a href="/?page=store">Browse the Store</a>.</p>
        <?php endif; ?>
    </div>
    <?php else: ?>
    <div class="lib-grid">
        <?php foreach ($games as $game): ?>
        <div class="lib-cover-card">
            <!-- Cover image -->
            <a href="/?page=game&id=<?= $game['id'] ?>" class="lib-cover-img">
                <?php if (!empty($game['image'])): ?>
                    <img src="/uploads/games/<?= htmlspecialchars($game['image']) ?>"
                         alt="<?= htmlspecialchars($game['title']) ?>">
                <?php else: ?>
                    <?php
                        $initials = implode('', array_map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)),
                            array_slice(explode(' ', $game['title']), 0, 2)));
                        $colors = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
                        $color  = $colors[crc32($game['title']) % count($colors)];
                    ?>
                    <div class="lib-cover-placeholder" style="background:linear-gradient(135deg,<?= $color ?>33,<?= $color ?>11)">
                        <span style="color:<?= $color ?>;font-size:32px;font-weight:900;font-family:'Monda',sans-serif"><?= $initials ?></span>
                    </div>
                <?php endif; ?>
                <div class="lib-cover-overlay"></div>
            </a>

            <!-- Bottom info -->
            <div class="lib-cover-info">
                <a href="/?page=game&id=<?= $game['id'] ?>" class="lib-cover-title"><?= htmlspecialchars($game['title']) ?></a>
                <div class="lib-cover-meta">
                    <span class="lib-cover-genre"><?= htmlspecialchars($game['genre']) ?></span>
                    <?php if (!empty($game['hours_played'])): ?>
                    <span class="lib-cover-hours"><?= number_format($game['hours_played']) ?>h</span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Favorite + status badges -->
            <div class="lib-cover-badges">
                <?php if ($game['is_installed'] ?? false): ?>
                <span class="lib-cover-badge-installed"></span>
                <?php endif; ?>
            </div>

            <!-- Fav button -->
            <a href="/?action=favorite&game_id=<?= $game['id'] ?>&tab=<?= $tab ?><?= $search ? '&q='.urlencode($search) : '' ?>"
               class="lib-cover-fav <?= ($game['is_favorite'] ?? false) ? 'active' : '' ?>"
               title="<?= ($game['is_favorite'] ?? false) ? 'Remove from Favorites' : 'Add to Favorites' ?>">
                <?= ($game['is_favorite'] ?? false) ? '&#9733;' : '&#9734;' ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
