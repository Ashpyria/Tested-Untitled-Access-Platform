INSERT INTO games (title, description, genre, price, discount, image, is_free, release_date, developer, publisher, req_os, req_processor, req_memory, req_graphics, req_storage) VALUES

-- Action
('God of War',
 'Kratos and his son Atreus journey through the brutal world of Norse mythology. A saga of gods, monsters, and the bond between father and son.',
 'Action', 499999, 0, NULL, 0, '2022-01-14',
 'Santa Monica Studio', 'Sony Interactive Entertainment',
 'Windows 10 64-bit', 'Intel i5-6600K / AMD Ryzen 5 2600X', '8 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 5500 XT 8GB', '70 GB'),

('Red Dead Redemption 2',
 'An epic tale of life in America at the dawn of the modern age. Experience a cinematic open world unlike anything before.',
 'Action', 449999, 0, NULL, 0, '2019-11-05',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i7-4770K / AMD Ryzen 5 1500X', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 480 4GB', '150 GB'),

('Sekiro: Shadows Die Twice',
 'Carve your own clever path through an expansive world as you explore the re-imagined landscapes and anatomy of a Japanese sculptor.',
 'Action', 449999, 0, NULL, 0, '2019-03-22',
 'FromSoftware', 'Activision',
 'Windows 10 64-bit', 'Intel Core i5-2500K / AMD Ryzen 5 1400', '8 GB RAM', 'NVIDIA GTX 970 / AMD Radeon RX 470', '25 GB'),

