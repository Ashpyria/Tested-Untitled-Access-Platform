-- ============================================================
-- SEED: Games
-- ============================================================

INSERT IGNORE INTO games (title, description, genre, price, discount, image, is_free, release_date, developer, publisher, req_os, req_processor, req_memory, req_graphics, req_storage) VALUES

-- Action
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

-- RPG
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

-- Strategy
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

-- Simulation
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

-- Indie
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

-- Multiplayer
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
-- Jika user belum ada, semua baris di bawah dilewati otomatis.
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

-- ============================================================
-- SEED: Users
-- Password semua user: seed1234
-- ============================================================

INSERT IGNORE INTO users (username, email, password, bio, country, role) VALUES
('riftwalker', 'riftwalker@uap.dev',  '$2y$10$K3MJvxmrSwbyWwucSQIjMObFUx9LmFXnxaevwyAhbseJtuZz6Ip4q', 'Action RPG enthusiast. Lover of challenging combat and deep lore. Souls veteran.', 'Indonesia', 'user'),
('starforge',  'starforge@uap.dev',   '$2y$10$i5gh4yC2x8d4K5tnGUnU5ulnLp.EIsdm4xb7gSXL6XWpUR/FThsfy', 'Strategy gamer who loves building empires one turn at a time. Civ VI veteran.', 'Malaysia', 'user'),
('novazen',    'novazen@uap.dev',     '$2y$10$CaAr/yntTfXsyvZbZ/RQgeKZNZeiyPoZZKSIWpKAWrZLgodDft7lu', 'Indie game collector and pixel art enthusiast. Hades is my religion.', 'Singapore', 'user'),
('pixeldawn',  'pixeldawn@uap.dev',   '$2y$10$CVxfgA19n3.2O2J0sQc8TuU6BMZQk/rmqD1yGD1YX1HUajcDGWaH6', 'Competitive multiplayer player. CS2 and Dota main. Always climbing the ladder.', 'Indonesia', 'user'),
('ironveil',   'ironveil@uap.dev',    '$2y$10$vcCMRanedEOorVNcSSTS/ukd0a3mAG6G2yOAMek16Z6VCKzmt9xmW', 'RPG veteran. 500+ hours in The Witcher 3 and still going strong.', 'Philippines', 'user'),
('echobyte',   'echobyte@uap.dev',    '$2y$10$neuGAY5IO4fgQR5cijPHqeWg2GA.GzwFAa6Nw17fRnaCJeSJj.2BW', 'Simulation and sandbox lover. If I can build it, I will. Stardew Valley changed my life.', 'Thailand', 'user');

-- ============================================================
-- SEED: Achievements
-- ============================================================

INSERT INTO achievements (name, description, rarity) SELECT 'First Step',       'Purchase your first game on UAP.',                      'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'First Step');
INSERT INTO achievements (name, description, rarity) SELECT 'Game Collector',   'Own 5 or more games in your library.',                  'Rare'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Game Collector');
INSERT INTO achievements (name, description, rarity) SELECT 'Dedicated Gamer',  'Log a total of 10 hours across all games.',             'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Dedicated Gamer');
INSERT INTO achievements (name, description, rarity) SELECT 'Weekend Warrior',  'Log a total of 50 hours across all games.',             'Rare'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Weekend Warrior');
INSERT INTO achievements (name, description, rarity) SELECT 'Century Club',     'Log a total of 100 hours across all games.',            'Epic'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Century Club');
INSERT INTO achievements (name, description, rarity) SELECT 'Legendary Hours',  'Log a total of 500 hours across all games.',            'Legendary' WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Legendary Hours');
INSERT INTO achievements (name, description, rarity) SELECT 'First Review',     'Write your first game review.',                         'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'First Review');
INSERT INTO achievements (name, description, rarity) SELECT 'Community Voice',  'Write reviews for 3 or more different games.',          'Rare'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Community Voice');
INSERT INTO achievements (name, description, rarity) SELECT 'Forum Regular',    'Create your first post in the community.',              'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Forum Regular');
INSERT INTO achievements (name, description, rarity) SELECT 'Scholar',          'Publish a guide to help other players.',                 'Rare'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Scholar');
INSERT INTO achievements (name, description, rarity) SELECT 'Bargain Hunter',   'Purchase a game that is currently on sale.',            'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Bargain Hunter');
INSERT INTO achievements (name, description, rarity) SELECT 'Free Loader',      'Add a free-to-play game to your library.',              'Common'    WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Free Loader');
INSERT INTO achievements (name, description, rarity) SELECT 'Social Butterfly', 'Have 3 or more accepted friends on UAP.',               'Rare'      WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Social Butterfly');
INSERT INTO achievements (name, description, rarity) SELECT 'Early Adopter',    'One of the first players to join the UAP platform.',    'Legendary' WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE name = 'Early Adopter');

