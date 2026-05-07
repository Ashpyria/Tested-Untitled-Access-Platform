<?php
$pdo = getDB();

$totalUsers   = $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$totalGames   = $pdo->query('SELECT COUNT(*) FROM games')->fetchColumn();
$freeGames    = $pdo->query('SELECT COUNT(*) FROM games WHERE is_free = 1')->fetchColumn();
$onSaleGames  = $pdo->query('SELECT COUNT(*) FROM games WHERE discount > 0')->fetchColumn();

try {
    $totalOrders  = $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
    $totalRevenue = $pdo->query('SELECT COALESCE(SUM(total), 0) FROM orders WHERE status = "paid"')->fetchColumn();
} catch (Exception $e) {
    $totalOrders  = 0;
    $totalRevenue = 0;
}

$recentUsers = $pdo->query('SELECT id, username, email, role, created_at FROM users ORDER BY created_at DESC LIMIT 6')->fetchAll();
$recentGames = $pdo->query('SELECT id, title, genre, price, is_free, discount, image FROM games ORDER BY created_at DESC LIMIT 6')->fetchAll();
?>

<!-- Header -->
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:32px">
    <div>
        <h1 style="font-family:'Monda',sans-serif;font-size:24px;font-weight:900;color:var(--text-primary);margin-bottom:4px">Dashboard</h1>
        <p style="font-size:13px;color:var(--text-secondary)">Welcome back, <?= htmlspecialchars(getCurrentUser()['username']) ?></p>
    </div>
    <div style="font-size:12px;color:var(--text-dim);font-family:'Monda',sans-serif"><?= date('d F Y') ?></div>
</div>

<!-- Stat Cards -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:32px">

    <div style="background:var(--bg-card);border:1px solid var(--border);padding:20px 24px">
        <div style="font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--text-dim);font-family:'Monda',sans-serif;margin-bottom:10px">Total Users</div>
        <div style="font-size:32px;font-weight:900;color:var(--text-primary);font-family:'Monda',sans-serif;line-height:1"><?= number_format($totalUsers) ?></div>
        <a href="/admin/?page=users" style="font-size:11px;color:var(--accent);font-family:'Monda',sans-serif;margin-top:10px;display:inline-block">Manage Users</a>
    </div>

    <div style="background:var(--bg-card);border:1px solid var(--border);padding:20px 24px">
        <div style="font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--text-dim);font-family:'Monda',sans-serif;margin-bottom:10px">Total Games</div>
        <div style="font-size:32px;font-weight:900;color:var(--text-primary);font-family:'Monda',sans-serif;line-height:1"><?= number_format($totalGames) ?></div>
        <a href="/admin/?page=games" style="font-size:11px;color:var(--accent);font-family:'Monda',sans-serif;margin-top:10px;display:inline-block">Manage Games</a>
    </div>

    <div style="background:var(--bg-card);border:1px solid var(--border);padding:20px 24px">
        <div style="font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--text-dim);font-family:'Monda',sans-serif;margin-bottom:10px">On Sale</div>
        <div style="font-size:32px;font-weight:900;color:var(--accent);font-family:'Monda',sans-serif;line-height:1"><?= number_format($onSaleGames) ?></div>
        <span style="font-size:11px;color:var(--text-dim);font-family:'Monda',sans-serif;margin-top:10px;display:inline-block"><?= $freeGames ?> free to play</span>
    </div>

    <div style="background:var(--bg-card);border:1px solid var(--border);padding:20px 24px">
        <div style="font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--text-dim);font-family:'Monda',sans-serif;margin-bottom:10px">Revenue</div>
        <div style="font-size:24px;font-weight:900;color:var(--accent-green);font-family:'Monda',sans-serif;line-height:1">Rp <?= number_format($totalRevenue, 0, ',', '.') ?></div>
        <span style="font-size:11px;color:var(--text-dim);font-family:'Monda',sans-serif;margin-top:10px;display:inline-block"><?= number_format($totalOrders) ?> orders</span>
    </div>

</div>

