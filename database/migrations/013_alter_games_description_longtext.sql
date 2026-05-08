-- Upgrade description column to LONGTEXT to support long game descriptions.
-- Safe to run on existing installations; LONGTEXT holds up to 4GB.
ALTER TABLE games
    MODIFY COLUMN description LONGTEXT DEFAULT NULL;
