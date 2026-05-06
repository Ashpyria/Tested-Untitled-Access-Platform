<?php

require_once __DIR__ . '/../config/database.php';

function getUserFriends($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT u.id, u.username, u.avatar, u.country
        FROM friends f
        JOIN users u ON f.friend_id = u.id
        WHERE f.user_id = ? AND f.status = "accepted"
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getFriendCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM friends WHERE user_id = ? AND status = "accepted"');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}

function sendFriendRequest($user_id, $friend_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('INSERT IGNORE INTO friends (user_id, friend_id) VALUES (?, ?)');
    $stmt->execute([$user_id, $friend_id]);
}

function searchUsers($query, $current_user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT id, username, country FROM users
        WHERE username LIKE ? AND id != ?
        LIMIT 10
    ');
    $stmt->execute(['%' . $query . '%', $current_user_id]);
    return $stmt->fetchAll();
}

function getPendingRequests($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT u.id, u.username, u.country, f.created_at
        FROM friends f
        JOIN users u ON f.user_id = u.id
        WHERE f.friend_id = ? AND f.status = "pending"
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function acceptFriendRequest($user_id, $friend_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('UPDATE friends SET status = "accepted" WHERE user_id = ? AND friend_id = ?');
    $stmt->execute([$friend_id, $user_id]);
    $stmt = $pdo->prepare('INSERT IGNORE INTO friends (user_id, friend_id, status) VALUES (?, ?, "accepted")');
    $stmt->execute([$user_id, $friend_id]);
}

function declineFriendRequest($user_id, $friend_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('DELETE FROM friends WHERE user_id = ? AND friend_id = ?');
    $stmt->execute([$friend_id, $user_id]);
}

function isFriend($user_id, $friend_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM friends WHERE user_id = ? AND friend_id = ? AND status = "accepted"');
    $stmt->execute([$user_id, $friend_id]);
    return $stmt->fetch() !== false;
}

function hasPendingRequest($user_id, $friend_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM friends WHERE user_id = ? AND friend_id = ?');
    $stmt->execute([$user_id, $friend_id]);
    return $stmt->fetch() !== false;
}
