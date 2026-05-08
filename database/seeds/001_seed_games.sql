INSERT INTO games (title, description, genre, price, discount, image, is_free, release_date, developer, publisher, req_os, req_processor, req_memory, req_graphics, req_storage) VALUES

-- Action
('God of War',
 'Battle through the brutal realm of Norse mythology as Kratos, a god of war haunted by his past. Guided by his son Atreus, forge a new path across the Nine Realms — facing monsters, gods, and the darkest corners of a father''s heart. A saga of rage, loss, and redemption unlike anything else in gaming.',
 'Action', 499999, 0, NULL, 0, '2022-01-14',
 'Santa Monica Studio', 'Sony Interactive Entertainment',
 'Windows 10 64-bit', 'Intel i5-6600K / AMD Ryzen 5 2600X', '8 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 5500 XT 8GB', '70 GB'),

('Red Dead Redemption 2',
 'America, 1899. The age of outlaws is dying. As Arthur Morgan, loyal soldier of the Van der Linde gang, navigate a nation tearing itself apart. Every choice carries weight, every relationship has consequence, and the frontier holds as many dangers as it does wonders. The most immersive open world ever crafted.',
 'Action', 449999, 0, NULL, 0, '2019-11-05',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i7-4770K / AMD Ryzen 5 1500X', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 480 4GB', '150 GB'),

('Sekiro: Shadows Die Twice',
 'Resurrection is not the end. You are a shinobi in late-1500s Sengoku Japan, stripped of your arm and your honor. Reclaim both through razor-sharp swordplay, cunning traversal, and relentless pursuit. Death is a lesson — master it, and nothing can stop you.',
 'Action', 449999, 0, NULL, 0, '2019-03-22',
 'FromSoftware', 'Activision',
 'Windows 10 64-bit', 'Intel Core i5-2500K / AMD Ryzen 5 1400', '8 GB RAM', 'NVIDIA GTX 970 / AMD Radeon RX 470', '25 GB'),

('Grand Theft Auto V',
 'Three criminals. One city. Infinite chaos. Los Santos is a sun-soaked sprawl of the superficial, where the pursuit of the dollar rules all. Switch between three protagonists — each with their own story — to pull off daring heists, outrun the law, and leave your mark on Southern San Andreas.',
 'Action', 249999, 50, NULL, 0, '2015-04-14',
 'Rockstar North', 'Rockstar Games',
 'Windows 10 64-bit', 'Intel Core i5 3470 / AMD FX-8350', '8 GB RAM', 'NVIDIA GTX 660 2GB / AMD HD 7870 2GB', '72 GB'),

-- RPG
('Cyberpunk 2077',
 'Night City never sleeps, and neither will you. Step into a neon-drenched megalopolis of 2077 as V, a mercenary chasing immortality through a black-market implant holding the mind of a legend. In a city where corpo power and street violence collide, every choice reshapes your destiny.',
 'RPG', 349999, 20, NULL, 0, '2020-12-10',
 'CD Projekt Red', 'CD Projekt',
 'Windows 10 64-bit', 'Intel Core i7-6700K / AMD Ryzen 5 1600', '12 GB RAM', 'NVIDIA GTX 1060 6GB / AMD RX 580 8GB', '70 GB'),

('The Witcher 3: Wild Hunt',
 'The world is a brutal, beautiful place — and someone has to hunt its monsters. As Geralt of Rivia, traverse war-ravaged kingdoms, forge uneasy alliances, and face the hardest choices you''ll ever make. With over 200 hours of content, this is one of the greatest RPGs ever made.',
 'RPG', 299999, 0, NULL, 0, '2015-05-19',
 'CD Projekt Red', 'CD Projekt',
 'Windows 7/8/10 64-bit', 'Intel Core i5-2500K / AMD Phenom II X4 940', '6 GB RAM', 'NVIDIA GeForce GTX 770 / AMD Radeon R9 290', '50 GB'),