-- ============================================================
-- SEED: Library — riftwalker
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 134, 1, 1, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM games WHERE title='God of War';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 210, 1, 1, DATE_SUB(NOW(), INTERVAL 55 DAY) FROM games WHERE title='Elden Ring';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id,  98, 1, 0, DATE_SUB(NOW(), INTERVAL 40 DAY) FROM games WHERE title='Dark Souls III';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id,  76, 0, 1, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM games WHERE title='Sekiro: Shadows Die Twice';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id,  45, 1, 0, DATE_SUB(NOW(), INTERVAL 20 DAY) FROM games WHERE title='Hollow Knight';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id,  22, 0, 0, DATE_SUB(NOW(), INTERVAL 10 DAY) FROM games WHERE title='Hades';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 180, 1, 0, DATE_SUB(NOW(), INTERVAL  5 DAY) FROM games WHERE title='Grand Theft Auto V';

-- ============================================================
-- SEED: Library — starforge
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 320, 1, 1, DATE_SUB(NOW(), INTERVAL 90 DAY) FROM games WHERE title='Civilization VI';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 155, 1, 1, DATE_SUB(NOW(), INTERVAL 70 DAY) FROM games WHERE title='Total War: WARHAMMER III';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id,  88, 1, 0, DATE_SUB(NOW(), INTERVAL 50 DAY) FROM games WHERE title='Cyberpunk 2077';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 230, 1, 1, DATE_SUB(NOW(), INTERVAL 45 DAY) FROM games WHERE title='The Witcher 3: Wild Hunt';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id,  60, 0, 0, DATE_SUB(NOW(), INTERVAL 15 DAY) FROM games WHERE title='Disco Elysium';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 410, 1, 1, DATE_SUB(NOW(), INTERVAL  7 DAY) FROM games WHERE title='Path of Exile';

-- ============================================================
-- SEED: Library — novazen
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, 190, 1, 1, DATE_SUB(NOW(), INTERVAL 80 DAY) FROM games WHERE title='Hades';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, 112, 1, 1, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM games WHERE title='Hollow Knight';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id,  55, 1, 0, DATE_SUB(NOW(), INTERVAL 40 DAY) FROM games WHERE title='Celeste';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id,  78, 1, 1, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM games WHERE title='Stardew Valley';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id,  34, 0, 0, DATE_SUB(NOW(), INTERVAL 14 DAY) FROM games WHERE title='Terraria';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id,  95, 1, 0, DATE_SUB(NOW(), INTERVAL  3 DAY) FROM games WHERE title='Dota 2';

-- ============================================================
-- SEED: Library — pixeldawn
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 560, 1, 1, DATE_SUB(NOW(), INTERVAL 100 DAY) FROM games WHERE title='Counter-Strike 2';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 340, 1, 1, DATE_SUB(NOW(), INTERVAL  80 DAY) FROM games WHERE title='Dota 2';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 210, 1, 0, DATE_SUB(NOW(), INTERVAL  60 DAY) FROM games WHERE title='Apex Legends';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id,  88, 0, 0, DATE_SUB(NOW(), INTERVAL  30 DAY) FROM games WHERE title='Grand Theft Auto V';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id,  42, 1, 0, DATE_SUB(NOW(), INTERVAL  10 DAY) FROM games WHERE title='Among Us';