('Grand Theft Auto V',
 'When a young street hustler, a retired bank robber, and a terrifying psychopath find themselves entangled with the most dangerous forces in crime, the U.S. government, and the entertainment industry, they must pull off a series of dangerous heists.',
 'Action', 249999, 50, NULL, 0, '2015-04-14',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i5 3470 / AMD FX-8350', '8 GB RAM', 'NVIDIA GTX 660 2GB / AMD HD 7870 2GB', '72 GB'),

-- RPG
('Cyberpunk 2077',
 'An open-world action-adventure set in Night City, a megalopolis obsessed with power, glamour and body modification. Play as V, a mercenary outlaw going after a one-of-a-kind implant.',
 'RPG', 349999, 20, NULL, 0, '2020-12-10',
 'CD Projekt Red', 'CD Projekt',
 'Windows 10 64-bit', 'Intel Core i7-6700K / AMD Ryzen 5 1600', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 580 8GB', '70 GB'),

('The Witcher 3: Wild Hunt',
 'You are Geralt of Rivia, mercenary monster slayer. Before you stands a war-torn, monster-infested continent you can explore at will.',
 'RPG', 299999, 0, NULL, 0, '2015-05-19',
 'CD Projekt Red', 'CD Projekt',
 'Windows 7/8/10 64-bit', 'Intel Core i5-2500K / AMD Phenom II X4 940', '6 GB RAM', 'NVIDIA GeForce GTX 770 / AMD Radeon R9 290', '50 GB'),

('Elden Ring',
 'Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.',
 'RPG', 549999, 0, NULL, 0, '2022-02-25',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 10/11 64-bit', 'Intel Core i5-8600K / AMD Ryzen 5 3600X', '12 GB RAM', 'NVIDIA GeForce GTX 1070 8GB / AMD RX Vega 56 8GB', '60 GB'),

('Dark Souls III',
 'Dark Souls III is an action role-playing game set in a dark fantasy world. As an undead warrior, you must traverse a dying world and defeat the Lords of Cinder.',
 'RPG', 249999, 30, NULL, 0, '2016-04-12',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 7/8/10 64-bit', 'Intel Core i7-3770 / AMD FX-8350', '8 GB RAM', 'NVIDIA GeForce GTX 750 Ti / AMD Radeon HD 7950', '15 GB'),

('Disco Elysium',
 'A groundbreaking role playing game. You are a detective with a unique skill system at your disposal and a whole city block to carve your character out of.',
 'RPG', 299999, 0, NULL, 0, '2019-10-15',
 'ZA/UM', 'ZA/UM',
 'Windows 7/8/10 64-bit', 'Intel Core i5-7600K', '8 GB RAM', 'NVIDIA GeForce GTX 1060', '15 GB'),

('Path of Exile',
 'You are an Exile, struggling to survive on the dark continent of Wraeclast, as you fight to earn power that will allow you to exact your revenge.',
 'RPG', 0, 0, NULL, 1, '2013-10-23',
 'Grinding Gear Games', 'Grinding Gear Games',
 'Windows 7/8/10 64-bit', 'Intel Quad Core / AMD Six Core', '8 GB RAM', 'NVIDIA GeForce GTX 650 Ti / ATI Radeon HD 7850', '40 GB'),

-- Strategy
('Among Us',
 'An online and local party game of teamwork and betrayal for 4-15 players. Work together to prepare your ship for departure, but beware — Impostors seek to sabotage your mission.',
 'Strategy', 49999, 0, NULL, 0, '2018-06-15',
 'Innersloth', 'Innersloth',
 'Windows 7 64-bit', 'Intel Core i5-6600 / AMD Athlon X4 880K', '4 GB RAM', 'GeForce 740M or equivalent', '250 MB'),

('Civilization VI',
 'Civilization VI offers new ways to interact with your world, expand your empire across the map, advance your culture, and compete against history\'s greatest leaders.',
 'Strategy', 379999, 40, NULL, 0, '2016-10-21',
 'Firaxis Games', '2K Games',
 'Windows 7/8/10 64-bit', 'Intel Core i5-4460K / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GTX 970 / AMD R9 290X', '12 GB'),

('Total War: WARHAMMER III',
 'Plunge into a realm of daemonic chaos and lead your forces against the ruinous powers to protect the soul of a dying god.',
 'Strategy', 499999, 25, NULL, 0, '2022-02-17',
 'Creative Assembly', 'Sega',
 'Windows 10 64-bit', 'Intel Core i5-6600K / AMD Ryzen 5 1600X', '8 GB RAM', 'NVIDIA GeForce GTX 900 / AMD RX 480', '120 GB'),

-- Simulation
('Stardew Valley',
 'You\'ve inherited your grandfather\'s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life.',
 'Simulation', 99999, 0, NULL, 0, '2016-02-26',
 'ConcernedApe', 'ConcernedApe',
 'Windows Vista / 7 / 8 / 10', 'Intel Core 2 Duo 2.0 GHz', '2 GB RAM', 'GeForce 450 GTS / Radeon HD 5750', '500 MB'),

('Minecraft',
 'Minecraft is a game about placing blocks and going on adventures. Explore randomly generated worlds and build amazing things from the simplest homes to the grandest castles.',
 'Simulation', 199999, 0, NULL, 0, '2011-11-18',
 'Mojang Studios', 'Xbox Game Studios',
 'Windows 10/11 64-bit', 'Intel Core i5-4690 / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GeForce 700 Series / AMD Radeon RX 200', '4 GB'),

('Terraria',
 'Dig, fight, explore, build! Nothing is impossible in this action-packed adventure game. The world is your canvas and the ground itself is your paint.',
 'Simulation', 79999, 0, NULL, 0, '2011-05-16',
 'Re-Logic', 'Re-Logic',
 'Windows XP / Vista / 7 / 8 / 10', 'Intel Pentium D or AMD Athlon 64 X2', '2.5 GB RAM', 'GeForce 6800 / Radeon HD 5770', '200 MB'),

-- Indie
('Hollow Knight',
 'Forge your own path in Hollow Knight! An epic action adventure through a vast ruined kingdom of insects and heroes. Explore twisting caverns, battle tainted creatures and befriend bizarre bugs.',
 'Indie', 129999, 50, NULL, 0, '2017-02-24',
 'Team Cherry', 'Team Cherry',
 'Windows 7 64-bit', 'Intel Core 2 Duo E5200', '4 GB RAM', 'GeForce 9800GTX+ (1GB)', '9 GB'),

('Hades',
 'Defy the god of the dead as you hack and slash out of the Underworld in this rogue-like dungeon crawler from the creators of Bastion and Transistor.',
 'Indie', 199999, 0, NULL, 0, '2020-09-17',
 'Supergiant Games', 'Supergiant Games',
 'Windows 7 64-bit', 'Dual Core 2.4 GHz', '8 GB RAM', 'NVIDIA GTX 850M or equivalent', '15 GB'),

('Celeste',
 'Help Madeline survive her inner demons on her journey to the top of Celeste Mountain, in this super-tight platformer from the creators of TowerFall.',
 'Indie', 99999, 40, NULL, 0, '2018-01-25',
 'Extremely OK Games', 'Extremely OK Games',
 'Windows Vista / 7 / 8 / 10', 'Intel Core i3 M380', '2 GB RAM', 'OpenGL 3.0 compatible', '1.2 GB'),

-- Multiplayer
('Dota 2',
 'Every day, millions of players worldwide enter battle as one of over 100 Dota heroes. Dota is the deepest multi-player action RTS game ever made and there\'s always a new strategy to discover.',
 'Multiplayer', 0, 0, NULL, 1, '2013-07-09',
 'Valve', 'Valve',
 'Windows 7 / Vista / XP', 'Intel Core 2 Duo E7400', '4 GB RAM', 'NVIDIA GeForce 8600 GT / ATI Radeon HD 2600 XT', '15 GB'),

('Counter-Strike 2',
 'For over two decades, Counter-Strike has offered an elite competitive experience. CS2 is the largest technical leap forward in Counter-Strike\'s history, featuring all-new subsystems.',
 'Multiplayer', 0, 0, NULL, 1, '2023-09-27',
 'Valve', 'Valve',
 'Windows 10 64-bit', 'Intel Core i5-750 / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon RX 470', '85 GB'),

('Apex Legends',
 'A free-to-play battle royale game where legendary competitors battle for glory, fame, and fortune on the fringes of the Frontier. Master your Legend\'s unique abilities to better squad up and win.',
 'Multiplayer', 0, 0, NULL, 1, '2019-02-04',
 'Respawn Entertainment', 'Electronic Arts',
 'Windows 10 64-bit', 'Intel Core i5-3570K / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon R9 290', '56 GB');
