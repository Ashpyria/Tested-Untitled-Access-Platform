<?php
if (isLoggedIn() && function_exists('getCartCount')) {
    // already loaded
} elseif (isLoggedIn()) {
    require_once __DIR__ . '/../../backend/models/Cart.php';
}

$current_page = $_GET['page'] ?? 'store';
$store_filter = $_GET['filter'] ?? '';
$lib_filter   = $_GET['filter'] ?? 'all';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'UAP — Untitled Access Platform') ?></title>

    <!-- Fonts loaded locally via @font-face in main.css -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <!-- Page-specific CSS -->
    <?php if (file_exists(__DIR__ . '/../../../public/assets/css/pages/' . $current_page . '.css')): ?>
    <link rel="stylesheet" href="/assets/css/pages/<?= htmlspecialchars($current_page) ?>.css">
    <?php endif; ?>
</head>
<body>

<!-- ============================================================
     TOPBAR — Fixed 58px
     ============================================================ -->
<header class="topbar">

    <!-- Logo -->
    <a href="/?page=store" class="topbar-logo">
        <img src="/assets/images/logo.png" alt="UAP" class="topbar-logo-img">
    </a>

    <!-- Main nav -->
    <nav class="topbar-nav">
        <a href="/?page=store"
           class="<?= $current_page === 'store' ? 'active' : '' ?>">Store</a>
        <a href="/?page=library"
           class="<?= $current_page === 'library' ? 'active' : '' ?>">Library</a>
        <a href="/?page=community"
           class="<?= $current_page === 'community' ? 'active' : '' ?>">Community</a>
        <a href="/?page=support"
           class="<?= $current_page === 'support' ? 'active' : '' ?>">Support</a>
    </nav>

    <!-- Right side -->
    <div class="topbar-right">

        <!-- Cart -->
        <a href="/?page=cart"
           class="topbar-cart <?= $current_page === 'cart' ? 'active' : '' ?>">
            Cart
            <?php $cartCount = isLoggedIn() ? getCartCount(getCurrentUser()['id']) : 0; ?>
            <?php if ($cartCount > 0): ?>
            <span class="cart-badge"><?= $cartCount ?></span>
            <?php endif; ?>
        </a>

        <!-- User or Login/Register -->
        <?php if (isLoggedIn()): ?>
            <?php $navUser = getCurrentUser(); ?>
            <a href="/?page=profile" class="topbar-user">
                <img src="/assets/images/avatars/<?= htmlspecialchars($navUser['avatar'] ?? 'default.png') ?>"
                     alt="Avatar"
                     class="topbar-avatar"
                     onerror="this.style.background='#1e2840';this.removeAttribute('src')">
                <span class="topbar-username"><?= htmlspecialchars($navUser['username']) ?></span>
            </a>
            <?php if (($navUser['role'] ?? '') === 'admin'): ?>
            <a href="/admin/" class="btn btn-ghost btn-sm" style="border-color:rgba(184,50,50,0.4);color:var(--accent)">Admin</a>
            <?php endif; ?>
            <a href="/?page=logout" class="btn btn-ghost btn-sm">Logout</a>
        <?php else: ?>
            <a href="/?page=login" class="btn btn-ghost btn-sm">Login</a>
            <a href="/?page=register" class="btn btn-primary btn-sm">Register</a>
        <?php endif; ?>

    </div>
</header>

<!-- ============================================================
     APP LAYOUT — sidebar + main
     ============================================================ -->
<div class="app-layout">

