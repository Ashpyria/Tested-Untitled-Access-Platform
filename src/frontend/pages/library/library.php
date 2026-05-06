<?php
requireLogin();
$user_id        = getCurrentUser()['id'];
$filter         = $_GET['filter'] ?? 'all';
$genre          = $_GET['genre'] ?? '';
$totalGames     = getLibraryCount($user_id);
$totalHours     = getTotalHours($user_id);
$totalInstalled = getInstalledCount($user_id);
$genres         = getLibraryGenres($user_id);
$totalFavorites = getFavoriteCount($user_id);


if ($filter === 'installed') {
    $games = getInstalledGames($user_id);
} elseif ($filter === 'not-installed') {
    $games = getNotInstalledGames($user_id);
} elseif ($filter === 'favorites') {
    $games = getFavoriteGames($user_id);
} elseif ($filter === 'genre' && $genre) {
    $games = getGamesByGenre($user_id, $genre);
} else {
    $filter = 'all';
    $games  = getUserLibrary($user_id);
}
?>

<div class="layout-sidebar">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <p class="sidebar-title">My Library</p>
        <nav class="sidebar-menu">
            <a href="/?page=library" class="sidebar-link <?= $filter === 'all' ? 'active' : '' ?>">All Games</a>
            <a href="/?page=library&filter=favorites" class="sidebar-link <?= $filter === 'favorites' ? 'active' : '' ?>">Favorites</a>
            <a href="/?page=library&filter=installed" class="sidebar-link <?= $filter === 'installed' ? 'active' : '' ?>">Installed</a>
            <a href="/?page=library&filter=not-installed" class="sidebar-link <?= $filter === 'not-installed' ? 'active' : '' ?>">Not Installed</a>
        </nav>

        <?php if (!empty($genres)): ?>
        <hr class="divider">
        <p class="sidebar-title">Categories</p>
        <nav class="sidebar-menu">
            <?php foreach ($genres as $g): ?>
            <a href="/?page=library&filter=genre&genre=<?= urlencode($g) ?>"
               class="sidebar-link <?= ($filter === 'genre' && $genre === $g) ? 'active' : '' ?>">
                <?= htmlspecialchars($g) ?>
            </a>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>
    </aside>

    <!-- MAIN CONTENT -->
    <div>

        <!-- Header -->
        <div class="flex-between mb-16">
            <h1 class="page-title" style="margin-bottom:0;border:none">My Games</h1>
        </div>

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-box">
                <p class="stat-value"><?= $totalGames ?></p>
                <p class="stat-label">Total Games</p>
            </div>
            <div class="stat-box">
                <p class="stat-value"><?= number_format($totalHours) ?></p>
                <p class="stat-label">Hours Played</p>
            </div>
            <div class="stat-box">
                <p class="stat-value"><?= $totalInstalled ?></p>
                <p class="stat-label">Installed</p>
            </div>
            <div class="stat-box">
                <p class="stat-value"><?= $totalFavorites ?></p>
                <p class="stat-label">Favorites</p>
            </div>
        </div>

        <!-- Content -->
        <?php
        if ($filter === 'favorites') {
            include __DIR__ . '/favorites.php';
        } elseif ($filter === 'genre') {
            include __DIR__ . '/by-genre.php';
        } elseif ($filter === 'installed') {
            include __DIR__ . '/installed.php';
        } elseif ($filter === 'not-installed') {
            include __DIR__ . '/not-installed.php';
        } else {
            include __DIR__ . '/all-games.php';
        }
        ?>

    </div>
</div>
