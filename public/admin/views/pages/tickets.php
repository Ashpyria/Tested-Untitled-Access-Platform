<?php
require_once __DIR__ . '/../../../../src/backend/models/Support.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_status') {
        updateTicketStatus((int)$_POST['ticket_id'], $_POST['status']);
    }
    if ($_POST['action'] === 'delete_ticket') {
        deleteTicket((int)$_POST['ticket_id']);
    }
    header('Location: /admin/?page=tickets');
    exit;
}

$tickets = getAllTickets();

$statusColors = [
    'open'        => ['bg' => 'rgba(99,102,241,0.15)', 'color' => '#a5b4fc'],
    'in_progress' => ['bg' => 'rgba(234,179,8,0.15)',  'color' => '#fde047'],
    'closed'      => ['bg' => 'rgba(34,197,94,0.15)',  'color' => '#86efac'],
];
?>

<div class="admin-page-header">
    <h1 class="admin-page-title">Support Tickets</h1>
    <span style="color:var(--text-secondary);font-size:14px"><?= count($tickets) ?> total tickets</span>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $t): ?>
            <?php $sc = $statusColors[$t['status']] ?? $statusColors['open']; ?>
            <tr>
                <td style="color:var(--text-secondary)">#<?= $t['id'] ?></td>
                <td><?= htmlspecialchars($t['name']) ?></td>
                <td style="color:var(--text-secondary);font-size:13px"><?= htmlspecialchars($t['email']) ?></td>
                <td style="font-size:13px"><?= htmlspecialchars($t['category']) ?></td>
                <td style="max-width:200px">
                    <p style="font-size:13px;color:var(--text-secondary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:200px"
                       title="<?= htmlspecialchars($t['message']) ?>">
                        <?= htmlspecialchars($t['message']) ?>
                    </p>
                </td>
                <td>
                    <span style="padding:2px 10px;border-radius:99px;font-size:12px;font-weight:600;
                          background:<?= $sc['bg'] ?>;color:<?= $sc['color'] ?>">
                        <?= ucfirst(str_replace('_', ' ', $t['status'])) ?>
                    </span>
                </td>
                <td style="color:var(--text-secondary);font-size:13px"><?= date('d M Y', strtotime($t['created_at'])) ?></td>
                <td>
                    <div style="display:flex;gap:8px;align-items:center">
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="action" value="update_status">
                            <input type="hidden" name="ticket_id" value="<?= $t['id'] ?>">
                            <select name="status" onchange="this.form.submit()"
                                    style="padding:4px 8px;background:var(--bg-secondary);border:1px solid var(--border);color:var(--text-white);border-radius:var(--radius-sm);font-size:12px;cursor:pointer">
                                <option value="open"        <?= $t['status'] === 'open'        ? 'selected' : '' ?>>Open</option>
                                <option value="in_progress" <?= $t['status'] === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                                <option value="closed"      <?= $t['status'] === 'closed'      ? 'selected' : '' ?>>Closed</option>
                            </select>
                        </form>
                        <form method="POST" style="display:inline"
                              onsubmit="return confirm('Hapus ticket ini?')">
                            <input type="hidden" name="action" value="delete_ticket">
                            <input type="hidden" name="ticket_id" value="<?= $t['id'] ?>">
                            <button type="submit" class="admin-btn admin-btn-danger" style="font-size:12px;padding:4px 10px">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($tickets)): ?>
            <tr>
                <td colspan="8" style="text-align:center;color:var(--text-secondary);padding:40px">
                    Belum ada support ticket.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