<!-- SIDEBAR -->
<aside class="sidebar">

    <?php if (in_array($current_page, ['store', 'game'])): ?>
    <?php $store_genre = $_GET['genre'] ?? ''; ?>
    <!-- Store / Game page: Discover section -->
    <div class="sidebar-section">
        <span class="sidebar-label">Discover</span>
        <a href="/?page=store"
           class="sidebar-item <?= ($current_page === 'store' && $store_filter === '' && $store_genre === '') ? 'active' : '' ?>">
            Featured
        </a>
        <a href="/?page=store&filter=new"
           class="sidebar-item <?= $store_filter === 'new' ? 'active' : '' ?>">
            New Releases
        </a>
        <a href="/?page=store&filter=sale"
           class="sidebar-item <?= $store_filter === 'sale' ? 'active' : '' ?>">
            On Sale
            <span class="sidebar-badge">HOT</span>
        </a>
        <a href="/?page=store&filter=free"
           class="sidebar-item <?= $store_filter === 'free' ? 'active' : '' ?>">
            Free to Play
        </a>
    </div>

    <!-- Genre section -->
    <div class="sidebar-section">
        <span class="sidebar-label">Sort by Genre</span>
        <?php foreach (['Action', 'RPG', 'Strategy', 'Simulation', 'Indie', 'Multiplayer'] as $g): ?>
        <a href="/?page=store&genre=<?= urlencode($g) ?>"
           class="sidebar-item <?= $store_genre === $g ? 'active' : '' ?>">
            <?= $g ?>
        </a>
        <?php endforeach; ?>
    </div>

    <?php elseif ($current_page === 'library'): ?>
    <!-- Library page: My Library section -->
    <div class="sidebar-section">
        <span class="sidebar-label">My Library</span>
        <a href="/?page=library"
           class="sidebar-item <?= ($lib_filter === 'all' || $lib_filter === '') ? 'active' : '' ?>">
            All Games
        </a>
        <a href="/?page=library&filter=favorites"
           class="sidebar-item <?= $lib_filter === 'favorites' ? 'active' : '' ?>">
            Favorites
        </a>
        <a href="/?page=library&filter=installed"
           class="sidebar-item <?= $lib_filter === 'installed' ? 'active' : '' ?>">
            Installed
        </a>
        <a href="/?page=library&filter=not-installed"
           class="sidebar-item <?= $lib_filter === 'not-installed' ? 'active' : '' ?>">
            Not Installed
        </a>
    </div>

    <?php elseif ($current_page === 'community'): ?>
    <!-- Community page -->
    <div class="sidebar-section">
        <span class="sidebar-label">Community</span>
        <a href="/?page=community"
           class="sidebar-item <?= !isset($_GET['tab']) ? 'active' : '' ?>">
            Forum
        </a>
        <a href="/?page=community&tab=reviews"
           class="sidebar-item <?= (($_GET['tab'] ?? '') === 'reviews') ? 'active' : '' ?>">
            Reviews
        </a>
        <a href="/?page=community&tab=guides"
           class="sidebar-item <?= (($_GET['tab'] ?? '') === 'guides') ? 'active' : '' ?>">
            Guides
        </a>
    </div>

    <?php elseif ($current_page === 'support'): ?>
    <!-- Support page -->
    <div class="sidebar-section">
        <span class="sidebar-label">Support</span>
        <a href="/?page=support"
           class="sidebar-item <?= (!isset($_GET['tab'])) ? 'active' : '' ?>">
            Help Center
        </a>
        <a href="/?page=support&tab=faq"
           class="sidebar-item <?= (($_GET['tab'] ?? '') === 'faq') ? 'active' : '' ?>">
            FAQ
        </a>
        <a href="/?page=support&tab=contact"
           class="sidebar-item <?= (($_GET['tab'] ?? '') === 'contact') ? 'active' : '' ?>">
            Contact Us
        </a>
        <a href="/?page=support&tab=refund"
           class="sidebar-item <?= (($_GET['tab'] ?? '') === 'refund') ? 'active' : '' ?>">
            Refund Policy
        </a>
    </div>

    <?php endif; ?>

    <!-- Always-visible: Your Stuff -->
    <div class="sidebar-section">
        <span class="sidebar-label">Your Stuff</span>
        <a href="/?page=library"
           class="sidebar-item <?= ($current_page === 'library') ? 'active' : '' ?>">
            Library
        </a>
        <a href="/?page=cart"
           class="sidebar-item <?= ($current_page === 'cart') ? 'active' : '' ?>">
            Cart
            <?php if (isLoggedIn() && ($sideCartCount = getCartCount(getCurrentUser()['id'])) > 0): ?>
            <span class="sidebar-badge"><?= $sideCartCount ?></span>
            <?php endif; ?>
        </a>
        <?php if (isLoggedIn()): ?>
        <a href="/?page=profile"
           class="sidebar-item <?= ($current_page === 'profile') ? 'active' : '' ?>">
            Profile
        </a>
        <?php else: ?>
        <a href="/?page=login" class="sidebar-item">
            Login
        </a>
        <a href="/?page=register" class="sidebar-item">
            Register
        </a>
        <?php endif; ?>
    </div>

    <!-- User info at bottom of sidebar -->
    <?php if (isLoggedIn()): ?>
    <?php if (!isset($navUser)) { $navUser = getCurrentUser(); } ?>
    <div class="sidebar-footer">
        <a href="/?page=profile" class="sidebar-user-row" style="text-decoration:none">
            <img src="/assets/images/avatars/<?= htmlspecialchars($navUser['avatar'] ?? 'default.png') ?>"
                 alt="Avatar"
                 class="sidebar-avatar"
                 onerror="this.style.background='#1e2840';this.removeAttribute('src')">
            <div class="sidebar-user-info">
                <div class="sidebar-username"><?= htmlspecialchars($navUser['username']) ?></div>
                <div class="sidebar-status">
                    <span class="sidebar-dot"></span>Online
                </div>
            </div>
        </a>
    </div>
    <?php endif; ?>

</aside>
<!-- /sidebar -->

<!-- MAIN CONTENT -->
<main class="main-content">
<div class="page-content">
