<!-- Search User -->
<form method="GET" class="flex-gap mb-16">
    <input type="hidden" name="page" value="profile">
    <input type="text" name="search_user" class="form-input"
           placeholder="Cari username..." value="<?= htmlspecialchars($searchQuery) ?>" style="max-width:300px">
    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
</form>

<!-- Search Results -->
<?php if ($searchQuery && !empty($searchResults)): ?>
<h2 class="section-title">Hasil Pencarian</h2>
<div style="display:flex;flex-direction:column;gap:8px;margin-bottom:24px">
    <?php foreach ($searchResults as $result): ?>
    <div class="card" style="padding:14px 20px">
        <div class="flex-between">
            <div class="flex-gap">
                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                <p class="text-white" style="font-weight:600"><?= htmlspecialchars($result['username']) ?></p>
            </div>
            <?php if (isFriend($user['id'], $result['id'])): ?>
                <span class="tag tag-green">Teman</span>
            <?php elseif (hasPendingRequest($user['id'], $result['id'])): ?>
                <span class="tag">Permintaan Terkirim</span>
            <?php else: ?>
                <form method="POST">
                    <input type="hidden" name="action" value="send_friend_request">
                    <input type="hidden" name="friend_id" value="<?= $result['id'] ?>">
                    <button type="submit" class="btn btn-primary btn-sm">+ Add Friend</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php elseif ($searchQuery): ?>
<div class="card" style="padding:20px;margin-bottom:24px;text-align:center">
    <p class="text-secondary">User "<?= htmlspecialchars($searchQuery) ?>" tidak ditemukan.</p>
</div>
<?php endif; ?>

<!-- Pending Requests -->
<?php if (!empty($pendingRequests)): ?>
<h2 class="section-title">Permintaan Pertemanan</h2>
<div style="display:flex;flex-direction:column;gap:8px;margin-bottom:24px">
    <?php foreach ($pendingRequests as $req): ?>
    <div class="card" style="padding:14px 20px">
        <div class="flex-between">
            <div class="flex-gap">
                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                <p class="text-white" style="font-weight:600"><?= htmlspecialchars($req['username']) ?></p>
            </div>
            <div class="flex-gap">
                <form method="POST">
                    <input type="hidden" name="action" value="accept_friend">
                    <input type="hidden" name="friend_id" value="<?= $req['id'] ?>">
                    <button type="submit" class="btn btn-green btn-sm">Terima</button>
                </form>
                <form method="POST">
                    <input type="hidden" name="action" value="decline_friend">
                    <input type="hidden" name="friend_id" value="<?= $req['id'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Friends List -->
<div class="flex-between mb-16">
    <h2 class="section-title" style="margin:0"><?= $friendCount ?> Friends</h2>
</div>
<?php if (empty($friends)): ?>
<div class="card" style="padding:40px;text-align:center">
    <p class="text-secondary">Belum ada teman. Cari username di atas untuk menambahkan teman.</p>
</div>
<?php else: ?>
<div style="display:flex;flex-direction:column;gap:8px">
    <?php foreach ($friends as $friend): ?>
    <div class="card" style="padding:14px 20px">
        <div class="flex-between">
            <div class="flex-gap">
                <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                <p class="text-white" style="font-weight:600"><?= htmlspecialchars($friend['username']) ?></p>
            </div>
            <a href="#" class="btn btn-outline btn-sm">Profil</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
