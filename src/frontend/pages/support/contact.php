<?php
$ticketSuccess = '';
$ticketError   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'send_ticket') {
    $name     = trim($_POST['ticket_name'] ?? '');
    $email    = trim($_POST['ticket_email'] ?? '');
    $category = trim($_POST['ticket_category'] ?? '');
    $message  = trim($_POST['ticket_message'] ?? '');

    if (empty($name) || empty($email) || empty($category) || empty($message)) {
        $ticketError = 'Semua field wajib diisi.';
    } else {
        $uid = isLoggedIn() ? getCurrentUser()['id'] : null;
        createTicket($uid, $name, $email, $category, $message);
        $ticketSuccess = 'Pesan berhasil dikirim! Tim kami akan menghubungi kamu segera.';
    }
}
?>

<div class="grid-2" style="align-items:start">
    <div class="card" style="padding:28px">
        <h2 class="section-title">Kirim Pesan</h2>

        <?php if ($ticketSuccess): ?>
        <div style="background:rgba(34,197,94,0.1);border:1px solid var(--success);border-radius:var(--radius-sm);padding:12px 16px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--success)"><?= htmlspecialchars($ticketSuccess) ?></p>
        </div>
        <?php endif; ?>

        <?php if ($ticketError): ?>
        <div style="background:rgba(239,68,68,0.1);border:1px solid var(--danger);border-radius:var(--radius-sm);padding:12px 16px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--danger)"><?= htmlspecialchars($ticketError) ?></p>
        </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="action" value="send_ticket">
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="ticket_name" class="form-input"
                       placeholder="Masukkan nama kamu"
                       value="<?= htmlspecialchars(isLoggedIn() ? getCurrentUser()['username'] : ($_POST['ticket_name'] ?? '')) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="ticket_email" class="form-input"
                       placeholder="email@contoh.com"
                       value="<?= htmlspecialchars(isLoggedIn() ? getCurrentUser()['email'] : ($_POST['ticket_email'] ?? '')) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Kategori Masalah</label>
                <select name="ticket_category" class="form-select">
                    <option value="">Pilih kategori...</option>
                    <option>Pembelian & Pembayaran</option>
                    <option>Instalasi & Download</option>
                    <option>Akun & Login</option>
                    <option>Refund</option>
                    <option>Masalah In-Game</option>
                    <option>Keamanan Akun</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Pesan</label>
                <textarea name="ticket_message" class="form-textarea" placeholder="Jelaskan masalah kamu secara detail..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
        </form>
    </div>

    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="card" style="padding:20px">
            <p class="text-white" style="font-weight:600;margin-bottom:6px">Live Chat</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Chat langsung dengan tim support kami. Tersedia setiap hari.</p>
            <p class="text-success text-sm">Online — Rata-rata respons 5 menit</p>
        </div>
        <div class="card" style="padding:20px">
            <p class="text-white" style="font-weight:600;margin-bottom:6px">Email Support</p>
            <p class="text-secondary text-sm" style="margin-bottom:4px">support@uap.id</p>
            <p class="text-secondary text-sm">Respons dalam 1x24 jam kerja</p>
        </div>
        <div class="card" style="padding:20px">
            <p class="text-white" style="font-weight:600;margin-bottom:6px">Jam Operasional</p>
            <p class="text-secondary text-sm">Senin — Jumat: 09.00 — 21.00 WIB</p>
            <p class="text-secondary text-sm">Sabtu — Minggu: 10.00 — 18.00 WIB</p>
        </div>
    </div>
</div>
