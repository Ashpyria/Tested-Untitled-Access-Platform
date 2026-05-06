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
