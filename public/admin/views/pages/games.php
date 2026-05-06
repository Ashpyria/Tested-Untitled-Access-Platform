<?php
$pdo = getDB();

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['action'] === 'add_game') {
        $stmt = $pdo->prepare('INSERT INTO games (title, description, genre, price, discount, is_free, release_date) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            trim($_POST['title']),
            trim($_POST['description']),
            trim($_POST['genre']),
            (float)$_POST['price'],
            (int)$_POST['discount'],
            isset($_POST['is_free']) ? 1 : 0,
            $_POST['release_date'] ?: null,
        ]);
        header('Location: /admin/?page=games');
        exit;
    }

    if ($_POST['action'] === 'edit_game') {
        $stmt = $pdo->prepare('UPDATE games SET title=?, description=?, genre=?, price=?, discount=?, is_free=?, release_date=? WHERE id=?');
        $stmt->execute([
            trim($_POST['title']),
            trim($_POST['description']),
            trim($_POST['genre']),
            (float)$_POST['price'],
            (int)$_POST['discount'],
            isset($_POST['is_free']) ? 1 : 0,
            $_POST['release_date'] ?: null,
            (int)$_POST['game_id'],
        ]);
        header('Location: /admin/?page=games');
        exit;
    }

    if ($_POST['action'] === 'delete_game') {
        $stmt = $pdo->prepare('DELETE FROM games WHERE id = ?');
        $stmt->execute([(int)$_POST['game_id']]);
        header('Location: /admin/?page=games');
        exit;
    }
}

$editGame = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM games WHERE id = ?');
    $stmt->execute([(int)$_GET['edit']]);
    $editGame = $stmt->fetch();
}

$games = $pdo->query('SELECT * FROM games ORDER BY created_at DESC')->fetchAll();
?>

<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Games</h1>
</div>

<!-- Add / Edit Form -->
<div class="card" style="padding:24px;margin-bottom:24px">
    <h2 class="section-title"><?= $editGame ? 'Edit Game' : 'Add New Game' ?></h2>
    <form method="POST">
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
            <div class="form-group" style="display:flex;align-items:center;gap:10px;padding-top:24px">
                <input type="checkbox" name="is_free" id="is_free" <?= !empty($editGame['is_free']) ? 'checked' : '' ?>>
                <label for="is_free" class="form-label" style="margin:0">Free to Play</label>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-textarea"><?= htmlspecialchars($editGame['description'] ?? '') ?></textarea>
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
