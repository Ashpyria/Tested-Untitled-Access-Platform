<?php
$pdo        = getDB();
$totalUsers = $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$totalGames = $pdo->query('SELECT COUNT(*) FROM games')->fetchColumn();
$totalOrders = $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$totalRevenue = $pdo->query('SELECT COALESCE(SUM(total), 0) FROM orders WHERE status = "paid"')->fetchColumn();
$recentUsers = $pdo->query('SELECT id, username, email, created_at FROM users ORDER BY created_at DESC LIMIT 5')->fetchAll();
$recentGames = $pdo->query('SELECT id, title, genre, price FROM games ORDER BY created_at DESC LIMIT 5')->fetchAll();
?>

<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Dashboard</h1>
    <span class="text-secondary text-sm">Welcome, <?= htmlspecialchars(getCurrentUser()['username']) ?></span>
</div>

<!-- Stats -->
<div class="stats-row" style="margin-bottom:32px">
    <div class="stat-box">
        <p class="stat-value"><?= number_format($totalUsers) ?></p>
        <p class="stat-label">Total Users</p>
    </div>
    <div class="stat-box">
        <p class="stat-value"><?= number_format($totalGames) ?></p>
        <p class="stat-label">Total Games</p>
    </div>
    <div class="stat-box">
        <p class="stat-value"><?= number_format($totalOrders) ?></p>
        <p class="stat-label">Total Orders</p>
    </div>
    <div class="stat-box">
        <p class="stat-value">Rp <?= number_format($totalRevenue, 0, ',', '.') ?></p>
        <p class="stat-label">Revenue</p>
    </div>
</div>

<div class="grid-2" style="align-items:start">

    <!-- Recent Users -->
    <div>
        <div class="flex-between mb-16">
            <h2 class="section-title" style="margin:0">Recent Users</h2>
            <a href="/admin/?page=users" class="text-accent text-sm">View All</a>
        </div>
        <div style="display:flex;flex-direction:column;gap:8px">
            <?php foreach ($recentUsers as $u): ?>
            <div class="card" style="padding:12px 16px">
                <div class="flex-between">
                    <div>
                        <p class="text-white text-sm" style="font-weight:600"><?= htmlspecialchars($u['username']) ?></p>
                        <p class="text-secondary text-sm"><?= htmlspecialchars($u['email']) ?></p>
                    </div>
                    <span class="text-secondary text-sm"><?= date('d M Y', strtotime($u['created_at'])) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Recent Games -->
    <div>
        <div class="flex-between mb-16">
            <h2 class="section-title" style="margin:0">Recent Games</h2>
            <a href="/admin/?page=games" class="text-accent text-sm">View All</a>
        </div>
        <div style="display:flex;flex-direction:column;gap:8px">
            <?php foreach ($recentGames as $g): ?>
            <div class="card" style="padding:12px 16px">
                <div class="flex-between">
                    <div>
                        <p class="text-white text-sm" style="font-weight:600"><?= htmlspecialchars($g['title']) ?></p>
                        <p class="text-secondary text-sm"><?= htmlspecialchars($g['genre']) ?></p>
                    </div>
                    <span class="text-accent text-sm">Rp <?= number_format($g['price'], 0, ',', '.') ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
