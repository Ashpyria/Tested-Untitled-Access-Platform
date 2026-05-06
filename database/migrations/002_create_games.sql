CREATE TABLE IF NOT EXISTS games (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(100)  NOT NULL,
    description  TEXT          DEFAULT NULL,
    genre        VARCHAR(50)   DEFAULT NULL,
    price        DECIMAL(10,2) NOT NULL DEFAULT 0,
    discount     INT           DEFAULT 0,
    image        VARCHAR(255)  DEFAULT NULL,
    is_free      TINYINT(1)    DEFAULT 0,
    release_date DATE          DEFAULT NULL,
    created_at   TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);
