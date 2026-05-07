<?php
require_once __DIR__ . '/../src/backend/config/database.php';

$pdo = getDB();

// Clear existing games first
$pdo->exec('DELETE FROM games');
$pdo->exec('ALTER TABLE games AUTO_INCREMENT = 1');

$sql = file_get_contents(__DIR__ . '/seeds/001_seed_games.sql');

try {
    $pdo->exec($sql);
    $count = $pdo->query('SELECT COUNT(*) FROM games')->fetchColumn();
    echo "Seeding berhasil! $count games berhasil ditambahkan.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
