<?php
$pdo = getDB();

function handleImageUpload($file, $oldImage = null) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) return $oldImage;
    $ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed  = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($ext, $allowed)) return $oldImage;
    $filename = uniqid('game_') . '.' . $ext;
    $dest     = __DIR__ . '/../../../../public/uploads/games/' . $filename;
    if (move_uploaded_file($file['tmp_name'], $dest)) {
        if ($oldImage && file_exists(__DIR__ . '/../../../../public/uploads/games/' . $oldImage)) {
            unlink(__DIR__ . '/../../../../public/uploads/games/' . $oldImage);
        }
        return $filename;
    }
    return $oldImage;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['action'] === 'add_game') {
        $image = handleImageUpload($_FILES['image'] ?? null);
        $stmt  = $pdo->prepare('INSERT INTO games (title, description, genre, price, discount, is_free, release_date, image, developer, publisher, req_os, req_processor, req_memory, req_graphics, req_storage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            trim($_POST['title']),
            trim($_POST['description']),
            trim($_POST['genre']),
            (float)$_POST['price'],
            (int)$_POST['discount'],
            isset($_POST['is_free']) ? 1 : 0,
            $_POST['release_date'] ?: null,
            $image,
            trim($_POST['developer'] ?? ''),
            trim($_POST['publisher'] ?? ''),
            trim($_POST['req_os'] ?? ''),
            trim($_POST['req_processor'] ?? ''),
            trim($_POST['req_memory'] ?? ''),
            trim($_POST['req_graphics'] ?? ''),
            trim($_POST['req_storage'] ?? ''),
        ]);
        $newId = $pdo->lastInsertId();
        // Upload screenshots
        if (!empty($_FILES['screenshots']['name'][0])) {
            try {
                foreach ($_FILES['screenshots']['tmp_name'] as $i => $tmp) {
                    if ($_FILES['screenshots']['error'][$i] !== UPLOAD_ERR_OK) continue;
                    $ext = strtolower(pathinfo($_FILES['screenshots']['name'][$i], PATHINFO_EXTENSION));
                    if (!in_array($ext, ['jpg','jpeg','png','webp'])) continue;
                    $fn = uniqid('shot_') . '.' . $ext;
                    if (move_uploaded_file($tmp, __DIR__ . '/../../../../public/uploads/games/' . $fn)) {
                        $pdo->prepare('INSERT INTO game_images (game_id, filename, sort_order) VALUES (?, ?, ?)')->execute([$newId, $fn, $i]);
                    }
                }
            } catch (Exception $e) {}
        }
        header('Location: /admin/?page=games');
        exit;
    }

    if ($_POST['action'] === 'edit_game') {
        $gid = (int)$_POST['game_id'];
        $oldStmt = $pdo->prepare('SELECT image FROM games WHERE id = ?');
        $oldStmt->execute([$gid]);
        $oldImage = $oldStmt->fetchColumn();
        $image = handleImageUpload($_FILES['image'] ?? null, $oldImage);

        $stmt = $pdo->prepare('UPDATE games SET title=?, description=?, genre=?, price=?, discount=?, is_free=?, release_date=?, image=?, developer=?, publisher=?, req_os=?, req_processor=?, req_memory=?, req_graphics=?, req_storage=? WHERE id=?');
        $stmt->execute([
            trim($_POST['title']),
            trim($_POST['description']),
            trim($_POST['genre']),
            (float)$_POST['price'],
            (int)$_POST['discount'],
            isset($_POST['is_free']) ? 1 : 0,
            $_POST['release_date'] ?: null,
            $image,
            trim($_POST['developer'] ?? ''),
            trim($_POST['publisher'] ?? ''),
            trim($_POST['req_os'] ?? ''),
            trim($_POST['req_processor'] ?? ''),
            trim($_POST['req_memory'] ?? ''),
            trim($_POST['req_graphics'] ?? ''),
            trim($_POST['req_storage'] ?? ''),
            $gid,
        ]);
        // Upload new screenshots
        if (!empty($_FILES['screenshots']['name'][0])) {
            try {
                $maxStmt = $pdo->prepare('SELECT COALESCE(MAX(sort_order),0) FROM game_images WHERE game_id = ?');
                $maxStmt->execute([$gid]);
                $maxOrder = (int)$maxStmt->fetchColumn();
                foreach ($_FILES['screenshots']['tmp_name'] as $i => $tmp) {
                    if ($_FILES['screenshots']['error'][$i] !== UPLOAD_ERR_OK) continue;
                    $ext = strtolower(pathinfo($_FILES['screenshots']['name'][$i], PATHINFO_EXTENSION));
                    if (!in_array($ext, ['jpg','jpeg','png','webp'])) continue;
                    $fn = uniqid('shot_') . '.' . $ext;
                    if (move_uploaded_file($tmp, __DIR__ . '/../../../../public/uploads/games/' . $fn)) {
                        $pdo->prepare('INSERT INTO game_images (game_id, filename, sort_order) VALUES (?, ?, ?)')->execute([$gid, $fn, $maxOrder + $i + 1]);
                    }
                }
            } catch (Exception $e) {}
        }
        header('Location: /admin/?page=games&edit=' . $gid . '&saved=1');
        exit;
    }

    if ($_POST['action'] === 'delete_screenshot') {
        $imgId = (int)($_POST['image_id'] ?? 0);
        $gid   = (int)($_POST['game_id']  ?? 0);
        if ($imgId && $gid) {
            try {
                $s = $pdo->prepare('SELECT filename FROM game_images WHERE id = ? AND game_id = ?');
                $s->execute([$imgId, $gid]);
                $fn = $s->fetchColumn();
                if ($fn && file_exists(__DIR__ . '/../../../../public/uploads/games/' . $fn)) unlink(__DIR__ . '/../../../../public/uploads/games/' . $fn);
                $pdo->prepare('DELETE FROM game_images WHERE id = ?')->execute([$imgId]);
            } catch (Exception $e) {}
        }
        header('Location: /admin/?page=games&edit=' . $gid);
        exit;
    }

    if ($_POST['action'] === 'delete_game') {
        $old = $pdo->prepare('SELECT image FROM games WHERE id = ?');
        $old->execute([(int)$_POST['game_id']]);
        $oldImage = $old->fetchColumn();
        if ($oldImage && file_exists(__DIR__ . '/../../../../public/uploads/games/' . $oldImage)) {
            unlink(__DIR__ . '/../../../../public/uploads/games/' . $oldImage);
        }
        $pdo->prepare('DELETE FROM games WHERE id = ?')->execute([(int)$_POST['game_id']]);
        header('Location: /admin/?page=games');
        exit;
    }
}


