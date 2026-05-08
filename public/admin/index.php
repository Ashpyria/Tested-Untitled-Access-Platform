<?php
ob_start();
require_once __DIR__ . '/../../src/backend/helpers/auth.php';
require_once __DIR__ . '/../../src/backend/config/database.php';
startSession();

// Cek apakah user adalah admin
if (!isLoggedIn() || getCurrentUser()['role'] !== 'admin') {
    header('Location: /?page=login');
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
$allowed = ['dashboard', 'games', 'users', 'tickets'];
if (!in_array($page, $allowed)) $page = 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/assets/css/admin.css">
    <title>Admin — UAP</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
<?php include __DIR__ . '/views/layout/sidebar.php'; ?>
<main style="margin-left:220px;min-height:100vh;background:var(--bg-void);padding:32px">
    <?php include __DIR__ . '/views/pages/' . $page . '.php'; ?>
</main>
</body>
</html>
