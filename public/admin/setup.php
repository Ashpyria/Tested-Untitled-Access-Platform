<?php
/**
 * One-time admin setup script.
 * Access: /admin/setup.php?email=your@email.com
 * DELETE this file after use.
 */
require_once __DIR__ . '/../../src/backend/config/database.php';

$email = trim($_GET['email'] ?? '');

if (empty($email)) {
    echo '<p style="font-family:monospace">Usage: /admin/setup.php?email=your@email.com</p>';
    exit;
}

$pdo  = getDB();
$stmt = $pdo->prepare('SELECT id, username, role FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    echo '<p style="font-family:monospace;color:red">User not found: ' . htmlspecialchars($email) . '</p>';
    exit;
}

if ($user['role'] === 'admin') {
    echo '<p style="font-family:monospace;color:green">' . htmlspecialchars($user['username']) . ' is already admin.</p>';
    echo '<p style="font-family:monospace"><a href="/admin/">Go to Admin Panel</a> — then delete this file.</p>';
    exit;
}

$pdo->prepare('UPDATE users SET role = ? WHERE id = ?')->execute(['admin', $user['id']]);

echo '<p style="font-family:monospace;color:green">Success! ' . htmlspecialchars($user['username']) . ' (id=' . $user['id'] . ') is now admin.</p>';
echo '<p style="font-family:monospace"><a href="/admin/">Go to Admin Panel</a> — then <strong>delete this file</strong>.</p>';
