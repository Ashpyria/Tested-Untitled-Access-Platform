<?php

require_once __DIR__ . '/../config/database.php';

function getUserLibrary($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed, l.is_favorite, l.purchased_at
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ?
        ORDER BY l.purchased_at DESC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}


function getLibraryCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM library WHERE user_id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}

function getTotalHours($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT SUM(hours_played) FROM library WHERE user_id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn() ?? 0;
}

function getInstalledCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM library WHERE user_id = ? AND is_installed = 1');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}

function getInstalledGames($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed, l.purchased_at
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ? AND l.is_installed = 1
        ORDER BY l.purchased_at DESC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getNotInstalledGames($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed, l.purchased_at
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ? AND l.is_installed = 0
        ORDER BY l.purchased_at DESC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getFavoriteGames($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed, l.is_favorite, l.purchased_at
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ? AND l.is_favorite = 1
        ORDER BY l.purchased_at DESC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getLibraryGenres($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT DISTINCT g.genre
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ?
        ORDER BY g.genre ASC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getLibraryGamesByGenre($user_id, $genre) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed, l.is_favorite, l.purchased_at
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ? AND g.genre = ?
        ORDER BY l.purchased_at DESC
    ');
    $stmt->execute([$user_id, $genre]);
    return $stmt->fetchAll();
}

function toggleFavorite($user_id, $game_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        UPDATE library SET is_favorite = NOT is_favorite
        WHERE user_id = ? AND game_id = ?
    ');
    $stmt->execute([$user_id, $game_id]);
}

function getFavoriteCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM library WHERE user_id = ? AND is_favorite = 1');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}

function getRecentlyPlayed($user_id, $limit = 3) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played, l.is_installed
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ?
        ORDER BY l.hours_played DESC
        LIMIT ' . (int)$limit . '
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}


function getMostPlayedGame($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT g.*, l.hours_played
        FROM library l
        JOIN games g ON l.game_id = g.id
        WHERE l.user_id = ?
        ORDER BY l.hours_played DESC
        LIMIT 1
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}