('Elden Ring',
 'Death is not the end. In the shattered Lands Between, rise as the Tarnished — exiled, forgotten, called back to claim the power of the Elden Ring. A vast open world of breathtaking vistas and punishing challenges awaits. Forge your legend, become an Elden Lord.',
 'RPG', 549999, 0, NULL, 0, '2022-02-25',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 10/11 64-bit', 'Intel Core i5-8600K / AMD Ryzen 5 3600X', '12 GB RAM', 'NVIDIA GeForce GTX 1070 8GB / AMD RX Vega 56 8GB', '60 GB'),

('Dark Souls III',
 'The fire fades, and the Lords of Cinder rise. Stand as the last warrior in a dying world where perseverance is the only weapon that truly matters. Dark Souls III is a masterwork of atmospheric world design, demanding combat, and the quiet triumph of never giving up.',
 'RPG', 249999, 30, NULL, 0, '2016-04-12',
 'FromSoftware', 'Bandai Namco Entertainment',
 'Windows 7/8/10 64-bit', 'Intel Core i7-3770 / AMD FX-8350', '8 GB RAM', 'NVIDIA GeForce GTX 750 Ti / AMD Radeon HD 7950', '15 GB'),

('Disco Elysium',
 'You are a detective with no memory, no partner, and a city full of secrets. Disco Elysium is a groundbreaking RPG where a unique skill system lets you shape not just your character, but your politics, your philosophy, and your sanity. One of the most original games ever made.',
 'RPG', 299999, 0, NULL, 0, '2019-10-15',
 'ZA/UM', 'ZA/UM',
 'Windows 7/8/10 64-bit', 'Intel Core i5-7600K', '8 GB RAM', 'NVIDIA GeForce GTX 1060', '15 GB'),

('Path of Exile',
 'Exiled to the dark continent of Wraeclast, you must claw your power back from nothing. Path of Exile is a deep, relentlessly complex action RPG with hundreds of hours of content, an unmatched passive skill tree, and a thriving economy — completely free to play.',
 'RPG', 0, 0, NULL, 1, '2013-10-23',
 'Grinding Gear Games', 'Grinding Gear Games',
 'Windows 7/8/10 64-bit', 'Intel Quad Core / AMD Six Core', '8 GB RAM', 'NVIDIA GeForce GTX 650 Ti / ATI Radeon HD 7850', '40 GB'),

-- Strategy
('Among Us',
 'Trust no one. Aboard a starship hurtling through space, crew members scramble to complete tasks while Impostors sabotage from the shadows. A game of deception, deduction, and sudden betrayal for 4 to 15 players. Every round tells a different story.',
 'Strategy', 49999, 0, NULL, 0, '2018-06-15',
 'Innersloth', 'Innersloth',
 'Windows 7 64-bit', 'Intel Core i5-6600 / AMD Athlon X4 880K', '4 GB RAM', 'GeForce 740M or equivalent', '250 MB'),

('Civilization VI',
 'One more turn. Lead your civilization from ancient origins to a space-faring future in the deepest strategy game in the series. Build cities, pursue diplomacy, wage war, and outpace rival leaders across hundreds of hours of ever-shifting grand strategy.',
 'Strategy', 379999, 40, NULL, 0, '2016-10-21',
 'Firaxis Games', '2K Games',
 'Windows 7/8/10 64-bit', 'Intel Core i5-4460K / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GTX 970 / AMD R9 290X', '12 GB'),

('Total War: WARHAMMER III',
 'Daemonic legions pour through the rifts of reality. In the most ambitious Total War ever made, command vast armies across a world on the brink of annihilation. Real-time tactical battles meet deep turn-based campaign strategy in the ultimate dark fantasy war.',
 'Strategy', 499999, 25, NULL, 0, '2022-02-17',
 'Creative Assembly', 'Sega',
 'Windows 10 64-bit', 'Intel Core i5-6600K / AMD Ryzen 5 1600X', '8 GB RAM', 'NVIDIA GeForce GTX 900 / AMD RX 480', '120 GB'),

-- Simulation
('Stardew Valley',
 'Leave the grind behind. Your grandfather''s old farm in Stardew Valley is overgrown, quiet, and full of potential. Grow crops, raise animals, mine for treasure, befriend your neighbors, and build the life you always wanted — at your own pace.',
 'Simulation', 99999, 0, NULL, 0, '2016-02-26',
 'ConcernedApe', 'ConcernedApe',
 'Windows Vista / 7 / 8 / 10', 'Intel Core 2 Duo 2.0 GHz', '2 GB RAM', 'GeForce 450 GTS / Radeon HD 5750', '500 MB'),

('Minecraft',
 'Every world is yours to shape. Dig into the earth, raise towering castles, survive the night, or explore an infinite procedurally generated world with friends. Minecraft is a canvas limited only by your imagination — and it has been captivating players for over a decade.',
 'Simulation', 199999, 0, NULL, 0, '2011-11-18',
 'Mojang Studios', 'Xbox Game Studios',
 'Windows 10/11 64-bit', 'Intel Core i5-4690 / AMD A10-7800 APU', '8 GB RAM', 'NVIDIA GeForce 700 Series / AMD Radeon RX 200', '4 GB'),

('Terraria',
 'A world of possibility lurks beneath your feet. Dig, craft, build, and fight in a rich pixel-art world brimming with hidden treasures, fearsome bosses, and hundreds of hours of content. Terraria is endless adventure wrapped in pure sandbox freedom.',
 'Simulation', 79999, 0, NULL, 0, '2011-05-16',
 'Re-Logic', 'Re-Logic',
 'Windows XP / Vista / 7 / 8 / 10', 'Intel Pentium D or AMD Athlon 64 X2', '2.5 GB RAM', 'GeForce 6800 / Radeon HD 5770', '200 MB'),

-- Indie
('Hollow Knight',
 'An ancient kingdom lies in ruin beneath the surface. As a small, determined knight, descend into Hallownest — a hauntingly beautiful underground world of fierce warriors, forgotten lore, and a plague that threatens to consume everything. One of the finest action-platformers ever made.',
 'Indie', 129999, 50, NULL, 0, '2017-02-24',
 'Team Cherry', 'Team Cherry',
 'Windows 7 64-bit', 'Intel Core 2 Duo E5200', '4 GB RAM', 'GeForce 9800GTX+ (1GB)', '9 GB'),

('Hades',
 'Hell has never been this stylish. Defy your father — the god of the dead himself — in this award-winning roguelike. Every escape attempt through the Underworld deepens the story, sharpens your build, and draws you deeper into a narrative as gripping as any in gaming.',
 'Indie', 199999, 0, NULL, 0, '2020-09-17',
 'Supergiant Games', 'Supergiant Games',
 'Windows 7 64-bit', 'Dual Core 2.4 GHz', '8 GB RAM', 'NVIDIA GTX 850M or equivalent', '15 GB'),

('Celeste',
 'The mountain tests more than your reflexes. Guide Madeline through a brutally precise platforming journey to the summit of Celeste Mountain — a deeply personal story about anxiety, self-doubt, and finding the courage to keep climbing. Challenging, beautiful, and unforgettable.',
 'Indie', 99999, 40, NULL, 0, '2018-01-25',
 'Extremely OK Games', 'Extremely OK Games',
 'Windows Vista / 7 / 8 / 10', 'Intel Core i3 M380', '2 GB RAM', 'OpenGL 3.0 compatible', '1.2 GB'),

-- Multiplayer
('Dota 2',
 'The battlefield never plays the same way twice. Dota 2 is a 5v5 strategic battle where over 100 unique heroes clash in a contest of skill, coordination, and ingenuity. With no pay-to-win mechanics and a skill ceiling that has no limit, it is the deepest free-to-play competitive game ever made.',
 'Multiplayer', 0, 0, NULL, 1, '2013-07-09',
 'Valve', 'Valve',
 'Windows 7 / Vista / XP', 'Intel Core 2 Duo E7400', '4 GB RAM', 'NVIDIA GeForce 8600 GT / ATI Radeon HD 2600 XT', '15 GB'),

('Counter-Strike 2',
 'Two decades of competitive excellence, rebuilt from the ground up. Counter-Strike 2 brings the world''s most iconic tactical shooter into a new era with sub-tick servers, overhauled maps, and a visual refresh — while preserving the pure, skill-based gameplay that defined competitive FPS forever.',
 'Multiplayer', 0, 0, NULL, 1, '2023-09-27',
 'Valve', 'Valve',
 'Windows 10 64-bit', 'Intel Core i5-750 / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon RX 470', '85 GB'),

('Apex Legends',
 'Drop in. Gear up. Become a champion. In the ever-evolving battle royale of Apex Legends, master a diverse roster of Legends with unique abilities and fight to be the last squad standing on the Frontier. Fast-paced, team-focused, and completely free to play.',
 'Multiplayer', 0, 0, NULL, 1, '2019-02-04',
 'Respawn Entertainment', 'Electronic Arts',
 'Windows 10 64-bit', 'Intel Core i5-3570K / AMD FX-4350', '8 GB RAM', 'NVIDIA GeForce GTX 970 / AMD Radeon R9 290', '56 GB');
