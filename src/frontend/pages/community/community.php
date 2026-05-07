<?php
// Handle POST actions before any output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoggedIn()) {
    $action = $_POST['action'] ?? '';

    if ($action === 'create_post') {
        $title    = trim($_POST['title'] ?? '');
        $content  = trim($_POST['content'] ?? '');
        $category = $_POST['category'] ?? 'General';
        if ($title && $content) {
            createPost(getCurrentUser()['id'], $title, $content, $category);
        }
        header('Location: /?page=community');
        exit;
    }

    if ($action === 'create_review') {
        $game_id = (int)($_POST['game_id'] ?? 0);
        $rating  = (int)($_POST['rating'] ?? 5);
        $content = trim($_POST['content'] ?? '');
        if ($game_id && $content) {
            createReview(getCurrentUser()['id'], $game_id, $rating, $content);
        }
        header('Location: /?page=community&tab=reviews');
        exit;
    }
}

$tab      = $_GET['tab'] ?? '';
$category = $_GET['category'] ?? null;
$stats    = getCommunityStats();

if ($tab === 'reviews') {
    $reviews   = getAllReviews();
    $userGames = isLoggedIn() ? getUserLibrary(getCurrentUser()['id']) : [];
} elseif ($tab === 'guides') {
    $guides = getAllGuides();
} else {
    $tab   = '';
    $posts = getAllPosts($category);
}

// Right sidebar data
$pdo = getDB();

