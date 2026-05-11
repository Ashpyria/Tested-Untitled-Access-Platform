-- ============================================================
-- UAP (Untitled Access Platform) — Complete Setup
-- Schema + Seed dalam satu file. Untuk fresh install.
--
-- Cara pakai:
--   phpMyAdmin : Import file ini langsung
--   Terminal   : mysql -h 127.0.0.1 -P 3307 -u root uap_database < database/setup.sql
--
-- Seed community (library, posts, reviews) membutuhkan user id=1.
-- Jika belum ada, bagian tersebut dilewati otomatis tanpa error.
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;

-- ============================================================
-- SCHEMA
-- ============================================================

CREATE TABLE IF NOT EXISTS users (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL UNIQUE,
    email      VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    avatar     VARCHAR(255) DEFAULT NULL,
    bio        TEXT         DEFAULT NULL,
    country    VARCHAR(50)  DEFAULT 'Indonesia',
    role       ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS games (
    id            INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(100)  NOT NULL,
    description   LONGTEXT      DEFAULT NULL,
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

CREATE TABLE IF NOT EXISTS library (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id      INT UNSIGNED NOT NULL,
    game_id      INT UNSIGNED NOT NULL,
    hours_played INT          DEFAULT 0,
    is_installed TINYINT(1)   DEFAULT 0,
    is_favorite  TINYINT(1)   DEFAULT 0,
    purchased_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE,
    UNIQUE KEY unique_library (user_id, game_id)
);

CREATE TABLE IF NOT EXISTS cart (
    id       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id  INT UNSIGNED NOT NULL,
    game_id  INT UNSIGNED NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE,
    UNIQUE KEY unique_cart (user_id, game_id)
);

CREATE TABLE IF NOT EXISTS orders (
    id         INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
    user_id    INT UNSIGNED  NOT NULL,
    total      DECIMAL(10,2) NOT NULL,
    status     ENUM('pending', 'paid', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS order_items (
    id       INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED  NOT NULL,
    game_id  INT UNSIGNED  NOT NULL,
    price    DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id)  REFERENCES games(id)  ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS friends (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id    INT UNSIGNED NOT NULL,
    friend_id  INT UNSIGNED NOT NULL,
    status     ENUM('pending', 'accepted') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id)   REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (friend_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_friends (user_id, friend_id)
);

CREATE TABLE IF NOT EXISTS achievements (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    rarity      ENUM('Common', 'Rare', 'Epic', 'Legendary') DEFAULT 'Common'
);

CREATE TABLE IF NOT EXISTS user_achievements (
    id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id        INT UNSIGNED NOT NULL,
    achievement_id INT UNSIGNED NOT NULL,
    unlocked_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id)        REFERENCES users(id)        ON DELETE CASCADE,
    FOREIGN KEY (achievement_id) REFERENCES achievements(id) ON DELETE CASCADE,
    UNIQUE KEY unique_ua (user_id, achievement_id)
);

CREATE TABLE IF NOT EXISTS posts (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id    INT UNSIGNED NOT NULL,
    title      VARCHAR(255) NOT NULL,
    content    TEXT NOT NULL,
    category   ENUM('General', 'Announcement', 'Game Discussion', 'Tech Support', 'Trading') DEFAULT 'General',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS post_replies (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id    INT UNSIGNED NOT NULL,
    user_id    INT UNSIGNED NOT NULL,
    content    TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS reviews (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id       INT UNSIGNED NOT NULL,
    game_id       INT UNSIGNED NOT NULL,
    rating        TINYINT NOT NULL,
    content       TEXT NOT NULL,
    helpful_count INT DEFAULT 0,
    created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE,
    UNIQUE KEY unique_review (user_id, game_id)
);

CREATE TABLE IF NOT EXISTS guides (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id    INT UNSIGNED NOT NULL,
    game_id    INT UNSIGNED NOT NULL,
    title      VARCHAR(255) NOT NULL,
    content    TEXT NOT NULL,
    views      INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS support_tickets (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id    INT UNSIGNED NULL,
    name       VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    category   VARCHAR(100) NOT NULL,
    message    TEXT NOT NULL,
    status     ENUM('open', 'in_progress', 'resolved', 'closed') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS support_articles (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category   VARCHAR(80)  NOT NULL,
    title      VARCHAR(255) NOT NULL,
    content    TEXT NOT NULL,
    views      INT UNSIGNED DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS game_images (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    game_id    INT UNSIGNED NOT NULL,
    filename   VARCHAR(255) NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- SEED: Games
-- ============================================================

INSERT IGNORE INTO games (title, description, genre, price, discount, image, is_free, release_date, developer, publisher, req_os, req_processor, req_memory, req_graphics, req_storage) VALUES

('God of War',
 'Battle through the brutal realm of Norse mythology as Kratos, a god of war haunted by his past. Guided by his son Atreus, forge a new path across the Nine Realms — facing monsters, gods, and the darkest corners of a father''s heart. A saga of rage, loss, and redemption unlike anything else in gaming.',
 'Action', 499999, 0, 'game_69fda1f0147a6.jpg', 0, '2022-01-14',
 'Santa Monica Studio', 'Sony Interactive Entertainment',
 'Windows 10 64-bit', 'Intel i5-6600K / AMD Ryzen 5 2600X', '8 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 5500 XT 8GB', '70 GB'),

('Red Dead Redemption 2',
 'America, 1899. The age of outlaws is dying. As Arthur Morgan, loyal soldier of the Van der Linde gang, navigate a nation tearing itself apart. Every choice carries weight, every relationship has consequence, and the frontier holds as many dangers as it does wonders. The most immersive open world ever crafted.',
 'Action', 449999, 0, 'game_69fda3c4871e9.jpg', 0, '2019-11-05',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i7-4770K / AMD Ryzen 5 1500X', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 480 4GB', '150 GB'),

('Sekiro: Shadows Die Twice',
 'Resurrection is not the end. You are a shinobi in late-1500s Sengoku Japan, stripped of your arm and your honor. Reclaim both through razor-sharp swordplay, cunning traversal, and relentless pursuit. Death is a lesson — master it, and nothing can stop you.',
 'Action', 449999, 0, 'game_69fda3cc50e5d.png', 0, '2019-03-22',
 'FromSoftware', 'Activision',
 'Windows 10 64-bit', 'Intel Core i5-2500K / AMD Ryzen 5 1400', '8 GB RAM', 'NVIDIA GTX 970 / AMD Radeon RX 470', '25 GB'),

('Grand Theft Auto V',
 'Three criminals. One city. Infinite chaos. Los Santos is a sun-soaked sprawl of the superficial, where the pursuit of the dollar rules all. Switch between three protagonists — each with their own story — to pull off daring heists, outrun the law, and leave your mark on Southern San Andreas.',
 'Action', 249999, 50, 'game_69fda4041098d.jpg', 0, '2015-04-14',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i5 3470 / AMD FX-8350', '8 GB RAM', 'NVIDIA GTX 660 2GB / AMD HD 7870 2GB', '72 GB'),

('Cyberpunk 2077',
 'Night City never sleeps, and neither will you. Step into a neon-drenched megalopolis of 2077 as V, a mercenary chasing immortality through a black-market implant holding the mind of a legend. In a city where corpo power and street violence collide, every choice reshapes your destiny.',
 'RPG', 349999, 20, 'game_69fda42c998a6.jpg', 0, '2020-12-10',
 'CD Projekt Red', 'CD Projekt',
 'Windows 10 64-bit', 'Intel Core i7-6700K / AMD Ryzen 5 1600', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 580 8GB', '70 GB'),

('The Witcher 3: Wild Hunt',
 'The world is a brutal, beautiful place — and someone has to hunt its monsters. As Geralt of Rivia, traverse war-ravaged kingdoms, forge uneasy alliances, and face the hardest choices you''ll ever make. With over 200 hours of content, this is one of the greatest RPGs ever made.',
 'RPG', 299999, 0, 'game_69fda4b6cd84a.jpg', 0, '2015-05-19',
 'CD Projekt Red', 'CD Projekt',
 'Windows 7/8/10 64-bit', 'Intel Core i5-2500K / AMD Phenom II X4 940', '6 GB RAM', 'NVIDIA GeForce GTX 770 / AMD Radeon R9 290', '50 GB'),

('Elden Ring',
 'Death is not the end. In the shattered Lands Between, rise as the Tarnished — exiled, forgotten, called back to claim the power of the Elden Ring. A vast open world of breathtaking vistas and punishing challenges awaits. Forge your legend, become an Elden Lord.',
 'RPG', 549999, 0, 'game_69fda4bfb6d4f.png', 0, '2022-02-25',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 10/11 64-bit', 'Intel Core i5-8600K / AMD Ryzen 5 3600X', '12 GB RAM', 'NVIDIA GeForce GTX 1070 8GB / AMD RX Vega 56 8GB', '60 GB'),

('Dark Souls III',
 'The fire fades, and the Lords of Cinder rise. Stand as the last warrior in a dying world where perseverance is the only weapon that truly matters. Dark Souls III is a masterwork of atmospheric world design, demanding combat, and the quiet triumph of never giving up.',
 'RPG', 249999, 30, 'game_69fda4d9802ad.jpg', 0, '2016-04-12',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 7/8/10 64-bit', 'Intel Core i7-3770 / AMD FX-8350', '8 GB RAM', 'NVIDIA GeForce GTX 750 Ti / AMD Radeon HD 7950', '15 GB'),

('Disco Elysium',
 'You are a detective with no memory, no partner, and a city full of secrets. Disco Elysium is a groundbreaking RPG where a unique skill system lets you shape not just your character, but your politics, your philosophy, and your sanity. One of the most original games ever made.',
 'RPG', 299999, 0, 'game_69fdc89b34b73.jpg', 0, '2019-10-15',
 'ZA/UM', 'ZA/UM',
 'Windows 7/8/10 64-bit', 'Intel Core i5-7600K', '8 GB RAM', 'NVIDIA GeForce GTX 1060', '15 GB'),

('Path of Exile',
 'Exiled to the dark continent of Wraeclast, you must claw your power back from nothing. Path of Exile is a deep, relentlessly complex action RPG with hundreds of hours of content, an unmatched passive skill tree, and a thriving economy — completely free to play.',
 'RPG', 0, 0, 'game_69fdc8c1410b7.jpg', 1, '2013-10-23',
 'Grinding Gear Games', 'Grinding Gear Games',
 'Windows 7/8/10 64-bit', 'Intel Quad Core / AMD Six Core', '8 GB RAM', 'NVIDIA GeForce GTX 650 Ti / ATI Radeon HD 7850', '40 GB'),

('Among Us',
 'Trust no one. Aboard a starship hurtling through space, crew members scramble to complete tasks while Impostors sabotage from the shadows. A game of deception, deduction, and sudden betrayal for 4 to 15 players. Every round tells a different story.',
 'Strategy', 49999, 0, 'game_69fdc8ed9d6b5.jpg', 0, '2018-06-15',
 'Innersloth', 'Innersloth',
 'Windows 7 64-bit', 'Intel Core i5-6600 / AMD Athlon X4 880K', '4 GB RAM', 'GeForce 740M or equivalent', '250 MB'),

('Civilization VI',
 'One more turn. Lead your civilization from ancient origins to a space-faring future in the deepest strategy game in the series. Build cities, pursue diplomacy, wage war, and outpace rival leaders across hundreds of hours of ever-shifting grand strategy.',
 'Strategy', 379999, 40, 'game_69fdc954dc071.jpg', 0, '2016-10-21',
 'Firaxis Games', '2K Games',
 'Windows 7/8/10 64-bit', 'Intel Core i5-4460K / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GTX 970 / AMD R9 290X', '12 GB'),

('Total War: WARHAMMER III',
 'Daemonic legions pour through the rifts of reality. In the most ambitious Total War ever made, command vast armies across a world on the brink of annihilation. Real-time tactical battles meet deep turn-based campaign strategy in the ultimate dark fantasy war.',
 'Strategy', 499999, 25, 'game_69fdc98b5f286.jpg', 0, '2022-02-17',
 'Creative Assembly', 'Sega',
 'Windows 10 64-bit', 'Intel Core i5-6600K / AMD Ryzen 5 1600X', '8 GB RAM', 'NVIDIA GeForce GTX 900 / AMD RX 480', '120 GB'),

('Stardew Valley',
 'Leave the grind behind. Your grandfather''s old farm in Stardew Valley is overgrown, quiet, and full of potential. Grow crops, raise animals, mine for treasure, befriend your neighbors, and build the life you always wanted — at your own pace.',
 'Simulation', 99999, 0, 'game_69fd9009c8247.jpg', 0, '2016-02-26',
 'ConcernedApe', 'ConcernedApe',
 'Windows Vista / 7 / 8 / 10', 'Intel Core 2 Duo 2.0 GHz', '2 GB RAM', 'GeForce 450 GTS / Radeon HD 5750', '500 MB'),

('Minecraft',
 'Every world is yours to shape. Dig into the earth, raise towering castles, survive the night, or explore an infinite procedurally generated world with friends. Minecraft is a canvas limited only by your imagination — and it has been captivating players for over a decade.',
 'Simulation', 199999, 0, 'game_69fdc9d27e4e2.jpg', 0, '2011-11-18',
 'Mojang Studios', 'Xbox Game Studios',
 'Windows 10/11 64-bit', 'Intel Core i5-4690 / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GeForce 700 Series / AMD Radeon RX 200', '4 GB'),

('Terraria',
 'A world of possibility lurks beneath your feet. Dig, craft, build, and fight in a rich pixel-art world brimming with hidden treasures, fearsome bosses, and hundreds of hours of content. Terraria is endless adventure wrapped in pure sandbox freedom.',
 'Simulation', 79999, 0, 'game_69fdcac3cd52b.jpg', 0, '2011-05-16',
 'Re-Logic', 'Re-Logic',
 'Windows XP / Vista / 7 / 8 / 10', 'Intel Pentium D or AMD Athlon 64 X2', '2.5 GB RAM', 'GeForce 6800 / Radeon HD 5770', '200 MB'),

('Hollow Knight',
 'An ancient kingdom lies in ruin beneath the surface. As a small, determined knight, descend into Hallownest — a hauntingly beautiful underground world of fierce warriors, forgotten lore, and a plague that threatens to consume everything. One of the finest action-platformers ever made.',
 'Indie', 129999, 50, 'game_69fdcadbc0355.jpg', 0, '2017-02-24',
 'Team Cherry', 'Team Cherry',
 'Windows 7 64-bit', 'Intel Core 2 Duo E5200', '4 GB RAM', 'GeForce 9800GTX+ (1GB)', '9 GB'),

('Hades',
 'Hell has never been this stylish. Defy your father — the god of the dead himself — in this award-winning roguelike. Every escape attempt through the Underworld deepens the story, sharpens your build, and draws you deeper into a narrative as gripping as any in gaming.',
 'Indie', 199999, 0, 'game_69fdcb1638437.png', 0, '2020-09-17',
 'Supergiant Games', 'Supergiant Games',
 'Windows 7 64-bit', 'Dual Core 2.4 GHz', '8 GB RAM', 'NVIDIA GTX 850M or equivalent', '15 GB'),

('Celeste',
 'The mountain tests more than your reflexes. Guide Madeline through a brutally precise platforming journey to the summit of Celeste Mountain — a deeply personal story about anxiety, self-doubt, and finding the courage to keep climbing. Challenging, beautiful, and unforgettable.',
 'Indie', 99999, 40, 'game_69fdcb2b8be39.png', 0, '2018-01-25',
 'Extremely OK Games', 'Extremely OK Games',
 'Windows Vista / 7 / 8 / 10', 'Intel Core i3 M380', '2 GB RAM', 'OpenGL 3.0 compatible', '1.2 GB'),

('Dota 2',
 'The battlefield never plays the same way twice. Dota 2 is a 5v5 strategic battle where over 100 unique heroes clash in a contest of skill, coordination, and ingenuity. With no pay-to-win mechanics and a skill ceiling that has no limit, it is the deepest free-to-play competitive game ever made.',
 'Multiplayer', 0, 0, 'game_69fdcf72ddebb.png', 1, '2013-07-09',
 'Valve', 'Valve',
 'Windows 7 / Vista / XP', 'Intel Core 2 Duo E7400', '4 GB RAM', 'NVIDIA GeForce 8600 GT / ATI Radeon HD 2600 XT', '15 GB'),

('Counter-Strike 2',
 'Two decades of competitive excellence, rebuilt from the ground up. Counter-Strike 2 brings the world''s most iconic tactical shooter into a new era with sub-tick servers, overhauled maps, and a visual refresh — while preserving the pure, skill-based gameplay that defined competitive FPS forever.',
 'Multiplayer', 0, 0, 'game_69fdcb6e089cf.jpeg', 1, '2023-09-27',
 'Valve', 'Valve',
 'Windows 10 64-bit', 'Intel Core i5-750 / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon RX 470', '85 GB'),

('Apex Legends',
 'Drop in. Gear up. Become a champion. In the ever-evolving battle royale of Apex Legends, master a diverse roster of Legends with unique abilities and fight to be the last squad standing on the Frontier. Fast-paced, team-focused, and completely free to play.',
 'Multiplayer', 0, 0, 'game_69fdcb8472ca7.jpg', 1, '2019-02-04',
 'Respawn Entertainment', 'Electronic Arts',
 'Windows 10 64-bit', 'Intel Core i5-3570K / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon R9 290', '56 GB');

-- ============================================================
-- SEED: Game Images (screenshots)
-- ============================================================

INSERT IGNORE INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fda1f015e66.jpg', 1 FROM games WHERE title = 'God of War';

INSERT IGNORE INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fd945138996.png', 1 FROM games WHERE title = 'Stardew Valley';

INSERT IGNORE INTO game_images (game_id, filename, sort_order)
SELECT id, 'shot_69fd945139dec.jpg', 2 FROM games WHERE title = 'Stardew Valley';

-- ============================================================
-- SEED: Support Articles
-- ============================================================

INSERT IGNORE INTO support_articles (category, title, content, views) VALUES

('Refund',
 'How to request a refund for a purchased game',
 'UAP offers refunds within 14 days of purchase provided total playtime is under 2 hours.\n\nSTEPS TO REQUEST A REFUND:\n1. Go to Support > Contact Us.\n2. Select "Refund" as the issue category.\n3. Fill in your name, email, and describe the game and reason for refund.\n4. Submit the form. Our team will review within 1-3 business days.\n5. If approved, funds are returned to your original payment method within 3-7 business days.\n\nNOTES:\n- DLC, in-game items, and UAP Wallet top-ups are not eligible for refund.\n- Games with more than 2 hours of playtime are not eligible.\n- Refund requests older than 14 days from purchase date will be declined.\n\nIf you have questions about your refund status, contact our support team directly.',
 8400),

('Installation & Download',
 'Fixing "Game failed to launch" error',
 'The "Game failed to launch" error usually occurs due to missing files, driver issues, or software conflicts.\n\nSOLUTIONS (try in order):\n1. RESTART THE CLIENT — Close UAP completely and reopen it.\n2. VERIFY GAME FILES — Go to your Library, right-click the game, select "Verify Integrity of Game Files."\n3. UPDATE GPU DRIVERS — Visit your GPU manufacturer''s website (NVIDIA, AMD, or Intel) and install the latest drivers.\n4. RUN AS ADMINISTRATOR — Right-click the game executable and select "Run as administrator."\n5. DISABLE ANTIVIRUS TEMPORARILY — Some antivirus software blocks game executables. Add UAP and the game folder to your antivirus exclusions list.\n6. REINSTALL DIRECTX & VISUAL C++ — Download and reinstall the latest DirectX and Microsoft Visual C++ Redistributables from the Microsoft website.\n7. REINSTALL THE GAME — Uninstall the game from your Library, then reinstall it.\n\nIf none of the above steps resolve the issue, please contact our support team with your system specifications and the exact error message.',
 6100),

('Account Security',
 'How to enable Two-Factor Authentication (2FA)',
 'Two-Factor Authentication adds an extra layer of security to your UAP account by requiring a verification code in addition to your password.\n\nHOW TO ENABLE 2FA:\n1. Log in to your UAP account.\n2. Go to Profile > Settings > Security.\n3. Under "Two-Factor Authentication," click "Enable."\n4. Choose your preferred method: Authenticator App (recommended) or SMS.\n5. Follow the on-screen setup instructions.\n6. Save your backup codes in a secure location.\n\nUSING AN AUTHENTICATOR APP:\n- Download Google Authenticator, Authy, or Microsoft Authenticator on your phone.\n- Scan the QR code shown on the UAP settings page.\n- Enter the 6-digit code from the app to confirm setup.\n\nIMPORTANT:\n- Store your backup codes somewhere safe. If you lose access to your authenticator app, backup codes are the only way to recover your account.\n- If you change phones, transfer your authenticator before wiping the old device.\n\nEnabling 2FA is strongly recommended for all accounts.',
 5700),

('Installation & Download',
 'Slow game downloads — solutions and tips',
 'Slow download speeds can be caused by your internet connection, server load, or background applications.\n\nQUICK FIXES:\n1. PAUSE AND RESUME — Sometimes pausing and resuming the download resets the connection to a faster server.\n2. CHECK YOUR INTERNET — Run a speed test at fast.com. If speeds are low, try restarting your router.\n3. USE ETHERNET — A wired connection is significantly faster and more stable than Wi-Fi.\n4. CLOSE BACKGROUND APPS — Close streaming services, browser tabs, and other downloads that consume bandwidth.\n5. SCHEDULE DOWNLOADS — Download during off-peak hours (late night or early morning) when servers are less busy.\n6. CHECK FOR UPDATES — Make sure UAP itself is up to date. Outdated clients can have slower download pipelines.\n\nADVANCED:\n- In UAP Settings > Downloads, you can set a download bandwidth limit. Make sure it is not set too low.\n- Temporarily disable your VPN if you are using one — VPNs can significantly reduce download speeds.\n\nIf download speeds remain consistently below 1 MB/s, contact your internet service provider or our support team.',
 4200),

('Account & Login',
 'Forgot password — how to reset your UAP account',
 'If you have forgotten your password, you can reset it from the login page.\n\nSTEPS TO RESET YOUR PASSWORD:\n1. Go to the UAP login page.\n2. Click "Forgot Password?" below the login form.\n3. Enter the email address associated with your account.\n4. Check your inbox for a password reset email (also check your spam folder).\n5. Click the reset link in the email — it is valid for 24 hours.\n6. Enter and confirm your new password.\n7. Log in with your new password.\n\nDID NOT RECEIVE THE EMAIL?\n- Wait up to 5 minutes and refresh your inbox.\n- Check your spam or junk folder.\n- Make sure you entered the correct email address.\n- If the email still does not arrive, contact our support team.\n\nNOTE: If you no longer have access to the email address on your account, contact support with proof of account ownership (such as purchase history or original registration details).',
 3800),

('Purchase & Payment',
 'Payment methods available on UAP',
 'UAP supports a wide range of payment methods to make purchasing games as convenient as possible.\n\nACCEPTED PAYMENT METHODS:\n- Bank Transfer (all major Indonesian banks)\n- QRIS (scan-to-pay from any banking or e-wallet app)\n- GoPay\n- OVO\n- Dana\n- ShopeePay\n- Visa Credit / Debit Card\n- Mastercard Credit / Debit Card\n\nPAYMENT ISSUES:\n- If your payment was deducted but the game did not appear in your library, wait up to 15 minutes and refresh your library.\n- If the issue persists after 15 minutes, contact support with your transaction receipt.\n- For failed payments, verify that your card or e-wallet has sufficient balance and that the billing details are correct.\n\nAll transactions on UAP are secured with SSL encryption.',
 3100),

('Account & Login',
 'How to change your email address',
 'You can change the email address linked to your UAP account from your profile settings.\n\nSTEPS TO CHANGE EMAIL:\n1. Log in to your account.\n2. Go to Profile > Settings > Edit Profile.\n3. In the Email field, enter your new email address.\n4. Click "Save Changes."\n5. A verification email will be sent to your new address.\n6. Click the link in the verification email to confirm the change.\n\nIMPORTANT:\n- You must have access to the new email address before making the change.\n- After changing your email, use the new address to log in.\n- If you did not request an email change, contact our support team immediately as your account may be compromised.\n\nIf you cannot access your current email, contact support with proof of account ownership.',
 2600),

('Account Security',
 'What to do if your account is hacked',
 'If you suspect your account has been accessed without your permission, act quickly to secure it.\n\nIMMEDIATE STEPS:\n1. CHANGE YOUR PASSWORD — If you can still log in, go to Profile > Settings and change your password immediately.\n2. ENABLE 2FA — Turn on Two-Factor Authentication to prevent further unauthorized access.\n3. CHECK ACTIVE SESSIONS — Review any unfamiliar login activity in your account settings.\n4. CONTACT SUPPORT — Submit a ticket via Support > Contact Us, selecting "Account Security" as the category.\n\nWHEN CONTACTING SUPPORT, PROVIDE:\n- Your registered email address\n- Approximate date you noticed suspicious activity\n- Any purchase history you can recall (helps verify ownership)\n- The email address you want the account recovered to\n\nOur team will investigate and respond within 24 hours. Do not share your password or personal details with anyone claiming to be UAP staff outside of our official support channels.',
 2200),

('Installation & Download',
 'How to verify and repair game files',
 'If a game crashes, fails to launch, or behaves unexpectedly, corrupted or missing files may be the cause.\n\nHOW TO VERIFY GAME FILES:\n1. Open UAP and go to your Library.\n2. Find the game with issues.\n3. Click the settings icon next to the game.\n4. Select "Verify Integrity of Game Files."\n5. UAP will scan all game files and automatically re-download any that are missing or corrupted.\n6. Once verification is complete, try launching the game again.\n\nNOTES:\n- Verification may take several minutes depending on the size of the game.\n- Do not close the UAP client during verification.\n- If the game continues to have issues after verification, try a full uninstall and reinstall.\n- Antivirus software can sometimes quarantine game files and cause verification to fail repeatedly. Add the UAP games folder to your antivirus exclusions list.',
 1900),

('Purchase & Payment',
 'Understanding your purchase history',
 'Your purchase history is a record of all games and transactions made on your UAP account.\n\nHOW TO VIEW PURCHASE HISTORY:\n1. Log in to your account.\n2. Go to Profile > Settings.\n3. Your recent purchases are listed under the "Purchase History" section.\n\nEACH ENTRY SHOWS:\n- Game title\n- Date and time of purchase\n- Amount paid\n- Payment method used\n- Transaction status\n\nIF A PURCHASE IS MISSING:\n- Check that you are logged into the correct account.\n- Wait up to 15 minutes after payment for the transaction to appear.\n- If it still does not appear and payment was deducted, contact support with your payment receipt.\n\nYour purchase history is also useful when contacting support about refunds or missing items, so keep your transaction receipts when possible.',
 1500);

-- ============================================================
-- SEED: Community (library, posts, reviews)
-- Membutuhkan minimal 1 user dengan id = 1.
-- Jika belum ada, semua baris di bawah dilewati otomatis.
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  47, 1, 1, NOW() FROM games WHERE title = 'God of War';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  12, 1, 0, NOW() FROM games WHERE title = 'Red Dead Redemption 2';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  83, 0, 1, NOW() FROM games WHERE title = 'Sekiro: Shadows Die Twice';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,   5, 0, 0, NOW() FROM games WHERE title = 'Grand Theft Auto V';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id, 120, 1, 1, NOW() FROM games WHERE title = 'Cyberpunk 2077';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  33, 1, 0, NOW() FROM games WHERE title = 'The Witcher 3: Wild Hunt';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,   8, 0, 0, NOW() FROM games WHERE title = 'Elden Ring';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  61, 1, 0, NOW() FROM games WHERE title = 'Dark Souls III';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  22, 0, 1, NOW() FROM games WHERE title = 'Disco Elysium';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT 1, id,  15, 1, 0, NOW() FROM games WHERE title = 'Path of Exile';

INSERT IGNORE INTO posts (user_id, title, content, category)
SELECT 1, 'Welcome to UAP Community!', 'This is the official community hub for all UAP players. Share your thoughts, reviews, and guides here. Excited to see this platform grow!', 'Announcement'
FROM users WHERE id = 1;

INSERT IGNORE INTO posts (user_id, title, content, category)
SELECT 1, 'Tips for beginners — getting started', 'If you are new here, start with the free-to-play games to get a feel for the platform. Check the library tab to manage your games. Happy gaming!', 'General'
FROM users WHERE id = 1;

INSERT IGNORE INTO posts (user_id, title, content, category)
SELECT 1, 'God of War — the story is incredible', 'Just finished the main story. The relationship between Kratos and Atreus is written so well. If you have not played it yet, highly recommended.', 'Game Discussion'
FROM users WHERE id = 1;

INSERT IGNORE INTO posts (user_id, title, content, category)
SELECT 1, 'How do I install a game?', 'Hi, I bought a game but cannot figure out how to install it. The install button does not seem to do anything. Any help appreciated!', 'Tech Support'
FROM users WHERE id = 1;

INSERT IGNORE INTO posts (user_id, title, content, category)
SELECT 1, 'Trading: looking for RPG recommendations', 'I have been mostly playing action games. Anyone have recommendations for a good RPG to start with on this platform?', 'Trading'
FROM users WHERE id = 1;

INSERT IGNORE INTO reviews (user_id, game_id, rating, content)
SELECT 1, id, 5, 'One of the best action games ever made. The combat is fluid, the story is emotional, and the world-building is top-notch. A must-play for any gamer.'
FROM games WHERE title = 'God of War';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content)
SELECT 1, id, 4, 'Incredible open world with so much to explore. The main quest is fantastic. Some side missions feel repetitive but overall an amazing experience.'
FROM games WHERE title = 'Sekiro: Shadows Die Twice';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content)
SELECT 1, id, 5, 'After 120 hours I still find new things to discover. The modding community keeps this game alive years after release. Absolute classic.'
FROM games WHERE title = 'Cyberpunk 2077';