-- ============================================================
-- SEED: Library — ironveil
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 540, 1, 1, DATE_SUB(NOW(), INTERVAL 120 DAY) FROM games WHERE title='The Witcher 3: Wild Hunt';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 175, 1, 1, DATE_SUB(NOW(), INTERVAL  90 DAY) FROM games WHERE title='Cyberpunk 2077';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 130, 1, 0, DATE_SUB(NOW(), INTERVAL  60 DAY) FROM games WHERE title='Elden Ring';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id,  90, 0, 1, DATE_SUB(NOW(), INTERVAL  40 DAY) FROM games WHERE title='Disco Elysium';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 260, 1, 0, DATE_SUB(NOW(), INTERVAL  20 DAY) FROM games WHERE title='Red Dead Redemption 2';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id,  50, 1, 0, DATE_SUB(NOW(), INTERVAL   5 DAY) FROM games WHERE title='Dark Souls III';

-- ============================================================
-- SEED: Library — echobyte
-- ============================================================

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 480, 1, 1, DATE_SUB(NOW(), INTERVAL 110 DAY) FROM games WHERE title='Stardew Valley';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 360, 1, 1, DATE_SUB(NOW(), INTERVAL  90 DAY) FROM games WHERE title='Minecraft';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 200, 1, 0, DATE_SUB(NOW(), INTERVAL  70 DAY) FROM games WHERE title='Terraria';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 145, 0, 1, DATE_SUB(NOW(), INTERVAL  40 DAY) FROM games WHERE title='Civilization VI';

INSERT IGNORE INTO library (user_id, game_id, hours_played, is_installed, is_favorite, purchased_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id,  30, 1, 0, DATE_SUB(NOW(), INTERVAL  15 DAY) FROM games WHERE title='Among Us';

-- ============================================================
-- SEED: Posts
-- ============================================================

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'),
'Elden Ring vs Dark Souls III — which is harder?',
'After 200+ hours in Elden Ring and 98 hours in DS3, I think DS3 bosses are more mechanically demanding but Elden Ring has harder late game. The open world also lets you overlevel which changes the difficulty curve. What do you all think?',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 28 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='riftwalker');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'),
'My GPU died mid-game — is there a way to recover save data?',
'My RTX 3070 just died while I was playing God of War. PC restarted. Game progress seems fine but I am worried about corrupted files. Is there any way to back up save data on this platform?',
'Tech Support', DATE_SUB(NOW(), INTERVAL 14 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='riftwalker');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='starforge'),
'Civilization VI — best leader for beginners?',
'I have been playing Civ VI for 300+ hours and I always get asked this. My answer: Trajan (Rome). Tall playstyle, strong early game, and the automatic monument placement makes district management easy. Who is your beginner pick?',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 25 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='starforge');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='starforge'),
'UAP needs a wishlist feature',
'Would love to be able to wishlist games and get notified when they go on sale. This is a basic feature on most platforms. Any chance of it coming to UAP?',
'General', DATE_SUB(NOW(), INTERVAL 10 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='starforge');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='novazen'),
'Hades is the best roguelike ever made — change my mind',
'I have completed 35 escape runs and I still find new dialogue. The way the story progresses through death is genius. Supergiant outdid themselves. No other roguelike comes close for me.',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 20 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='novazen');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='novazen'),
'Hidden gems on UAP — what are you sleeping on?',
'Most people know God of War and Elden Ring but what about Celeste? A masterpiece that almost no one talks about. The platforming is incredibly tight and the story genuinely moved me. Drop your hidden gem picks below.',
'General', DATE_SUB(NOW(), INTERVAL  7 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='novazen');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'),
'CS2 tips for new players',
'After 560 hours I figured I would share what helped me the most: 1) Learn one map at a time. 2) Crosshair placement is everything. 3) Sound is a weapon. 4) Buy pattern matters more than K/D. Good luck out there.',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 18 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='pixeldawn');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='ironveil'),
'The Witcher 3 is still the best RPG after 10 years',
'I have replayed The Witcher 3 three times now. The writing in Hearts of Stone and Blood and Wine DLCs is better than most full games. CDPR set a bar that almost nobody has cleared since 2015.',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 22 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='ironveil');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='echobyte'),
'Stardew Valley 1.6 — what changed and is it worth revisiting?',
'The 1.6 update added so much content. New farm type, new events, expanded end game. If you stopped playing before 1.5 or 1.6 you owe it to yourself to come back. Easily another 100 hours.',
'Game Discussion', DATE_SUB(NOW(), INTERVAL 12 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='echobyte');

