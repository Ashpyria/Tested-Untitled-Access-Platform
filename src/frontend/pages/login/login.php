<?php
require_once __DIR__ . '/../../../backend/helpers/auth.php';
require_once __DIR__ . '/../../../backend/models/User.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Email dan password wajib diisi.';
    } else {
        $user = getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            loginUser($user);
            header('Location: ' . ($user['role'] === 'admin' ? '/admin/' : '/?page=store'));
            exit;
        } else {
            $error = 'Email atau password salah.';
        }
    }
}
?>

<div class="flex-center" style="min-height:60vh">
    <div class="card" style="width:100%;max-width:420px;padding:32px">

        <h1 class="page-title" style="text-align:center;border:none;margin-bottom:8px">Login</h1>
        <p class="text-secondary text-sm" style="text-align:center;margin-bottom:24px">Masuk ke akun UAP kamu</p>

        <?php if ($error): ?>
        <div style="background:rgba(160,80,80,0.15);border:1px solid var(--danger);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--danger)"><?= htmlspecialchars($error) ?></p>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="email@contoh.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <p class="text-secondary text-sm" style="text-align:center;margin-top:16px">
            Belum punya akun? <a href="/?page=register">Register</a>
        </p>

    </div>
</div>
