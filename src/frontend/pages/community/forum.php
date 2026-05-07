<?php
$catColors = [
    'Announcement'    => ['bg' => 'rgba(184,50,50,0.15)',  'color' => 'var(--accent)'],
    'Tech Support'    => ['bg' => 'rgba(192,64,64,0.15)',  'color' => '#c04040'],
    'Trading'         => ['bg' => 'rgba(160,128,64,0.15)', 'color' => '#a08040'],
    'Game Discussion' => ['bg' => 'rgba(102,119,170,0.15)','color' => '#6677aa'],
    'General'         => ['bg' => 'rgba(255,255,255,0.06)', 'color' => 'var(--text-secondary)'],
];
?>

<!-- CATEGORY FILTER -->
<div style="display:flex;gap:6px;margin-bottom:12px;flex-wrap:wrap">
    <a href="/?page=community" class="comm-filter-btn <?= !$category ? 'active' : '' ?>">All</a>
    <?php foreach (['General', 'Announcement', 'Game Discussion', 'Tech Support', 'Trading'] as $cat): ?>
    <a href="/?page=community&category=<?= urlencode($cat) ?>" class="comm-filter-btn <?= $category === $cat ? 'active' : '' ?>"><?= $cat ?></a>
    <?php endforeach; ?>
</div>

<!-- NEW POST FORM (collapsible) -->
<?php if (isLoggedIn()): ?>
<?php $cu = getCurrentUser();
      $cc  = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
      $col = $cc[crc32($cu['username']) % count($cc)];
      $cuAvatar = $cu['avatar'] ?? null;
      $cuHasAvatar = $cuAvatar && file_exists(__DIR__ . '/../../../../public/assets/images/avatars/' . $cuAvatar); ?>

<!-- Collapsed trigger -->
<div id="compose-trigger" class="comm-compose" style="cursor:pointer;display:flex;align-items:center;gap:12px"
     onclick="document.getElementById('compose-trigger').style.display='none';document.getElementById('compose-form').style.display='block'">
    <?php if ($cuHasAvatar): ?>
    <img src="/assets/images/avatars/<?= htmlspecialchars($cuAvatar) ?>"
         class="comm-avatar" style="object-fit:cover;border-color:<?= $col ?>44;flex-shrink:0">
    <?php else: ?>
    <div class="comm-avatar" style="background:<?= $col ?>22;border-color:<?= $col ?>55;color:<?= $col ?>;flex-shrink:0">
        <?= mb_strtoupper(mb_substr($cu['username'], 0, 2)) ?>
    </div>
    <?php endif; ?>
    <span style="font-family:'Monda',sans-serif;font-size:13px;color:var(--text-dim)">Write something to the community...</span>
</div>

<!-- Expanded form -->
<div id="compose-form" id="new-post-form" class="comm-compose" style="display:none">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
        <?php if ($cuHasAvatar): ?>
        <img src="/assets/images/avatars/<?= htmlspecialchars($cuAvatar) ?>"
             class="comm-avatar" style="object-fit:cover;border-color:<?= $col ?>44;flex-shrink:0">
        <?php else: ?>
        <div class="comm-avatar" style="background:<?= $col ?>22;border-color:<?= $col ?>55;color:<?= $col ?>;flex-shrink:0">
            <?= mb_strtoupper(mb_substr($cu['username'], 0, 2)) ?>
        </div>
        <?php endif; ?>
        <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:600;color:var(--text-primary)"><?= htmlspecialchars($cu['username']) ?></span>
    </div>
    <form method="POST">
        <input type="hidden" name="action" value="create_post">
        <div style="display:grid;grid-template-columns:1fr auto;gap:8px;margin-bottom:8px">
            <input type="text" name="title" class="form-input" placeholder="Post title...">
            <select name="category" class="form-select" style="width:155px">
                <?php foreach (['General', 'Game Discussion', 'Announcement', 'Tech Support', 'Trading'] as $cat): ?>
                <option><?= $cat ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <textarea name="content" class="form-textarea" placeholder="Share something with the community..." style="min-height:72px;margin-bottom:8px"></textarea>
        <div style="display:flex;justify-content:flex-end;gap:8px">
            <button type="button" class="btn btn-outline btn-sm"
                    onclick="document.getElementById('compose-form').style.display='none';document.getElementById('compose-trigger').style.display='flex'">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Post</button>
        </div>
    </form>
</div>
<?php endif; ?>

<!-- POSTS FEED -->
<?php if (empty($posts)): ?>
<div style="padding:48px;text-align:center;background:var(--bg-card);border:1px solid var(--border)">
    <p class="text-secondary">No posts yet. Be the first to post!</p>
</div>
<?php else: ?>
<div style="display:flex;flex-direction:column;gap:8px">
    <?php foreach ($posts as $post):
        $cat      = $catColors[$post['category']] ?? $catColors['General'];
        $ucolors  = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
        $ucol     = $ucolors[crc32($post['username']) % count($ucolors)];
        $avatarFile = $post['avatar'] ?? null;
        $hasAvatar  = $avatarFile && file_exists(__DIR__ . '/../../../../public/assets/images/avatars/' . $avatarFile);
    ?>
    <div class="comm-post-card">
        <!-- Top row -->
        <div class="comm-post-top">
            <?php if ($hasAvatar): ?>
            <img src="/assets/images/avatars/<?= htmlspecialchars($avatarFile) ?>"
                 class="comm-avatar" style="object-fit:cover;border-color:<?= $ucol ?>44">
            <?php else: ?>
            <div class="comm-avatar" style="background:<?= $ucol ?>22;border-color:<?= $ucol ?>55;color:<?= $ucol ?>">
                <?= mb_strtoupper(mb_substr($post['username'], 0, 2)) ?>
            </div>
            <?php endif; ?>
            <div class="comm-post-meta">
                <span class="comm-post-author"><?= htmlspecialchars($post['username']) ?></span>
                <span class="comm-post-time"><?= timeAgo($post['created_at']) ?></span>
            </div>
            <span class="comm-post-badge" style="background:<?= $cat['bg'] ?>;color:<?= $cat['color'] ?>"><?= htmlspecialchars($post['category']) ?></span>
        </div>

        <!-- Content -->
        <div class="comm-post-body">
            <p class="comm-post-title"><?= htmlspecialchars($post['title']) ?></p>
            <p class="comm-post-content"><?= htmlspecialchars(mb_substr($post['content'] ?? '', 0, 220)) ?><?= mb_strlen($post['content'] ?? '') > 220 ? '...' : '' ?></p>
        </div>

        <!-- Actions -->
        <div class="comm-post-actions">
            <span class="comm-action comm-action-vote">
                <span style="color:var(--accent);font-size:10px">&#9650;</span>
                <?= (abs(crc32('v' . $post['id'])) % 48) + 3 ?>
            </span>
            <span class="comm-action">
                <span style="font-size:11px">&#128172;</span>
                <?= $post['reply_count'] ?>
            </span>
            <span class="comm-action">Share</span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
