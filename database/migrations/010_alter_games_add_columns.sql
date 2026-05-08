-- Run this migration if your games table was created before these columns were added.
-- Safe to run on existing installations.
ALTER TABLE games
    ADD COLUMN req_os        VARCHAR(150) DEFAULT NULL,
    ADD COLUMN req_processor VARCHAR(200) DEFAULT NULL,
    ADD COLUMN req_memory    VARCHAR(50)  DEFAULT NULL,
    ADD COLUMN req_graphics  VARCHAR(200) DEFAULT NULL,
    ADD COLUMN req_storage   VARCHAR(50)  DEFAULT NULL,
    ADD COLUMN developer     VARCHAR(100) DEFAULT NULL,
    ADD COLUMN publisher     VARCHAR(100) DEFAULT NULL;
