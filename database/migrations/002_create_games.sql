CREATE TABLE IF NOT EXISTS games (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(100)  NOT NULL,
    description   TEXT          DEFAULT NULL,
    genre         VARCHAR(50)   DEFAULT NULL,
    price         DECIMAL(10,2) NOT NULL DEFAULT 0,
    discount      INT           DEFAULT 0,
    image         VARCHAR(255)  DEFAULT NULL,
    is_free       TINYINT(1)    DEFAULT 0,
    release_date  DATE          DEFAULT NULL,
    developer     VARCHAR(100)  DEFAULT NULL,
    publisher     VARCHAR(100)  DEFAULT NULL,
    req_os        VARCHAR(150)  DEFAULT NULL,
    req_processor VARCHAR(200)  DEFAULT NULL,
    req_memory    VARCHAR(50)   DEFAULT NULL,
    req_graphics  VARCHAR(200)  DEFAULT NULL,
    req_storage   VARCHAR(50)   DEFAULT NULL,
    created_at    TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);
