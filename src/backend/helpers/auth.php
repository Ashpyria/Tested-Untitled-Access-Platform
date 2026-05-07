<?php

function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function isLoggedIn() {
    startSession();
    return isset($_SESSION['user_id']);
}

function getCurrentUser() {
    startSession();
    return $_SESSION['user'] ?? null;
}

function loginUser($user) {
    startSession();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user']    = $user;
}

function logoutUser() {
    startSession();
    $_SESSION = [];
    session_destroy();
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /?page=login');
        exit;
    }
}
