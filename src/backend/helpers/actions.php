<?php
// Handle logout
if (isset($_GET['page']) && $_GET['page'] === 'logout') {
    logoutUser();
    header('Location: /?page=store');
    exit;
}

// Handle toggle favorite
if (isset($_GET['action']) && $_GET['action'] === 'favorite' && isLoggedIn()) {
    require_once __DIR__ . '/../models/Library.php';
    $game_id = (int)($_GET['game_id'] ?? 0);
    if ($game_id > 0) {
        toggleFavorite(getCurrentUser()['id'], $game_id);
    }
    header('Location: /?page=library&filter=all');
    exit;
}

// Handle cart actions
if (isset($_GET['action']) && isLoggedIn()) {
    require_once __DIR__ . '/../models/Cart.php';
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

    if ($_GET['action'] === 'checkout') {
        require_once __DIR__ . '/../models/Library.php';
        $items = getCartItems($user_id);
        if (!empty($items)) {
            $pdo  = getDB();
            $stmt = $pdo->prepare('INSERT IGNORE INTO library (user_id, game_id) VALUES (?, ?)');
            foreach ($items as $item) {
                $stmt->execute([$user_id, $item['game_id']]);
            }
            clearCart($user_id);
        }
        header('Location: /?page=library');
        exit;
    }
}
