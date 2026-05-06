<?php
require_once __DIR__ . '/../src/backend/helpers/auth.php';
startSession();

// Handle logout
if (isset($_GET['page']) && $_GET['page'] === 'logout') {
    logoutUser();
    header('Location: /?page=store');
    exit;
}

// Handle toggle favorite
if (isset($_GET['action']) && $_GET['action'] === 'favorite' && isLoggedIn()) {
    require_once __DIR__ . '/../src/backend/models/Library.php';
    $game_id = (int)($_GET['game_id'] ?? 0);
    if ($game_id > 0) {
        toggleFavorite(getCurrentUser()['id'], $game_id);
    }
    header('Location: /?page=library&filter=all');
    exit;
}

// Handle cart actions
if (isset($_GET['action']) && isLoggedIn()) {
    require_once __DIR__ . '/../src/backend/models/Cart.php';
    $game_id = (int)($_GET['game_id'] ?? 0);
    $user_id = getCurrentUser()['id'];

    if ($_GET['action'] === 'add_to_cart' && $game_id > 0) {
        addToCart($user_id, $game_id);
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/?page=store'));
        exit;
    }

    if ($_GET['action'] === 'remove_from_cart' && $game_id > 0) {
        removeFromCart($user_id, $game_id);
        header('Location: /?page=cart');
        exit;
    }
    
    if ($_GET['action'] === 'checkout' && isLoggedIn()) {
    require_once __DIR__ . '/../src/backend/models/Library.php';
    $user_id = getCurrentUser()['id'];
    $items   = getCartItems($user_id);

    if (!empty($items)) {
        foreach ($items as $item) {
            $price = $item['discount'] > 0
                ? $item['price'] * (1 - $item['discount'] / 100)
                : $item['price'];

            // Tambah ke library kalau belum ada
            $pdo  = getDB();
            $stmt = $pdo->prepare('INSERT IGNORE INTO library (user_id, game_id) VALUES (?, ?)');
            $stmt->execute([$user_id, $item['game_id']]);
        }
        clearCart($user_id);
    }

    header('Location: /?page=library');
    exit;
    }
}


// Router sederhana — baca parameter ?page= dari URL
$page = $_GET['page'] ?? 'store';

// Whitelist halaman yang diizinkan
$allowed_pages = ['store', 'library', 'community', 'support', 'profile', 'cart', 'login', 'register'];

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
    'login'    => 'Login - Untitled Access Platform',
    'register' => 'Register - Untitled Access Platform',
];

$page_title   = $titles[$page];
$current_page = $page;

// Load model sesuai page
if ($page === 'store') {
    require_once __DIR__ . '/../src/backend/models/Game.php';
    require_once __DIR__ . '/../src/backend/models/Cart.php';
}

if ($page === 'library') {
    require_once __DIR__ . '/../src/backend/models/Library.php';
}

if ($page === 'profile') {
    require_once __DIR__ . '/../src/backend/models/Library.php';
    require_once __DIR__ . '/../src/backend/models/Achievement.php';
    require_once __DIR__ . '/../src/backend/models/Friend.php';
}

if ($page === 'community') {
    require_once __DIR__ . '/../src/backend/models/Community.php';
    require_once __DIR__ . '/../src/backend/models/Library.php';
}

if ($page === 'cart') {
    require_once __DIR__ . '/../src/backend/models/Cart.php';
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

