<?php
require_once __DIR__ . '/../config/database.php';

function createTicket($user_id, $name, $email, $category, $message) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('INSERT INTO support_tickets (user_id, name, email, category, message) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$user_id ?: null, $name, $email, $category, $message]);
}

function getAllTickets() {
    $pdo = getDB();
    return $pdo->query('SELECT * FROM support_tickets ORDER BY created_at DESC')->fetchAll();
}

function updateTicketStatus($id, $status) {
    $pdo = getDB();
    $pdo->prepare('UPDATE support_tickets SET status = ? WHERE id = ?')->execute([$status, $id]);
}

function deleteTicket($id) {
    $pdo = getDB();
    $pdo->prepare('DELETE FROM support_tickets WHERE id = ?')->execute([$id]);
}

function getArticleById($id) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM support_articles WHERE id = ?');
    $stmt->execute([(int)$id]);
    return $stmt->fetch();
}

function getArticlesByCategory($category) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM support_articles WHERE category = ? ORDER BY views DESC');
    $stmt->execute([$category]);
    return $stmt->fetchAll();
}

function getPopularArticles($limit = 5) {
    $pdo  = getDB();
    $stmt = $pdo->prepare('SELECT * FROM support_articles ORDER BY views DESC LIMIT ?');
    $stmt->execute([(int)$limit]);
    return $stmt->fetchAll();
}

function incrementArticleViews($id) {
    $pdo = getDB();
    $pdo->prepare('UPDATE support_articles SET views = views + 1 WHERE id = ?')->execute([(int)$id]);
}
