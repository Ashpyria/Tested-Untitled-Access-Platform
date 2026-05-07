<?php

require_once __DIR__ . '/../config/database.php';

function getAllPosts($category = null) {
    $pdo = getDB();
    if ($category) {
        $stmt = $pdo->prepare('
            SELECT p.*, u.username, u.avatar,
            (SELECT COUNT(*) FROM post_replies WHERE post_id = p.id) as reply_count
            FROM posts p
            JOIN users u ON p.user_id = u.id
            WHERE p.category = ?
            ORDER BY p.created_at DESC
        ');
        $stmt->execute([$category]);
    } else {
        $stmt = $pdo->query('
            SELECT p.*, u.username, u.avatar,
            (SELECT COUNT(*) FROM post_replies WHERE post_id = p.id) as reply_count
            FROM posts p
            JOIN users u ON p.user_id = u.id
            ORDER BY p.created_at DESC
        ');
    }
    return $stmt->fetchAll();
}

function createPost($user_id, $title, $content, $category) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, content, category) VALUES (?, ?, ?, ?)');
    $stmt->execute([$user_id, $title, $content, $category]);
    return $pdo->lastInsertId();
}

function getAllReviews() {
    $pdo = getDB();
    return $pdo->query('
        SELECT r.*, u.username, u.avatar, g.title as game_title, l.hours_played
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        JOIN games g ON r.game_id = g.id
        LEFT JOIN library l ON l.user_id = r.user_id AND l.game_id = r.game_id
        ORDER BY r.created_at DESC
    ')->fetchAll();
}

function getAllGuides() {
    $pdo = getDB();
    return $pdo->query('
        SELECT g.*, u.username, gm.title as game_title
        FROM guides g
        JOIN users u ON g.user_id = u.id
        JOIN games gm ON g.game_id = gm.id
        ORDER BY g.views DESC
    ')->fetchAll();
}

function createReview($user_id, $game_id, $rating, $content) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('INSERT INTO reviews (user_id, game_id, rating, content) VALUES (?, ?, ?, ?)');
    $stmt->execute([$user_id, $game_id, $rating, $content]);
}

function getCommunityStats() {
    $pdo = getDB();
    return [
        'total_posts'   => $pdo->query('SELECT COUNT(*) FROM posts')->fetchColumn(),
        'total_members' => $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn(),
        'total_reviews' => $pdo->query('SELECT COUNT(*) FROM reviews')->fetchColumn(),
    ];
}

function timeAgo($datetime) {
    $diff = time() - strtotime($datetime);
    if ($diff < 3600)   return floor($diff / 60) . ' menit lalu';
    if ($diff < 86400)  return floor($diff / 3600) . ' jam lalu';
    if ($diff < 604800) return floor($diff / 86400) . ' hari lalu';
    return date('d M Y', strtotime($datetime));
}