<!-- Quick Actions -->
<div style="display:flex;gap:10px;margin-bottom:32px">
    <a href="/admin/?page=games" class="btn btn-primary btn-sm">+ Add Game</a>
    <a href="/admin/?page=users" class="btn btn-outline btn-sm">Manage Users</a>
    <a href="/admin/?page=tickets" class="btn btn-outline btn-sm">Support Tickets</a>
    <a href="/?page=store" class="btn btn-outline btn-sm" target="_blank">View Store</a>
</div>

<!-- Two columns: Recent Users + Recent Games -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:start">

    <!-- Recent Users -->
    <div style="background:var(--bg-card);border:1px solid var(--border)">
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between">
            <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:700;color:var(--text-primary)">Recent Users</span>
            <a href="/admin/?page=users" style="font-size:11px;color:var(--accent);font-family:'Monda',sans-serif">View All</a>
        </div>
        <?php foreach ($recentUsers as $u): ?>
        <div style="padding:12px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between">
            <div>
                <div style="font-size:13px;font-weight:600;color:var(--text-primary);font-family:'Monda',sans-serif"><?= htmlspecialchars($u['username']) ?></div>
                <div style="font-size:11px;color:var(--text-secondary);margin-top:2px"><?= htmlspecialchars($u['email']) ?></div>
            </div>
            <div style="display:flex;align-items:center;gap:8px">
                <?php if ($u['role'] === 'admin'): ?>
                <span style="font-size:9px;font-weight:700;font-family:'Monda',sans-serif;background:rgba(184,50,50,0.15);color:var(--accent);border:1px solid rgba(184,50,50,0.3);padding:2px 8px;letter-spacing:0.08em">ADMIN</span>
                <?php endif; ?>
                <span style="font-size:11px;color:var(--text-dim);font-family:'Monda',sans-serif"><?= date('d M', strtotime($u['created_at'])) ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Recent Games -->
    <div style="background:var(--bg-card);border:1px solid var(--border)">
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between">
            <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:700;color:var(--text-primary)">Recent Games</span>
            <a href="/admin/?page=games" style="font-size:11px;color:var(--accent);font-family:'Monda',sans-serif">View All</a>
        </div>
        <?php foreach ($recentGames as $g): ?>
        <div style="padding:12px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px">
            <!-- Thumbnail -->
            <div style="width:48px;height:32px;flex-shrink:0;background:var(--bg-hover);overflow:hidden">
                <?php if (!empty($g['image'])): ?>
                <img src="/uploads/games/<?= htmlspecialchars($g['image']) ?>" style="width:100%;height:100%;object-fit:cover">
                <?php else: ?>
                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center">
                    <span style="font-size:9px;color:var(--text-dim)">—</span>
                </div>
                <?php endif; ?>
            </div>
            <div style="flex:1;min-width:0">
                <div style="font-size:13px;font-weight:600;color:var(--text-primary);font-family:'Monda',sans-serif;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><?= htmlspecialchars($g['title']) ?></div>
                <div style="font-size:11px;color:var(--text-secondary);margin-top:2px"><?= htmlspecialchars($g['genre']) ?></div>
            </div>
            <div style="flex-shrink:0;text-align:right">
                <?php if ($g['is_free']): ?>
                    <span style="font-size:11px;font-weight:700;color:var(--accent-green);font-family:'Monda',sans-serif">FREE</span>
                <?php elseif ($g['discount'] > 0): ?>
                    <span style="font-size:9px;font-weight:700;background:rgba(74,138,90,0.15);color:var(--accent-green);padding:2px 6px;font-family:'Monda',sans-serif">-<?= $g['discount'] ?>%</span>
                <?php else: ?>
                    <span style="font-size:12px;font-weight:700;color:var(--text-primary);font-family:'Monda',sans-serif">Rp <?= number_format($g['price'], 0, ',', '.') ?></span>
                <?php endif; ?>
                <div style="margin-top:4px">
                    <a href="/admin/?page=games&edit=<?= $g['id'] ?>" style="font-size:10px;color:var(--accent);font-family:'Monda',sans-serif">Edit</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