INSERT IGNORE INTO posts (user_id, title, content, category, created_at)
SELECT (SELECT id FROM users WHERE username='echobyte'),
'Looking to trade: Hollow Knight for Celeste',
'I have a spare Hollow Knight key from a bundle. Looking for someone who has Celeste to swap. DM me if interested.',
'Trading', DATE_SUB(NOW(), INTERVAL  4 DAY)
FROM DUAL WHERE EXISTS (SELECT 1 FROM users WHERE username='echobyte');

-- ============================================================
-- SEED: Reviews
-- ============================================================

-- riftwalker reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 5,
'Peak action game design. Every boss fight in Elden Ring teaches you something. The open world actually works for a souls game and the sense of discovery is unmatched. 210 hours and I have no regrets.',
DATE_SUB(NOW(), INTERVAL 50 DAY) FROM games WHERE title='Elden Ring';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 5,
'Hollow Knight is a masterpiece of art direction and game feel. The combat is precise, the world is hauntingly beautiful, and the lore rewards exploration. One of the best indie games ever made.',
DATE_SUB(NOW(), INTERVAL 18 DAY) FROM games WHERE title='Hollow Knight';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, 4,
'Dark Souls III has the best boss roster in the series. Some areas feel rushed but the highs are incredibly high. If you want to understand why people love FromSoftware games, start here.',
DATE_SUB(NOW(), INTERVAL  9 DAY) FROM games WHERE title='Dark Souls III';

-- starforge reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 5,
'320 hours and still going. Civilization VI rewards creative thinking and punishes passive play. The district system added genuine depth to city building. The best entry point to 4X strategy.',
DATE_SUB(NOW(), INTERVAL 80 DAY) FROM games WHERE title='Civilization VI';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 5,
'The Witcher 3 is the gold standard of open world RPGs. Every side quest feels hand-crafted. The writing is exceptional, the world reacts to your choices, and the DLC rivals full-price games.',
DATE_SUB(NOW(), INTERVAL 40 DAY) FROM games WHERE title='The Witcher 3: Wild Hunt';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, 4,
'Total War Warhammer III is the most content-rich TW game yet. The variety of factions is incredible. Performance can be rough in big battles but the campaign depth is worth it for strategy fans.',
DATE_SUB(NOW(), INTERVAL 12 DAY) FROM games WHERE title='Total War: WARHAMMER III';

-- novazen reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, 5,
'190 hours in Hades. Every single run is different. The voice acting is world-class, the art is stunning, and the way the narrative is woven into the gameplay loop is just genius. Mandatory play.',
DATE_SUB(NOW(), INTERVAL 70 DAY) FROM games WHERE title='Hades';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, 5,
'Celeste is not just about platforming — it is about mental health, perseverance, and self-acceptance. The gameplay is brutally precise but always fair. One of the most important games of the decade.',
DATE_SUB(NOW(), INTERVAL 35 DAY) FROM games WHERE title='Celeste';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, 4,
'Stardew Valley is pure comfort. Farming, mining, relationships, exploration — it does everything at a pace you control. A one-person dev achievement that put many AAA studios to shame.',
DATE_SUB(NOW(), INTERVAL 20 DAY) FROM games WHERE title='Stardew Valley';

-- pixeldawn reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 5,
'CS2 is the definitive competitive FPS. The sub-tick server system is a genuine upgrade. Gunplay is perfectly balanced and the skill ceiling is essentially infinite. 560 hours, still learning.',
DATE_SUB(NOW(), INTERVAL 60 DAY) FROM games WHERE title='Counter-Strike 2';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 4,
'Apex Legends has the best movement system in any battle royale. The ping system changed how teams communicate. Monetization is aggressive but the core game is free and excellent.',
DATE_SUB(NOW(), INTERVAL 25 DAY) FROM games WHERE title='Apex Legends';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, 3,
'Dota 2 is brilliant and brutal. The depth is unmatched in any MOBA but the learning curve will destroy you. Great game if you have friends to play with. Solo queue as a beginner is rough.',
DATE_SUB(NOW(), INTERVAL  8 DAY) FROM games WHERE title='Dota 2';

