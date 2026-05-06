<?php

require_once __DIR__ . '/../config/database.php';

function getUserByEmail($email) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function getUserById($id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function createUser($username, $email, $password) {
    $pdo  = getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$username, $email, $hash]);
    return $pdo->lastInsertId();
}

function emailExists($email) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetch() !== false;
}

function usernameExists($username) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->execute([$username]);
    return $stmt->fetch() !== false;
}

function updateProfile($id, $username, $email, $bio, $country, $avatar = null) {
    $pdo = getDB();
    if ($avatar) {
        $stmt = $pdo->prepare('UPDATE users SET username=?, email=?, bio=?, country=?, avatar=? WHERE id=?');
        $stmt->execute([$username, $email, $bio, $country, $avatar, $id]);
    } else {
        $stmt = $pdo->prepare('UPDATE users SET username=?, email=?, bio=?, country=? WHERE id=?');
        $stmt->execute([$username, $email, $bio, $country, $id]);
    }
}

function updatePassword($user_id, $new_password) {
    $pdo  = getDB();
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
    $stmt->execute([$hash, $user_id]);
}