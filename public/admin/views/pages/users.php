<?php
$pdo = getDB();

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'update_role') {
            $uid  = (int)$_POST['user_id'];
            $role = $_POST['role'] === 'admin' ? 'admin' : 'user';
            $pdo->prepare('UPDATE users SET role = ? WHERE id = ?')->execute([$role, $uid]);
        }
        if ($_POST['action'] === 'delete_user') {
            $uid = (int)$_POST['user_id'];
            if ($uid !== (int)getCurrentUser()['id']) {
                $pdo->prepare('DELETE FROM users WHERE id = ?')->execute([$uid]);
            }
        }
    }
    header('Location: /?admin_page=users');
    exit;
}

// Search
$search = trim($_GET['search'] ?? '');
if ($search) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username LIKE ? OR email LIKE ? ORDER BY created_at DESC');
    $stmt->execute(["%$search%", "%$search%"]);
} else {
    $stmt = $pdo->query('SELECT * FROM users ORDER BY created_at DESC');
}
$users = $stmt->fetchAll();
$totalUsers = count($users);
?>

<div class="admin-page-header">
    <h1 class="admin-page-title">Users Management</h1>
    <span style="color:var(--text-secondary);font-size:14px"><?= $totalUsers ?> total users</span>
</div>

<!-- Search -->
<div class="admin-card" style="margin-bottom:20px">
    <form method="GET" style="display:flex;gap:12px;align-items:center">
        <input type="hidden" name="admin_page" value="users">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
               placeholder="Search by username or email..."
               style="flex:1;padding:8px 12px;background:var(--bg-secondary);border:1px solid var(--border);color:var(--text-white);border-radius:6px">
        <button type="submit" class="admin-btn admin-btn-primary">Search</button>
        <?php if ($search): ?>
            <a href="/?admin_page=users" class="admin-btn admin-btn-secondary">Clear</a>
        <?php endif; ?>
    </form>
</div>

<!-- Users Table -->
<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Country</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td style="color:var(--text-secondary)">#<?= $u['id'] ?></td>
                <td>
                    <div style="display:flex;align-items:center;gap:10px">
                        <img src="/assets/images/avatars/<?= htmlspecialchars($u['avatar'] ?? 'default.png') ?>"
                             alt="Avatar"
                             style="width:32px;height:32px;object-fit:cover;border-radius:50%;background:var(--bg-secondary)"
                             onerror="this.style.background='#333'">
                        <span><?= htmlspecialchars($u['username']) ?></span>
                    </div>
                </td>
                <td style="color:var(--text-secondary)"><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <span style="padding:2px 10px;border-radius:99px;font-size:12px;font-weight:600;
                          background:<?= $u['role'] === 'admin' ? 'rgba(99,102,241,0.15)' : 'rgba(255,255,255,0.05)' ?>;
                          color:<?= $u['role'] === 'admin' ? '#a5b4fc' : 'var(--text-secondary)' ?>">
                        <?= ucfirst($u['role'] ?? 'user') ?>
                    </span>
                </td>
                <td style="color:var(--text-secondary)"><?= htmlspecialchars($u['country'] ?? '-') ?></td>
                <td style="color:var(--text-secondary)"><?= date('d M Y', strtotime($u['created_at'])) ?></td>
                <td>
                    <div style="display:flex;gap:8px;align-items:center">
                        <!-- Toggle Role -->
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="action" value="update_role">
                            <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                            <input type="hidden" name="role" value="<?= $u['role'] === 'admin' ? 'user' : 'admin' ?>">
                            <button type="submit" class="admin-btn admin-btn-secondary" style="font-size:12px;padding:4px 10px"
                                    <?= $u['id'] == getCurrentUser()['id'] ? 'disabled title="Cannot change own role"' : '' ?>>
                                <?= $u['role'] === 'admin' ? 'Demote' : 'Make Admin' ?>
                            </button>
                        </form>
                        <!-- Delete -->
                        <form method="POST" style="display:inline"
                              onsubmit="return confirm('Delete user <?= htmlspecialchars($u['username'], ENT_QUOTES) ?>?')">
                            <input type="hidden" name="action" value="delete_user">
                            <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                            <button type="submit" class="admin-btn admin-btn-danger" style="font-size:12px;padding:4px 10px"
                                    <?= $u['id'] == getCurrentUser()['id'] ? 'disabled title="Cannot delete yourself"' : '' ?>>
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($users)): ?>
            <tr>
                <td colspan="7" style="text-align:center;color:var(--text-secondary);padding:40px">
                    No users found.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
