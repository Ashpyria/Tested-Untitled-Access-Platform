<?php

require_once __DIR__ . '/../config/database.php';

function getUserAchievements($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('
        SELECT a.*, ua.unlocked_at
        FROM user_achievements ua
        JOIN achievements a ON ua.achievement_id = a.id
        WHERE ua.user_id = ?
        ORDER BY ua.unlocked_at DESC
    ');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getAllAchievements() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM achievements')->fetchAll();
}

function getAchievementCount($user_id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM user_achievements WHERE user_id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}
