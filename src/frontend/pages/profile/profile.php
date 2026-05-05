<!-- PROFILE HEADER CARD -->
<div class="card" style="padding:28px;margin-bottom:24px">
    <div class="flex-gap" style="align-items:flex-start;gap:24px">

        <!-- Avatar -->
        <div style="position:relative;flex-shrink:0">
            <img src="/assets/images/avatars/default.png"
                 alt="Avatar"
                 style="width:96px;height:96px;object-fit:cover;border:3px solid var(--accent);display:block;background:var(--bg-secondary)"
                 onerror="this.style.background='#242424'">
            <span style="position:absolute;bottom:4px;right:4px;width:16px;height:16px;background:var(--success);border:2px solid var(--bg-card)"></span>
        </div>

        <!-- Info -->
        <div style="flex:1">
            <div class="flex-between" style="align-items:flex-start">
                <div>
                    <h1 style="font-size:22px;font-weight:800;color:var(--text-white);margin-bottom:4px">Player1</h1>
                    <p class="text-secondary text-sm">player1@gmail.com &bull; Bergabung sejak Januari 2023</p>
                    <div class="flex-gap mt-8">
                        <span class="tag tag-accent">Level 42</span>
                        <span class="tag tag-green">Online</span>
                        <span class="tag">Indonesia</span>
                    </div>
                </div>
                <a href="#" class="btn btn-outline btn-sm">Edit Profile</a>
            </div>
            <p class="text-secondary" style="margin-top:12px;font-size:13px;line-height:1.7">
                Gamers Ganteng Idaman...
            </p>
        </div>

    </div>
</div>

<!-- STATS ROW -->
<div class="stats-row">
    <div class="stat-box">
        <p class="stat-value">8</p>
        <p class="stat-label">Games</p>
    </div>
    <div class="stat-box">
        <p class="stat-value">342</p>
        <p class="stat-label">Hours Played</p>
    </div>
    <div class="stat-box">
        <p class="stat-value">24</p>
        <p class="stat-label">Achievements</p>
    </div>
    <div class="stat-box">
        <p class="stat-value">12</p>
        <p class="stat-label">Reviews</p>
    </div>
    <div class="stat-box">
        <p class="stat-value">5</p>
        <p class="stat-label">Friends</p>
    </div>
</div>

<!-- TABS -->
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab(this, 'tab-overview')">Overview</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-achievements')">Achievements</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-friends')">Friends</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-settings')">Settings</button>
</div>

<!-- TAB: OVERVIEW -->
<div id="tab-overview" class="tab-content active">
    <div class="grid-2" style="align-items:start">

        <div style="display:flex;flex-direction:column;gap:20px">

            <div>
                <h2 class="section-title">Recently Played</h2>
                <div style="display:flex;flex-direction:column;gap:8px">

                    <div class="card" style="padding:14px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white" style="font-weight:600;font-size:13px">Cyber Odyssey 2077</p>
                                    <p class="text-secondary text-sm">128 jam total &bull; Terakhir 2 jam lalu</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-green btn-sm">Play</a>
                        </div>
                    </div>

                    <div class="card" style="padding:14px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white" style="font-weight:600;font-size:13px">Shadow Realm Online</p>
                                    <p class="text-secondary text-sm">87 jam total &bull; Terakhir kemarin</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-green btn-sm">Play</a>
                        </div>
                    </div>

                    <div class="card" style="padding:14px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white" style="font-weight:600;font-size:13px">Velocity Rush</p>
                                    <p class="text-secondary text-sm">32 jam total &bull; Terakhir 3 hari lalu</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-green btn-sm">Play</a>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <h2 class="section-title">Recent Activity</h2>
                <div style="display:flex;flex-direction:column;gap:8px">

                    <div class="card" style="padding:14px 16px">
                        <p class="text-white text-sm">Unlocked <span class="text-warning">Speed Demon</span> di Velocity Rush</p>
                        <p class="text-secondary text-sm mt-8">1 jam lalu</p>
                    </div>

                    <div class="card" style="padding:14px 16px">
                        <p class="text-white text-sm">Memberikan review untuk <span class="text-accent">Cyber Odyssey 2077</span></p>
                        <p class="text-secondary text-sm mt-8">2 hari lalu</p>
                    </div>

                    <div class="card" style="padding:14px 16px">
                        <p class="text-white text-sm">Membeli <span class="text-accent">Iron Fortress</span></p>
                        <p class="text-secondary text-sm mt-8">5 hari lalu</p>
                    </div>

                </div>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:20px">

            <div>
                <h2 class="section-title">Favorite Game</h2>
                <div class="card" style="padding:20px;text-align:center">
                    <div style="width:64px;height:64px;background:var(--bg-secondary);margin:0 auto 12px"></div>
                    <p class="text-white" style="font-weight:700;font-size:16px;margin-bottom:4px">Cyber Odyssey 2077</p>
                    <p class="text-secondary text-sm">128 jam dimainkan</p>
                    <div class="flex-gap mt-8" style="justify-content:center">
                        <span class="tag tag-accent">Action</span>
                        <span class="tag tag-accent">RPG</span>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="section-title">Friends</h2>
                <div style="display:flex;flex-direction:column;gap:8px">

                    <div class="card" style="padding:12px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:36px;height:36px;background:var(--bg-secondary);border:2px solid var(--success);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white text-sm" style="font-weight:600">ProGamer99</p>
                                    <p class="text-success text-sm">Bermain Cyber Odyssey</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline btn-sm">Lihat</a>
                        </div>
                    </div>

                    <div class="card" style="padding:12px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:36px;height:36px;background:var(--bg-secondary);border:2px solid var(--success);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white text-sm" style="font-weight:600">FarmKing</p>
                                    <p class="text-success text-sm">Online</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline btn-sm">Lihat</a>
                        </div>
                    </div>

                    <div class="card" style="padding:12px 16px">
                        <div class="flex-between">
                            <div class="flex-gap">
                                <div style="width:36px;height:36px;background:var(--bg-secondary);border:2px solid var(--border-light);flex-shrink:0"></div>
                                <div>
                                    <p class="text-white text-sm" style="font-weight:600">GuildMaster_X</p>
                                    <p class="text-secondary text-sm">Offline</p>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline btn-sm">Lihat</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- TAB: ACHIEVEMENTS -->
