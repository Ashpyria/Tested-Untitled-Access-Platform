<?php
requireLogin();
require_once __DIR__ . '/../../../backend/models/User.php';

$user              = getCurrentUser();
$totalGames        = getLibraryCount($user['id']);
$totalHours        = getTotalHours($user['id']);
$totalFavorites    = getFavoriteCount($user['id']);
$totalAchievements = getAchievementCount($user['id']);
$joinDate          = date('F Y', strtotime($user['created_at']));
$recentlyPlayed    = getRecentlyPlayed($user['id'], 3);
$mostPlayed        = getMostPlayedGame($user['id']);
$achievements      = getUserAchievements($user['id']);
$allAchievements   = getAllAchievements();
$rarityClass       = ['Common' => 'tag-green', 'Rare' => 'tag-warning', 'Epic' => 'tag-accent', 'Legendary' => 'tag-danger'];
$unlockedIds       = array_column($achievements, 'id');

$profileError   = '';
$profileSuccess = '';
$passError      = '';
$passSuccess    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] === 'update_profile') {
        $username = trim($_POST['username'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $bio      = trim($_POST['bio'] ?? '');
        $country  = trim($_POST['country'] ?? '');
        if (empty($username) || empty($email)) {
            $profileError = 'Username dan email wajib diisi.';
        } else {
            updateProfile($user['id'], $username, $email, $bio, $country);
            $updated = getUserById($user['id']);
            loginUser($updated);
            $user           = $updated;
            $profileSuccess = 'Profil berhasil diperbarui.';
        }
    }

    if ($_POST['action'] === 'update_password') {
        $oldPass = $_POST['old_password'] ?? '';
        $newPass = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';
        if (!password_verify($oldPass, $user['password'])) {
            $passError = 'Password lama salah.';
        } elseif (strlen($newPass) < 8) {
            $passError = 'Password baru minimal 8 karakter.';
        } elseif ($newPass !== $confirm) {
            $passError = 'Konfirmasi password tidak cocok.';
        } else {
            updatePassword($user['id'], $newPass);
            $passSuccess = 'Password berhasil diperbarui.';
        }
    }

    if ($_POST['action'] === 'send_friend_request') {
        $friend_id = (int)($_POST['friend_id'] ?? 0);
        if ($friend_id > 0 && !isFriend($user['id'], $friend_id))
            sendFriendRequest($user['id'], $friend_id);
    }

    if ($_POST['action'] === 'accept_friend') {
        $friend_id = (int)($_POST['friend_id'] ?? 0);
        if ($friend_id > 0) acceptFriendRequest($user['id'], $friend_id);
    }

    if ($_POST['action'] === 'decline_friend') {
        $friend_id = (int)($_POST['friend_id'] ?? 0);
        if ($friend_id > 0) declineFriendRequest($user['id'], $friend_id);
    }
}

$searchQuery     = trim($_GET['search_user'] ?? '');
$searchResults   = $searchQuery ? searchUsers($searchQuery, $user['id']) : [];
$pendingRequests = getPendingRequests($user['id']);
$friends         = getUserFriends($user['id']);
$friendCount     = getFriendCount($user['id']);
?>

<!-- PROFILE HEADER CARD -->
<div class="card" style="padding:28px;margin-bottom:24px">
    <div class="flex-gap" style="align-items:flex-start;gap:24px">
        <div style="position:relative;flex-shrink:0">
            <img src="/assets/images/avatars/<?= htmlspecialchars($user['avatar'] ?? 'default.png') ?>"
                 alt="Avatar"
                 style="width:96px;height:96px;object-fit:cover;border:3px solid var(--accent);display:block;background:var(--bg-secondary)"
                 onerror="this.style.background='#242424'">
            <span style="position:absolute;bottom:4px;right:4px;width:16px;height:16px;background:var(--success);border:2px solid var(--bg-card);border-radius:50%"></span>
        </div>
        <div style="flex:1">
            <div class="flex-between" style="align-items:flex-start">
                <div>
                    <h1 style="font-size:22px;font-weight:800;color:var(--text-white);margin-bottom:4px"><?= htmlspecialchars($user['username']) ?></h1>
                    <p class="text-secondary text-sm"><?= htmlspecialchars($user['email']) ?> &bull; Bergabung sejak <?= $joinDate ?></p>
                    <div class="flex-gap mt-8">
                        <span class="tag tag-green">Online</span>
                        <span class="tag"><?= htmlspecialchars($user['country'] ?? 'Indonesia') ?></span>
                    </div>
                </div>
                <button class="btn btn-outline btn-sm" onclick="switchTab(this.closest('.page-wrapper').querySelector('.tab-btn:nth-child(4)'), 'tab-settings')">Edit Profile</button>
            </div>
            <?php if (!empty($user['bio'])): ?>
            <p class="text-secondary" style="margin-top:12px;font-size:13px;line-height:1.7"><?= htmlspecialchars($user['bio']) ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- STATS ROW -->
<div class="stats-row">
    <div class="stat-box"><p class="stat-value"><?= $totalGames ?></p><p class="stat-label">Games</p></div>
    <div class="stat-box"><p class="stat-value"><?= number_format($totalHours) ?></p><p class="stat-label">Hours Played</p></div>
    <div class="stat-box"><p class="stat-value"><?= $totalAchievements ?></p><p class="stat-label">Achievements</p></div>
    <div class="stat-box"><p class="stat-value"><?= $totalFavorites ?></p><p class="stat-label">Favorites</p></div>
    <div class="stat-box"><p class="stat-value"><?= $friendCount ?></p><p class="stat-label">Friends</p></div>
</div>

<!-- TABS -->
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab(this, 'tab-overview')">Overview</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-achievements')">Achievements</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-friends')">Friends</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-settings')">Settings</button>
</div>

<div id="tab-overview"      class="tab-content active"><?php include __DIR__ . '/overview.php'; ?></div>
<div id="tab-achievements"  class="tab-content">       <?php include __DIR__ . '/achievements.php'; ?></div>
<div id="tab-friends"       class="tab-content">       <?php include __DIR__ . '/friends.php'; ?></div>
<div id="tab-settings"      class="tab-content">       <?php include __DIR__ . '/settings.php'; ?></div>