-- ironveil reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 5,
'540 hours in The Witcher 3 and I still notice details I missed before. The world is alive in a way no other RPG has achieved. Geralt is one of gaming''s greatest protagonists. An absolute must-play.',
DATE_SUB(NOW(), INTERVAL 85 DAY) FROM games WHERE title='The Witcher 3: Wild Hunt';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 5,
'Disco Elysium is unlike anything else in gaming. It is a novel that plays back. The skill system is creative, the writing is hilarious and profound, and Harry Du Bois is the most memorable RPG character ever written.',
DATE_SUB(NOW(), INTERVAL 35 DAY) FROM games WHERE title='Disco Elysium';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, 5,
'Red Dead Redemption 2 is the most immersive open world ever made. Arthur Morgan''s story is genuinely moving. The attention to detail is obsessive in the best possible way. Rockstar''s magnum opus.',
DATE_SUB(NOW(), INTERVAL 15 DAY) FROM games WHERE title='Red Dead Redemption 2';

-- echobyte reviews
INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 5,
'480 hours in Stardew Valley across multiple playthroughs. The game respects your time and rewards patience. ConcernedApe built something magical. Still the best farming sim and it is not close.',
DATE_SUB(NOW(), INTERVAL 100 DAY) FROM games WHERE title='Stardew Valley';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 5,
'Minecraft is genuinely infinite. 360 hours and I have barely scratched the surface of what is possible. The modding community extends it further still. A game for all ages and all playstyles.',
DATE_SUB(NOW(), INTERVAL  55 DAY) FROM games WHERE title='Minecraft';