$editGame = null;
$editScreenshots = [];
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM games WHERE id = ?');
    $stmt->execute([(int)$_GET['edit']]);
    $editGame = $stmt->fetch();
    if ($editGame) {
        try {
            $ss = $pdo->prepare('SELECT * FROM game_images WHERE game_id = ? ORDER BY sort_order ASC, id ASC');
            $ss->execute([$editGame['id']]);
            $editScreenshots = $ss->fetchAll();
        } catch (Exception $e) { $editScreenshots = []; }
    }
}

$games = $pdo->query('SELECT * FROM games ORDER BY created_at DESC')->fetchAll();
$savedMsg = isset($_GET['saved']) ? 'Game updated successfully.' : '';
?>

<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Games</h1>
</div>

<!-- Add / Edit Form -->
<div class="card" style="padding:24px;margin-bottom:24px">
    <h2 class="section-title"><?= $editGame ? 'Edit Game' : 'Add New Game' ?></h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?= $editGame ? 'edit_game' : 'add_game' ?>">
        <?php if ($editGame): ?>
        <input type="hidden" name="game_id" value="<?= $editGame['id'] ?>">
        <?php endif; ?>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-input" value="<?= htmlspecialchars($editGame['title'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-input" value="<?= htmlspecialchars($editGame['genre'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Price (Rp)</label>
                <input type="number" name="price" class="form-input" value="<?= $editGame['price'] ?? 0 ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Discount (%)</label>
                <input type="number" name="discount" class="form-input" min="0" max="100" value="<?= $editGame['discount'] ?? 0 ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Release Date</label>
                <input type="date" name="release_date" class="form-input" value="<?= $editGame['release_date'] ?? '' ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Developer</label>
                <input type="text" name="developer" class="form-input" placeholder="e.g. CD Projekt Red" value="<?= htmlspecialchars($editGame['developer'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-input" placeholder="e.g. CD Projekt" value="<?= htmlspecialchars($editGame['publisher'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">OS</label>
                <input type="text" name="req_os" class="form-input" placeholder="Windows 10/11 64-bit" value="<?= htmlspecialchars($editGame['req_os'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Processor</label>
                <input type="text" name="req_processor" class="form-input" placeholder="Intel Core i5 / AMD Ryzen 5" value="<?= htmlspecialchars($editGame['req_processor'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Memory</label>
                <input type="text" name="req_memory" class="form-input" placeholder="8 GB RAM" value="<?= htmlspecialchars($editGame['req_memory'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Graphics</label>
                <input type="text" name="req_graphics" class="form-input" placeholder="GTX 1060 / RX 580" value="<?= htmlspecialchars($editGame['req_graphics'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Storage</label>
                <input type="text" name="req_storage" class="form-input" placeholder="20 GB available" value="<?= htmlspecialchars($editGame['req_storage'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Game Image</label>
                <?php if (!empty($editGame['image'])): ?>
                    <img src="/uploads/games/<?= htmlspecialchars($editGame['image']) ?>"
                        style="width:100%;height:120px;object-fit:cover;border-radius:var(--radius-sm);margin-bottom:8px">
                <?php endif; ?>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;padding-top:24px">
                <input type="checkbox" name="is_free" id="is_free" <?= !empty($editGame['is_free']) ? 'checked' : '' ?>>
                <label for="is_free" class="form-label" style="margin:0">Free to Play</label>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-textarea" rows="8" style="min-height:160px"><?= htmlspecialchars($editGame['description'] ?? '') ?></textarea>
        </div>

        <!-- Screenshots -->
        <div class="form-group" style="margin-top:8px">
            <label class="form-label">Screenshots <span style="color:var(--text-dim);font-weight:400">(multiple files allowed)</span></label>
            <?php if (!empty($editScreenshots)): ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:8px;margin-bottom:12px">
                <?php foreach ($editScreenshots as $ss): ?>
                <div style="position:relative">
                    <img src="/uploads/games/<?= htmlspecialchars($ss['filename']) ?>"
                         style="width:100%;height:88px;object-fit:cover;border:1px solid var(--border)">
                    <form method="POST" style="position:absolute;top:4px;right:4px" onsubmit="return confirm('Delete this screenshot?')">
                        <input type="hidden" name="action"   value="delete_screenshot">
                        <input type="hidden" name="image_id" value="<?= $ss['id'] ?>">
                        <input type="hidden" name="game_id"  value="<?= $editGame['id'] ?>">
                        <button type="submit" style="background:rgba(0,0,0,0.7);border:none;color:#fff;cursor:pointer;font-size:11px;padding:2px 6px">x</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <input type="file" name="screenshots[]" class="form-input" accept="image/*" multiple>
        </div>

        <div class="flex-gap">
            <button type="submit" class="btn btn-primary"><?= $editGame ? 'Update Game' : 'Add Game' ?></button>
            <?php if ($editGame): ?>
            <a href="/admin/?page=games" class="btn btn-outline">Cancel</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Games Table -->
<div class="card" style="overflow:hidden">
    <table style="width:100%;border-collapse:collapse">
        <thead>
            <tr style="border-bottom:1px solid var(--border)">
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Title</th>
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Genre</th>
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Price</th>
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Discount</th>
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Free</th>
                <th style="padding:12px 16px;text-align:left;font-size:12px;color:var(--text-secondary);font-weight:600">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr style="border-bottom:1px solid var(--border)">
                <td style="padding:12px 16px;color:var(--text-white);font-size:13px"><?= htmlspecialchars($game['title']) ?></td>
                <td style="padding:12px 16px;color:var(--text-secondary);font-size:13px"><?= htmlspecialchars($game['genre']) ?></td>
                <td style="padding:12px 16px;color:var(--text-secondary);font-size:13px">Rp <?= number_format($game['price'], 0, ',', '.') ?></td>
                <td style="padding:12px 16px;font-size:13px">
                    <?php if ($game['discount'] > 0): ?>
                    <span class="tag tag-green">-<?= $game['discount'] ?>%</span>
                    <?php else: ?>
                    <span class="text-secondary">—</span>
                    <?php endif; ?>
                </td>
                <td style="padding:12px 16px;font-size:13px">
                    <?php if ($game['is_free']): ?>
                    <span class="tag tag-accent">Free</span>
                    <?php else: ?>
                    <span class="text-secondary">—</span>
                    <?php endif; ?>
                </td>
                <td style="padding:12px 16px">
                    <div class="flex-gap">
                        <a href="/admin/?page=games&edit=<?= $game['id'] ?>" class="btn btn-outline btn-sm">Edit</a>
                        <form method="POST" onsubmit="return confirm('Hapus game ini?')">
                            <input type="hidden" name="action" value="delete_game">
                            <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
