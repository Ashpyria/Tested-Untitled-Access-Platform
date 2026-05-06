<?php
require_once __DIR__ . '/../../../backend/helpers/auth.php';
require_once __DIR__ . '/../../../backend/models/User.php';

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';

    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        $error = 'Semua field wajib diisi.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter.';
    } elseif ($password !== $confirm) {
        $error = 'Konfirmasi password tidak cocok.';
    } elseif (usernameExists($username)) {
        $error = 'Username sudah digunakan.';
    } elseif (emailExists($email)) {
        $error = 'Email sudah terdaftar.';
    } else {
        $id   = createUser($username, $email, $password);
        $user = getUserById($id);
        loginUser($user);
        header('Location: /?page=store');
        exit;
    }
}
?>

<div class="flex-center" style="min-height:60vh">
    <div class="card" style="width:100%;max-width:420px;padding:32px">

        <h1 class="page-title" style="text-align:center;border:none;margin-bottom:8px">Register</h1>
        <p class="text-secondary text-sm" style="text-align:center;margin-bottom:24px">Buat akun UAP baru</p>

        <?php if ($error): ?>
        <div style="background:rgba(160,80,80,0.15);border:1px solid var(--danger);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--danger)"><?= htmlspecialchars($error) ?></p>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" placeholder="username kamu" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="email@contoh.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="min. 8 karakter">
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="confirm" class="form-input" placeholder="ulangi password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
        </form>

        <p class="text-secondary text-sm" style="text-align:center;margin-top:16px">
            Sudah punya akun? <a href="/?page=login">Login</a>
        </p>

    </div>
</div>
