-- Seed: Game Images
-- Updates cover images on the games table and inserts screenshots into game_images.
-- Uses title-based lookups so this is safe to run after a fresh seed (no hardcoded IDs).

-- -----------------------------------------------
-- Cover images (games.image)
-- -----------------------------------------------
UPDATE games SET image = 'game_69fda1f0147a6.jpg' WHERE title = 'God of War';
UPDATE games SET image = 'game_69fda3c4871e9.jpg' WHERE title = 'Red Dead Redemption 2';
UPDATE games SET image = 'game_69fda3cc50e5d.png' WHERE title = 'Sekiro: Shadows Die Twice';
UPDATE games SET image = 'game_69fda4041098d.jpg' WHERE title = 'Grand Theft Auto V';
UPDATE games SET image = 'game_69fda42c998a6.jpg' WHERE title = 'Cyberpunk 2077';
UPDATE games SET image = 'game_69fda4b6cd84a.jpg' WHERE title = 'The Witcher 3: Wild Hunt';
UPDATE games SET image = 'game_69fda4bfb6d4f.png' WHERE title = 'Elden Ring';
UPDATE games SET image = 'game_69fda4d9802ad.jpg' WHERE title = 'Dark Souls III';
UPDATE games SET image = 'game_69fdc89b34b73.jpg' WHERE title = 'Disco Elysium';
UPDATE games SET image = 'game_69fdc8c1410b7.jpg' WHERE title = 'Path of Exile';
UPDATE games SET image = 'game_69fdc8ed9d6b5.jpg' WHERE title = 'Among Us';
UPDATE games SET image = 'game_69fdc954dc071.jpg' WHERE title = 'Civilization VI';
UPDATE games SET image = 'game_69fdc98b5f286.jpg' WHERE title = 'Total War: WARHAMMER III';
UPDATE games SET image = 'game_69fd9009c8247.jpg' WHERE title = 'Stardew Valley';
UPDATE games SET image = 'game_69fdc9d27e4e2.jpg' WHERE title = 'Minecraft';
UPDATE games SET image = 'game_69fdcac3cd52b.jpg' WHERE title = 'Terraria';
UPDATE games SET image = 'game_69fdcadbc0355.jpg' WHERE title = 'Hollow Knight';
UPDATE games SET image = 'game_69fdcb1638437.png' WHERE title = 'Hades';
UPDATE games SET image = 'game_69fdcb2b8be39.png' WHERE title = 'Celeste';
UPDATE games SET image = 'game_69fdcf72ddebb.png' WHERE title = 'Dota 2';
UPDATE games SET image = 'game_69fdcb6e089cf.jpeg' WHERE title = 'Counter-Strike 2';
UPDATE games SET image = 'game_69fdcb8472ca7.jpg' WHERE title = 'Apex Legends';

-- -----------------------------------------------
-- Screenshots (game_images)
-- -----------------------------------------------
INSERT INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fda1f015e66.jpg', 1 FROM games WHERE title = 'God of War';

INSERT INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fd945138996.png', 1 FROM games WHERE title = 'Stardew Valley';

INSERT INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fd945139dec.jpg', 2 FROM games WHERE title = 'Stardew Valley';
