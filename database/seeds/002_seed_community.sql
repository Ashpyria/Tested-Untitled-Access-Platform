-- ============================================================
-- SEED: Community Data (posts, reviews, library entries)
-- Jalankan SETELAH 001_seed_games.sql dan minimal 1 user terdaftar
-- ============================================================

-- Library entries (game ownership + playtime)
-- Ganti user_id = 1 dengan ID user yang ada di database Anda
INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at) VALUES
(1,  1,  47,  1, 1, NOW()),
(1,  2,  12,  1, 0, NOW()),
(1,  3,  83,  0, 1, NOW()),
(1,  4,   5,  0, 0, NOW()),
(1,  5, 120,  1, 1, NOW()),
(1,  6,  33,  1, 0, NOW()),
(1,  7,   8,  0, 0, NOW()),
(1,  8,  61,  1, 0, NOW()),
(1,  9,  22,  0, 1, NOW()),
(1, 10,  15,  1, 0, NOW());

-- Forum posts
-- Ganti user_id dengan ID user yang terdaftar
INSERT INTO posts (user_id, title, content, category) VALUES
(1, 'Welcome to UAP Community!',
 'This is the official community hub for all UAP players. Share your thoughts, reviews, and guides here. Excited to see this platform grow!',
 'Announcement'),

(1, 'Tips for beginners — getting started',
 'If you are new here, start with the free-to-play games to get a feel for the platform. Check the library tab to manage your games. Happy gaming!',
 'General'),

(1, 'God of War — the story is incredible',
 'Just finished the main story. The relationship between Kratos and Atreus is written so well. If you have not played it yet, highly recommended.',
 'Game Discussion'),

(1, 'How do I install a game?',
 'Hi, I bought a game but cannot figure out how to install it. The install button does not seem to do anything. Any help appreciated!',
 'Tech Support'),

(1, 'Trading: looking for RPG recommendations',
 'I have been mostly playing action games. Anyone have recommendations for a good RPG to start with on this platform?',
 'Trading');

-- Reviews
-- Ganti user_id dengan ID user yang terdaftar, game_id sesuai games yang ada
INSERT IGNORE INTO reviews (user_id, game_id, rating, content) VALUES
(1, 1, 5, 'One of the best action games ever made. The combat is fluid, the story is emotional, and the world-building is top-notch. A must-play for any gamer.'),
(1, 3, 4, 'Incredible open world with so much to explore. The main quest is fantastic. Some side missions feel repetitive but overall an amazing experience.'),
(1, 5, 5, 'After 120 hours I still find new things to discover. The modding community keeps this game alive years after release. Absolute classic.');
