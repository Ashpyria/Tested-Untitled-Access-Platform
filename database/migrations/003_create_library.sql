CREATE TABLE IF NOT EXISTS library (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id      INT UNSIGNED NOT NULL,
    game_id      INT UNSIGNED NOT NULL,
    hours_played INT DEFAULT 0,
    is_installed TINYINT(1) DEFAULT 0,
    is_favorite  TINYINT(1) DEFAULT 0,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE,
    UNIQUE KEY unique_library (user_id, game_id)
);
