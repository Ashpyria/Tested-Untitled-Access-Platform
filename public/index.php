<?php
// Router sederhana — baca parameter ?page= dari URL
$page = $_GET['page'] ?? 'store';

// Whitelist halaman yang diizinkan
$allowed_pages = ['store', 'library', 'community', 'support', 'profile', 'cart'];

// Kalau halaman tidak dikenal, redirect ke store
if (!in_array($page, $allowed_pages)) {
    $page = 'store';
}

// Set judul halaman sesuai page aktif
$titles = [
    'store'     => 'Store - Untitled Access Platform',
    'library'   => 'Library - Untitled Access Platform',
    'community' => 'Community - Untitled Access Platform',
    'support'   => 'Support - Untitled Access Platform',
    'profile'   => 'Profile - Untitled Access Platform',
    'cart'      => 'Cart - Untitled Access Platform',
];

$page_title   = $titles[$page];
$current_page = $page;

// Load model sesuai page
if ($page === 'store') {
    require_once __DIR__ . '/../src/backend/models/Game.php';
}

// Path ke file view
$view_path = __DIR__ . '/../src/frontend/pages/' . $page . '/' . $page . '.php';

// Cek apakah file view tersedia
if (!file_exists($view_path)) {
    $view_path = __DIR__ . '/../src/frontend/pages/store/store.php';
}
?>

<?php include __DIR__ . '/../src/frontend/layouts/header.php'; ?>

<main class="page-wrapper">
    <div class="container">
        <?php include $view_path; ?>
    </div>
</main>

<?php include __DIR__ . '/../src/frontend/layouts/footer.php'; ?>