// Top players by library hours
try {
    $topPlayers = $pdo->query('
        SELECT u.username, u.avatar, COALESCE(SUM(l.hours_played),0) as total_hours
        FROM users u
        LEFT JOIN library l ON l.user_id = u.id
        GROUP BY u.id, u.username, u.avatar
        ORDER BY total_hours DESC
        LIMIT 6
    ')->fetchAll();
} catch (Exception $e) { $topPlayers = []; }

// Top games for live activity (by library count)
try {
    $liveGames = $pdo->query('
        SELECT g.title, COUNT(l.id) as player_count
        FROM games g
        LEFT JOIN library l ON l.game_id = g.id
        GROUP BY g.id, g.title
        ORDER BY player_count DESC
        LIMIT 4
    ')->fetchAll();
    $maxPlayers = max(1, max(array_column($liveGames, 'player_count') ?: [1]));
} catch (Exception $e) { $liveGames = []; $maxPlayers = 1; }

// Trending: most reviewed games
try {
    $trending = $pdo->query('
        SELECT g.title, COUNT(r.id) as review_count
        FROM games g
        JOIN reviews r ON r.game_id = g.id
        GROUP BY g.id, g.title
        ORDER BY review_count DESC
        LIMIT 4
    ')->fetchAll();
} catch (Exception $e) { $trending = []; }

$barColors = ['var(--accent)', '#4a8a5a', '#6677aa', '#a08040'];
?>

<!-- HEADER -->
<div class="comm-header">
    <div>
        <h1 class="comm-title">Community</h1>
        <p class="comm-subtitle">Connect, share, and discuss with the UAP community. Reviews, guides, and more.</p>
    </div>
    <div style="display:flex;gap:8px;flex-shrink:0">
        <?php if (isLoggedIn()): ?>
        <a href="#" onclick="document.getElementById('compose-trigger')?.click();document.getElementById('compose-trigger')?.scrollIntoView({behavior:'smooth'});return false;"
           class="btn btn-primary btn-sm">+ New Post</a>
        <?php endif; ?>
        <a href="/?page=community" class="btn btn-outline btn-sm">Find Friends</a>
    </div>
</div>

<!-- TWO-COLUMN LAYOUT -->
<div class="comm-layout">

    <!-- MAIN COLUMN -->
    <div class="comm-main">

        <!-- TABS -->
        <div class="lib-tabs" style="margin-bottom:20px">
            <a href="/?page=community" class="lib-tab <?= $tab === '' ? 'active' : '' ?>">Feed</a>
            <a href="/?page=community&tab=reviews" class="lib-tab <?= $tab === 'reviews' ? 'active' : '' ?>">Reviews</a>
            <a href="/?page=community&tab=guides" class="lib-tab <?= $tab === 'guides' ? 'active' : '' ?>">Guides</a>
        </div>

        <!-- CONTENT -->
        <?php if ($tab === 'reviews'): ?>
            <?php include __DIR__ . '/reviews.php'; ?>
        <?php elseif ($tab === 'guides'): ?>
            <?php include __DIR__ . '/guides.php'; ?>
        <?php else: ?>
            <?php include __DIR__ . '/forum.php'; ?>
        <?php endif; ?>

    </div>

    <!-- RIGHT SIDEBAR -->
    <aside class="comm-sidebar">

        <!-- LIVE ACTIVITY -->
        <div class="comm-widget">
            <div class="comm-widget-header">
                <span style="display:flex;align-items:center"><span class="comm-live-dot"></span><span class="comm-widget-title">LIVE ACTIVITY</span></span>
            </div>
            <div class="comm-live-count"><?= number_format($stats['total_members']) ?></div>
            <div class="comm-live-label">REGISTERED MEMBERS</div>
            <div style="margin-top:16px;display:flex;flex-direction:column;gap:10px">
                <?php if (!empty($liveGames)): ?>
                <?php foreach ($liveGames as $i => $lg):
                    $pct = $maxPlayers > 0 ? round(($lg['player_count'] / $maxPlayers) * 100) : 0; ?>
                <div class="comm-activity-row">
                    <span class="comm-activity-name"><?= htmlspecialchars(mb_strtoupper(mb_substr($lg['title'], 0, 11))) ?><?= mb_strlen($lg['title']) > 11 ? '.' : '' ?></span>
                    <div class="comm-activity-bar-track">
                        <div class="comm-activity-bar-fill" style="width:<?= max(6, $pct) ?>%;background:<?= $barColors[$i] ?>"></div>
                    </div>
                    <span class="comm-activity-count"><?= $lg['player_count'] ?: '—' ?></span>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p style="font-family:'Monda',sans-serif;font-size:11px;color:var(--text-dim)">No library data yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- TOP PLAYERS -->
        <?php if (!empty($topPlayers)): ?>
        <div class="comm-widget">
            <div class="comm-widget-header">
                <span class="comm-widget-title">TOP PLAYERS</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:2px;margin-top:8px">
                <?php foreach ($topPlayers as $rank => $player):
                    $colors = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699','#5a7a9a'];
                    $color  = $colors[$rank % count($colors)];
                    $avatarFile = $player['avatar'] ?? null;
                    $hasAvatar  = $avatarFile && file_exists(__DIR__ . '/../../../../public/assets/images/avatars/' . $avatarFile);
                ?>
                <div class="comm-player-row">
                    <span class="comm-player-rank <?= $rank < 3 ? 'top' : '' ?>"><?= $rank + 1 ?></span>
                    <?php if ($hasAvatar): ?>
                    <img src="/assets/images/avatars/<?= htmlspecialchars($avatarFile) ?>"
                         class="comm-player-avatar" style="object-fit:cover;border-color:<?= $color ?>44">
                    <?php else: ?>
                    <div class="comm-player-avatar" style="background:<?= $color ?>22;border-color:<?= $color ?>44;color:<?= $color ?>">
                        <?= mb_strtoupper(mb_substr($player['username'], 0, 2)) ?>
                    </div>
                    <?php endif; ?>
                    <span class="comm-player-name"><?= htmlspecialchars($player['username']) ?></span>
                    <span class="comm-player-score"><?= number_format($player['total_hours']) ?> hrs</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- TRENDING -->
        <?php if (!empty($trending)): ?>
        <div class="comm-widget">
            <div class="comm-widget-header">
                <span class="comm-widget-title">TRENDING NOW</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:12px;margin-top:12px">
                <?php foreach ($trending as $i => $t): ?>
                <div>
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:2px">
                        <span style="font-size:11px;color:var(--text-dim);font-family:'Monda',sans-serif;width:14px"><?= $i + 1 ?></span>
                        <span style="font-family:'Monda',sans-serif;font-size:12px;font-weight:700;color:var(--text-primary)">#<?= htmlspecialchars(str_replace(' ', '', $t['title'])) ?></span>
                    </div>
                    <div style="padding-left:22px;font-family:'Monda',sans-serif;font-size:10px;color:var(--text-dim)"><?= $t['review_count'] ?> review<?= $t['review_count'] != 1 ? 's' : '' ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- COMMUNITY STATS -->
        <div class="comm-widget">
            <div class="comm-widget-header">
                <span class="comm-widget-title">COMMUNITY</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:10px;margin-top:10px">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-family:'Monda',sans-serif;font-size:11px;color:var(--text-secondary)">Total Posts</span>
                    <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:700;color:var(--text-primary)"><?= number_format($stats['total_posts']) ?></span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-family:'Monda',sans-serif;font-size:11px;color:var(--text-secondary)">Members</span>
                    <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:700;color:var(--text-primary)"><?= number_format($stats['total_members']) ?></span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <span style="font-family:'Monda',sans-serif;font-size:11px;color:var(--text-secondary)">Reviews</span>
                    <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:700;color:var(--text-primary)"><?= number_format($stats['total_reviews']) ?></span>
                </div>
            </div>
        </div>

    </aside>
</div>
