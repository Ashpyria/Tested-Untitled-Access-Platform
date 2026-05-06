<div class="grid-2" style="align-items:start">

    <div class="card" style="padding:24px">
        <h2 class="section-title">Edit Profile</h2>
        <?php if ($profileError): ?>
        <div style="background:rgba(160,80,80,0.15);border:1px solid var(--danger);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--danger)"><?= htmlspecialchars($profileError) ?></p>
        </div>
        <?php endif; ?>
        <?php if ($profileSuccess): ?>
        <div style="background:rgba(90,154,112,0.15);border:1px solid var(--success);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
            <p class="text-sm" style="color:var(--success)"><?= htmlspecialchars($profileSuccess) ?></p>
        </div>
        <?php endif; ?>
        <form method="POST">
            <input type="hidden" name="action" value="update_profile">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" value="<?= htmlspecialchars($user['username']) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="<?= htmlspecialchars($user['email']) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Bio</label>
                <textarea name="bio" class="form-textarea"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Negara</label>
                <select name="country" class="form-select">
                    <?php foreach (['Indonesia', 'Malaysia', 'Singapore', 'Thailand', 'Philippines'] as $c): ?>
                    <option <?= ($user['country'] ?? '') === $c ? 'selected' : '' ?>><?= $c ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
        </form>
    </div>

    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="card" style="padding:24px">
            <h2 class="section-title">Ubah Password</h2>
            <?php if ($passError): ?>
            <div style="background:rgba(160,80,80,0.15);border:1px solid var(--danger);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
                <p class="text-sm" style="color:var(--danger)"><?= htmlspecialchars($passError) ?></p>
            </div>
            <?php endif; ?>
            <?php if ($passSuccess): ?>
            <div style="background:rgba(90,154,112,0.15);border:1px solid var(--success);border-radius:var(--radius-sm);padding:10px 14px;margin-bottom:16px">
                <p class="text-sm" style="color:var(--success)"><?= htmlspecialchars($passSuccess) ?></p>
            </div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="action" value="update_password">
                <div class="form-group">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="old_password" class="form-input" placeholder="••••••••">
                </div>
                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" class="form-input" placeholder="min. 8 karakter">
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" class="form-input" placeholder="ulangi password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Password</button>
            </form>
        </div>
    </div>

</div>
