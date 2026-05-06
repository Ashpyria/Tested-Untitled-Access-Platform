<?php

require_once __DIR__ . '/../config/database.php';

function getCartItems($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT c.id, g.id as game_id, g.title, g.price, g.discount, g.image
        FROM cart c
        JOIN games g ON c.game_id = g.id
        WHERE c.user_id = ?
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function addToCart($user_id, $game_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('INSERT IGNORE INTO cart (user_id, game_id) VALUES (?, ?)');
    $stmt->execute([$user_id, $game_id]);
}

function removeFromCart($user_id, $game_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('DELETE FROM cart WHERE user_id = ? AND game_id = ?');
    $stmt->execute([$user_id, $game_id]);
}

function isInCart($user_id, $game_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM cart WHERE user_id = ? AND game_id = ?');
    $stmt->execute([$user_id, $game_id]);
    return $stmt->fetch() !== false;
}

function getCartCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM cart WHERE user_id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}

function clearCart($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('DELETE FROM cart WHERE user_id = ?');
    $stmt->execute([$user_id]);
}

function getCartTotal($items) {
    $total = 0;
    foreach ($items as $item) {
        $price  = $item['discount'] > 0
            ? $item['price'] * (1 - $item['discount'] / 100)
            : $item['price'];
        $total += $price;
    }
    return $total;
}
