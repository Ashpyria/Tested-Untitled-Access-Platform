<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_post' && isLoggedIn()) {
    $title    = trim($_POST['title'] ?? '');
    $content  = trim($_POST['content'] ?? '');
    $category = $_POST['category'] ?? 'General';
    if ($title && $content) {
        createPost(getCurrentUser()['id'], $title, $content, $category);
        header('Location: /?page=community');
        exit;
    }
}
?>

<div class="layout-sidebar">

    <aside class="sidebar">
        <p class="sidebar-title">Categories</p>
        <nav class="sidebar-menu">
            <a href="/?page=community" class="sidebar-link <?= !$category ? 'active' : '' ?>">All Posts</a>
            <?php foreach (['General', 'Announcement', 'Game Discussion', 'Tech Support', 'Trading'] as $cat): ?>
            <a href="/?page=community&category=<?= urlencode($cat) ?>"
               class="sidebar-link <?= $category === $cat ? 'active' : '' ?>">
                <?= $cat ?>
            </a>
            <?php endforeach; ?>
        </nav>

        <hr class="divider">

        <p class="sidebar-title">Stats</p>
        <div style="display:flex;flex-direction:column;gap:8px">
            <div class="flex-between">
                <span class="text-secondary text-sm">Total Posts</span>
                <span class="text-accent text-sm"><?= number_format($stats['total_posts']) ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Members</span>
                <span class="text-accent text-sm"><?= number_format($stats['total_members']) ?></span>
            </div>
            <div class="flex-between">
                <span class="text-secondary text-sm">Reviews</span>
                <span class="text-accent text-sm"><?= number_format($stats['total_reviews']) ?></span>
            </div>
        </div>
    </aside>

    <div>

        <!-- New Post Form -->
        <?php if (isLoggedIn()): ?>
        <div id="new-post-form" class="card" style="padding:20px;margin-bottom:16px">
            <h2 class="section-title">New Post</h2>
            <form method="POST">
                <input type="hidden" name="action" value="create_post">
                <div class="form-group">
                    <input type="text" name="title" class="form-input" placeholder="Judul post...">
                </div>
                <div class="form-group">
                    <select name="category" class="form-select">
                        <?php foreach (['General', 'Announcement', 'Game Discussion', 'Tech Support', 'Trading'] as $cat): ?>
                        <option><?= $cat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-textarea" placeholder="Tulis postmu di sini..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
        <?php endif; ?>

        <!-- Posts List -->
        <?php if (empty($posts)): ?>
        <div class="card" style="padding:40px;text-align:center">
            <p class="text-secondary">Belum ada post di kategori ini.</p>
        </div>
        <?php else: ?>
        <div style="display:flex;flex-direction:column;gap:8px">
            <?php foreach ($posts as $post): ?>
            <?php
            $catColors = [
                'Announcement'   => 'tag-accent',
                'Tech Support'   => 'tag-danger',
                'Trading'        => 'tag-warning',
                'Game Discussion'=> '',
                'General'        => '',
            ];
            $catClass = $catColors[$post['category']] ?? '';
            ?>
            <div class="card" style="padding:16px">
                <div class="flex-between">
                    <div class="flex-gap">
                        <div style="width:40px;height:40px;background:var(--bg-secondary);border:2px solid var(--accent);flex-shrink:0"></div>
                        <div>
                            <p class="text-white" style="font-weight:600"><?= htmlspecialchars($post['title']) ?></p>
                            <div class="flex-gap mt-8">
                                <span class="text-secondary text-sm">by <span class="text-accent"><?= htmlspecialchars($post['username']) ?></span></span>
                                <span class="tag <?= $catClass ?>"><?= $post['category'] ?></span>
                                <span class="text-secondary text-sm"><?= timeAgo($post['created_at']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:right;flex-shrink:0">
                        <p class="text-accent" style="font-weight:700"><?= $post['reply_count'] ?></p>
                        <p class="text-secondary text-sm">replies</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</div>
