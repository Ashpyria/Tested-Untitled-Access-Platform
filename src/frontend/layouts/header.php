<?php
$current_page = $_GET['page'] ?? 'store';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Untitled Access Platform' ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <?php if (file_exists(__DIR__ . '/../../../public/assets/css/pages/' . ($current_page ?? 'store') . '.css')): ?>
    <link rel="stylesheet" href="/assets/css/pages/<?= $current_page ?? 'store' ?>.css">
    <?php endif; ?>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <div class="navbar-inner">

            <!-- Logo -->
            <a href="/?page=store" class="navbar-logo">
                <img src="/assets/images/logo.png" alt="UAP Logo" style="height:50px;width:auto;display:block">
                Untitled <span>Access Platform</span>
            </a>

            <!-- Nav Links -->
            <ul class="navbar-links">
                <li>
                    <a href="/?page=store"
                       class="nav-link <?= $current_page === 'store' ? 'active' : '' ?>">
                        Store
                    </a>
                </li>
                <li>
                    <a href="/?page=library"
                       class="nav-link <?= $current_page === 'library' ? 'active' : '' ?>">
                        Library
                    </a>
                </li>
                <li>
                    <a href="/?page=community"
                       class="nav-link <?= $current_page === 'community' ? 'active' : '' ?>">
                        Community
                    </a>
                </li>
                <li>
                    <a href="/?page=support"
                       class="nav-link <?= $current_page === 'support' ? 'active' : '' ?>">
                        Support
                    </a>
                </li>
            </ul>

            <!-- Kanan: Search + Cart + User -->
            <div class="navbar-right">

                <!-- Search -->
                <div class="navbar-search">
                    <input type="text" placeholder="Search games...">
                    <button>Search</button>
                </div>
                
                <!-- Cart -->
                <a href="/?page=cart"
                   class="nav-link <?= $current_page === 'cart' ? 'active' : '' ?>"
                   style="position:relative">
                    Cart
                    <span class="cart-badge">3</span>
                </a>

                <!-- User -->
                <a href="/?page=profile" class="navbar-user">
                    <img src="/assets/images/avatars/default.png"
                         alt="Avatar"
                         class="navbar-avatar"
                         onerror="this.style.background='#242424'">
                    <span class="navbar-username">Player1</span>
                </a>

            </div>
        </div>
    </div>
</nav>
