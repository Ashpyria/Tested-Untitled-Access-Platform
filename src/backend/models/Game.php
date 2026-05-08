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

function getGameImages($game_id) {
    try {
        $pdo  = getDB();
        $stmt = $pdo->prepare('SELECT * FROM game_images WHERE game_id = ? ORDER BY sort_order ASC, id ASC');
        $stmt->execute([(int)$game_id]);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        return [];
    }
}

function addGameImage($game_id, $filename, $sort_order = 0) {
    try {
        $pdo  = getDB();
        $stmt = $pdo->prepare('INSERT INTO game_images (game_id, filename, sort_order) VALUES (?, ?, ?)');
        $stmt->execute([(int)$game_id, $filename, (int)$sort_order]);
    } catch (Exception $e) {}
}

function deleteGameImage($image_id, $game_id) {
    try {
        $pdo  = getDB();
        $stmt = $pdo->prepare('SELECT filename FROM game_images WHERE id = ? AND game_id = ?');
        $stmt->execute([(int)$image_id, (int)$game_id]);
        $img  = $stmt->fetchColumn();
        if ($img) {
            $path = __DIR__ . '/../../../public/uploads/games/' . $img;
            if (file_exists($path)) unlink($path);
            $pdo->prepare('DELETE FROM game_images WHERE id = ?')->execute([(int)$image_id]);
        }
    } catch (Exception $e) {}
}