INSERT IGNORE INTO reviews (user_id, game_id, rating, content, created_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, 4,
'Terraria packs more content into 200 MB than most 60 GB games. The progression from wood pickaxe to endgame is incredibly satisfying. Best played with a friend but great solo too.',
DATE_SUB(NOW(), INTERVAL  25 DAY) FROM games WHERE title='Terraria';

-- ============================================================
-- SEED: Guides
-- ============================================================

INSERT IGNORE INTO guides (user_id, game_id, title, content, views, created_at)
SELECT
    (SELECT id FROM users WHERE username='riftwalker'),
    (SELECT id FROM games WHERE title='Elden Ring'),
    'Elden Ring — Complete Beginner Guide (Stats, Weapons, and Survival)',
'# Elden Ring Beginner Guide

## Choosing Your Class
For beginners, **Vagabond** is the safest pick. High starting Vigor and Strength means you survive more hits while learning the combat. Avoid Wretch unless you enjoy pain.

## The Most Important Stat: Vigor
Vigor controls your HP. Always keep Vigor around the same level as your other stats — ideally 40 Vigor before endgame. Dying in one hit is almost always a Vigor problem.

## Weapon Scaling Explained
Each weapon scales with one or more stats (Str, Dex, Int, Fai, Arc). Match your weapon to your build:
- **Strength build** → two-hand weapons for 1.5x Strength bonus
- **Dexterity build** → fast weapons, bleed builds are powerful
- **Intelligence build** → Glintstone spells, Moonveil Katana

## Survival Tips
1. Always look for ways around enemies before fighting them
2. Torrent (your horse) is available in most open-world areas — use him
3. Stake of Marika respawn points save you running back to bosses
4. The map reveals itself when you pick up Map Fragments — explore to find them
5. Grace Sites level you up — never pass one without activating it

## First Boss: Margit the Fell Omen
- Summon Rogier at the golden sign outside the fog gate
- Attack during his long combo finishers
- When he pulls out the golden hammer, dodge backwards twice
- Margit''s Shackle item (buy from Patches) staggers him twice in phase 1

Good luck, Tarnished.',
3420, DATE_SUB(NOW(), INTERVAL 45 DAY);

INSERT IGNORE INTO guides (user_id, game_id, title, content, views, created_at)
SELECT
    (SELECT id FROM users WHERE username='starforge'),
    (SELECT id FROM games WHERE title='Civilization VI'),
    'Civilization VI — How to Win Your First Game on Prince Difficulty',
'# Winning Your First Civ VI Game

## Pick the Right Leader
**Trajan (Rome)** is ideal for beginners. His unique ability gives every new city a free monument, which means you get Culture faster without spending Production. Strong all-around with no glaring weaknesses.

## The First 50 Turns
1. **Scout immediately** — build a Scout before anything else to explore and meet City-States
2. **Settle on Production tiles** — Hills + Rivers give Production + Housing which you need early
3. **Build a Slinger → Warrior → Monument** in your capital
4. **Research Animal Husbandry first** to reveal Horses and Pasture tiles
5. **Research Bronze Working** to reveal Iron and build Chop improvements

## District Priority
Build districts in this order for a balanced game:
1. **Campus** (Science) — research is the backbone of everything
2. **Commercial Hub** (Gold) — Gold pays for units and city purchases
3. **Encampment** (Military) — protects against AI aggression around turn 100

## Religion Tips (Optional but Powerful)
- Build a **Holy Site** in a city with high Faith yields (forest, mountains)
- Found a religion early to get a powerful Belief bonus
- **Tithe** (4 Gold per 4 followers) or **Work Ethic** (+Production) are strong Beliefs

## Winning Condition: Science Victory
Target for beginners:
1. Research all techs in the modern era
2. Build Spaceport
3. Launch Satellite → Moon Landing → Mars Colony in sequence
4. The AI rarely focuses science, so you should get there first on Prince

Good luck, future world leader.',
2180, DATE_SUB(NOW(), INTERVAL 38 DAY);

INSERT IGNORE INTO guides (user_id, game_id, title, content, views, created_at)
SELECT
    (SELECT id FROM users WHERE username='novazen'),
    (SELECT id FROM games WHERE title='Hades'),
    'Hades — Best Boons and Builds for Your First Clear',
'# Hades First Clear Guide

## Understanding Boons
Boons are abilities granted by Olympian gods each room. Each god has a theme:
- **Zeus** → Lightning, chain damage, great for crowds
- **Poseidon** → Knockback, gold synergies, very good on boss fights
- **Ares** → Doom (delayed damage), great sustained damage
- **Athena** → Deflect, defence, survivability
- **Artemis** → Critical hits, high burst damage

## Best Starter Build: Poseidon + Artemis
1. Take **Poseidon Special** (flood the area around you on Special)
2. Grab **Artemis Attack** (chance to Critical)
3. Look for **Deadly Strike** (raise Critical chance) in later chambers
4. The **Sea Storm** Duo Boon (Zeus + Poseidon) adds Lightning to every knock-away — devastating

## Escape Tool Priority
Spend Darkness in the Mirror on:
1. **Death Defiance** → extra lives (essential)
2. **Shadow Presence** → bonus damage when exiting a chamber
3. **Thick Skin** → bonus max HP

## Weapon Recommendation for Beginners
Start with the **Stygian Blade** (Aspect of Zagreus). It is well-rounded and predictable. Once you are comfortable, try the **Shield of Chaos** which lets you block damage.

## General Tips
- Charons shop appears every few chambers — save at least 150 gold for a heal
- Do not skip Wellspring chambers (free HP restore) early on
- Poms of Power upgrade a random Boon — save them for your best ability
- Talk to every NPC after every attempt to progress the story

Your first clear will come. Keep going.',
1850, DATE_SUB(NOW(), INTERVAL 30 DAY);

INSERT IGNORE INTO guides (user_id, game_id, title, content, views, created_at)
SELECT
    (SELECT id FROM users WHERE username='ironveil'),
    (SELECT id FROM games WHERE title='The Witcher 3: Wild Hunt'),
    'The Witcher 3 — Best Signs Build and Combat Tips',
'# The Witcher 3 Signs Build Guide

## What is a Signs Build?
Signs are Geralt''s magical abilities. A Signs build focuses on maximising Sign Intensity to deal massive damage through magic rather than swordplay. It is powerful and visually impressive.

## Core Skills (Max These First)
From the Signs skill tree:
- **Igni: Melt Armor** → enemies take more damage after burning
- **Aard: Aard Sweep** → knock down multiple enemies at once
- **Axii: Delusion** → works in dialogue to avoid fights and save money
- **Quen: Active Shield** → absorb damage and heal when the shield breaks

## Gear: Go Full Griffon
The **Griffon School Gear** set gives a massive bonus to Sign Intensity per piece. Priority:
1. Collect all Griffon diagrams from notice boards
2. Upgrade to Enhanced → Superior → Mastercrafted as you level
3. Use Cat Eyes or Killer Whale decoction for combat bonuses

## Combat Approach
1. Open with **Quen** (shield) always
2. Use **Aard** to knock enemies down, then land heavy attacks
3. Burn armored enemies with **Igni** first
4. **Yrden** slows Wraiths and ghosts — essential for those fights

## Alchemy Synergy
Thunderbolt potion (+Critical hit chance) pairs perfectly with Signs. Tawny Owl restores Stamina faster so you can cast more Signs. Always brew potions before hard fights.

Enjoy Toussaint.',
2640, DATE_SUB(NOW(), INTERVAL 22 DAY);

-- ============================================================
-- SEED: User Achievements
-- ============================================================

-- user 1 (assumed existing first user)
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 58 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 55 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 50 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 45 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 40 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT 1, id, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM achievements WHERE name='Early Adopter';

-- riftwalker
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 59 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 55 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 50 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 45 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 40 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 28 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 28 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='riftwalker'), id, DATE_SUB(NOW(), INTERVAL 20 DAY) FROM achievements WHERE name='Bargain Hunter';