<div id="tab-achievements" class="tab-content">
    <div class="grid-3">

        <div class="card" style="padding:20px;text-align:center">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">Speed Demon</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Menyelesaikan race dalam waktu kurang dari 3 menit</p>
            <span class="tag tag-warning">Rare</span>
        </div>

        <div class="card" style="padding:20px;text-align:center">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">First Blood</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Menang pertama kali di mode PvP</p>
            <span class="tag tag-green">Common</span>
        </div>

        <div class="card" style="padding:20px;text-align:center">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">Collector</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Memiliki 5 game atau lebih di library</p>
            <span class="tag tag-green">Common</span>
        </div>

        <div class="card" style="padding:20px;text-align:center">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">On Fire</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Bermain 10 hari berturut-turut</p>
            <span class="tag tag-accent">Epic</span>
        </div>

        <div class="card" style="padding:20px;text-align:center">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">Legend</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Mencapai level 50</p>
            <span class="tag tag-danger">Legendary</span>
            <p class="text-secondary text-sm mt-8">Belum terbuka</p>
        </div>

        <div class="card" style="padding:20px;text-align:center;opacity:0.5">
            <p class="text-white" style="font-weight:600;margin-bottom:4px">???</p>
            <p class="text-secondary text-sm" style="margin-bottom:8px">Achievement tersembunyi</p>
            <span class="tag">Hidden</span>
        </div>

    </div>
</div>

<!-- TAB: FRIENDS -->
<div id="tab-friends" class="tab-content">
    <div class="flex-between mb-16">
        <h2 class="section-title" style="margin:0">5 Friends</h2>
        <a href="#" class="btn btn-primary btn-sm">+ Add Friend</a>
    </div>
    <div style="display:flex;flex-direction:column;gap:8px">

        <?php
        $friends = [
            ['name' => 'ProGamer99',    'status' => 'Bermain Cyber Odyssey 2077', 'online' => true],
            ['name' => 'FarmKing',      'status' => 'Online',                     'online' => true],
            ['name' => 'GuildMaster_X', 'status' => 'Offline — 2 jam lalu',       'online' => false],
            ['name' => 'UserBeta21',    'status' => 'Offline — 1 hari lalu',      'online' => false],
            ['name' => 'TraderJoe',     'status' => 'Offline — 3 hari lalu',      'online' => false],
        ];
        foreach ($friends as $friend):
        ?>
        <div class="card" style="padding:14px 20px">
            <div class="flex-between">
                <div class="flex-gap">
                    <div style="width:44px;height:44px;background:var(--bg-secondary);border:2px solid <?= $friend['online'] ? 'var(--success)' : 'var(--border-light)' ?>;flex-shrink:0"></div>
                    <div>
                        <p class="text-white" style="font-weight:600"><?= $friend['name'] ?></p>
                        <p class="<?= $friend['online'] ? 'text-success' : 'text-secondary' ?> text-sm"><?= $friend['status'] ?></p>
                    </div>
                </div>
                <div class="flex-gap">
                    <a href="#" class="btn btn-outline btn-sm">Profil</a>
                    <a href="#" class="btn btn-primary btn-sm">Chat</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<!-- TAB: SETTINGS -->
<div id="tab-settings" class="tab-content">
    <div class="grid-2" style="align-items:start">

        <div class="card" style="padding:24px">
            <h2 class="section-title">Edit Profile</h2>

            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-input" value="Player1">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" value="player1@gmail.com">
            </div>
            <div class="form-group">
                <label class="form-label">Bio</label>
                <textarea class="form-textarea">Gamer hardcore sejak 2010. Suka RPG, Strategy, dan FPS.</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Negara</label>
                <select class="form-select">
                    <option selected>Indonesia</option>
                    <option>Malaysia</option>
                    <option>Singapore</option>
                </select>
            </div>
            <button class="btn btn-primary btn-block">Simpan Perubahan</button>
        </div>

        <div style="display:flex;flex-direction:column;gap:16px">

            <div class="card" style="padding:24px">
                <h2 class="section-title">Ubah Password</h2>
                <div class="form-group">
                    <label class="form-label">Password Lama</label>
                    <input type="password" class="form-input" placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-input" placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-input" placeholder="••••••••">
                </div>
                <button class="btn btn-primary btn-block">Update Password</button>
            </div>

            <div class="card" style="padding:24px">
                <h2 class="section-title">Keamanan</h2>
                <div class="flex-between" style="margin-bottom:16px">
                    <div>
                        <p class="text-white" style="font-weight:600;font-size:13px">Two-Factor Authentication</p>
                        <p class="text-secondary text-sm">Tambah lapisan keamanan ekstra</p>
                    </div>
                    <span class="tag tag-danger">Nonaktif</span>
                </div>
                <button class="btn btn-outline btn-block">Aktifkan 2FA</button>
            </div>

            <div class="card" style="padding:24px">
                <h2 class="section-title" style="color:var(--danger)">Danger Zone</h2>
                <p class="text-secondary text-sm" style="margin-bottom:16px">Tindakan ini tidak dapat dibatalkan.</p>
                <button class="btn btn-danger btn-block">Hapus Akun</button>
            </div>

        </div>
    </div>
</div>
