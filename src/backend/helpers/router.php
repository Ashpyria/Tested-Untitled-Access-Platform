<?php
$page = $_GET['page'] ?? 'store';

$allowed_pages = ['store', 'library', 'community', 'support', 'profile', 'cart', 'login', 'register', 'game'];
if (!in_array($page, $allowed_pages)) {
    $page = 'store';
}

$titles = [
    'store'     => 'Store - Untitled Access Platform',
    'library'   => 'Library - Untitled Access Platform',
    'community' => 'Community - Untitled Access Platform',
    'support'   => 'Support - Untitled Access Platform',
    'profile'   => 'Profile - Untitled Access Platform',
    'cart'      => 'Cart - Untitled Access Platform',
    'login'     => 'Login - Untitled Access Platform',
    'register'  => 'Register - Untitled Access Platform',
    'game' => 'Game Detail - Untitled Access Platform',
];

$page_title   = $titles[$page];
$current_page = $page;

$models = [
    'store'     => ['Game.php', 'Cart.php'],
    'library'   => ['Library.php'],
    'profile'   => ['Library.php', 'Achievement.php', 'Friend.php'],
    'community' => ['Community.php', 'Library.php'],
    'cart'      => ['Cart.php'],
    'support'   => ['Support.php'],
    'game' => ['Game.php', 'Cart.php', 'Community.php'],
];

foreach ($models[$page] ?? [] as $model) {
    require_once __DIR__ . '/../models/' . $model;
}

$view_path = __DIR__ . '/../../../src/frontend/pages/' . $page . '/' . $page . '.php';
if (!file_exists($view_path)) {
    $view_path = __DIR__ . '/../../../src/frontend/pages/store/store.php';
}
