<?php

require_once __DIR__ . '/../config/database.php';

function getAllGames() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM games ORDER BY created_at DESC')->fetchAll();
}

function getFeaturedGames() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM games WHERE is_free = 0 ORDER BY created_at DESC LIMIT 8')->fetchAll();
}

function getNewReleases() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM games ORDER BY release_date DESC LIMIT 8')->fetchAll();
}

function getOnSaleGames() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM games WHERE discount > 0 ORDER BY discount DESC')->fetchAll();
}

function getFreeGames() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM games WHERE is_free = 1')->fetchAll();
}

function getGamesByGenre($genre) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM games WHERE genre = ? ORDER BY created_at DESC');
    $stmt->execute([$genre]);
    return $stmt->fetchAll();
}

function getGameById($id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM games WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