-- starforge
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 88 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 85 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 80 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 75 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 70 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM achievements WHERE name='Legendary Hours';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 50 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 45 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 40 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 38 DAY) FROM achievements WHERE name='Scholar';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM achievements WHERE name='Bargain Hunter';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='starforge'), id, DATE_SUB(NOW(), INTERVAL 20 DAY) FROM achievements WHERE name='Early Adopter';

-- novazen
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 78 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 75 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 72 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 68 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 65 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 55 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 50 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 30 DAY) FROM achievements WHERE name='Scholar';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='novazen'), id, DATE_SUB(NOW(), INTERVAL 14 DAY) FROM achievements WHERE name='Free Loader';

-- pixeldawn
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 98 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 95 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 90 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 85 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 80 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 75 DAY) FROM achievements WHERE name='Legendary Hours';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 60 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 55 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 18 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='pixeldawn'), id, DATE_SUB(NOW(), INTERVAL 10 DAY) FROM achievements WHERE name='Free Loader';

-- ironveil
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 118 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 115 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 112 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 110 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 108 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL 105 DAY) FROM achievements WHERE name='Legendary Hours';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL  80 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL  75 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL  22 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL  22 DAY) FROM achievements WHERE name='Scholar';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='ironveil'), id, DATE_SUB(NOW(), INTERVAL  15 DAY) FROM achievements WHERE name='Early Adopter';

-- echobyte
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL 108 DAY) FROM achievements WHERE name='First Step';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL 106 DAY) FROM achievements WHERE name='Game Collector';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL 104 DAY) FROM achievements WHERE name='Dedicated Gamer';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL 102 DAY) FROM achievements WHERE name='Weekend Warrior';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL 100 DAY) FROM achievements WHERE name='Century Club';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL  95 DAY) FROM achievements WHERE name='Legendary Hours';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL  85 DAY) FROM achievements WHERE name='First Review';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL  80 DAY) FROM achievements WHERE name='Community Voice';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL  12 DAY) FROM achievements WHERE name='Forum Regular';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL  12 DAY) FROM achievements WHERE name='Scholar';
INSERT IGNORE INTO user_achievements (user_id, achievement_id, unlocked_at)
SELECT (SELECT id FROM users WHERE username='echobyte'), id, DATE_SUB(NOW(), INTERVAL   5 DAY) FROM achievements WHERE name='Bargain Hunter';
