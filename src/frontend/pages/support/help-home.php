<?php
$categories = [
    ['icon' => 'PAY', 'color' => '#4a8a5a', 'title' => 'Purchase & Payment',      'desc' => 'Transaction issues, payment methods, billing',     'cat' => 'Purchase & Payment'],
    ['icon' => 'DL',  'color' => '#6677aa', 'title' => 'Installation & Download', 'desc' => 'Failed install, slow download, launch errors',       'cat' => 'Installation & Download'],
    ['icon' => 'ACC', 'color' => '#a08040', 'title' => 'Account & Login',         'desc' => 'Forgot password, locked account, change email',      'cat' => 'Account & Login'],
    ['icon' => 'REF', 'color' => '#b83232', 'title' => 'Refund & Returns',        'desc' => 'Refund eligibility, how to apply, refund status',    'cat' => 'Refund'],
    ['icon' => 'GAME','color' => '#7a6699', 'title' => 'In-Game Issues',          'desc' => 'Bugs, crashes, corrupt saves, performance',          'cat' => 'In-Game Issues'],
    ['icon' => 'SEC', 'color' => '#5a7a9a', 'title' => 'Account Security',        'desc' => 'Hacked account, enable 2FA, suspicious activity',    'cat' => 'Account Security'],
];
?>

<!-- CATEGORIES -->
<div class="supp-section-label">Browse by Category</div>
<div class="supp-cat-grid">
    <?php foreach ($categories as $cat): ?>
    <a href="/?page=support&tab=articles&cat=<?= urlencode($cat['cat']) ?>" class="supp-cat-card">
        <div class="supp-cat-icon" style="background:<?= $cat['color'] ?>22;color:<?= $cat['color'] ?>;border-color:<?= $cat['color'] ?>44">
            <?= $cat['icon'] ?>
        </div>
        <div>
            <div class="supp-cat-title"><?= $cat['title'] ?></div>
            <div class="supp-cat-desc"><?= $cat['desc'] ?></div>
        </div>
    </a>
    <?php endforeach; ?>
</div>

<!-- POPULAR ARTICLES -->
<div class="supp-section-label" style="margin-top:32px">Popular Articles</div>
<div class="supp-articles">
    <?php if (!empty($popularArticles)): ?>
        <?php foreach ($popularArticles as $article): ?>
        <a href="/?page=support&tab=article&id=<?= $article['id'] ?>" class="supp-article">
            <span class="supp-article-title"><?= htmlspecialchars($article['title']) ?></span>
            <span class="supp-article-meta"><?= number_format($article['views']) ?> views &rsaquo;</span>
        </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div style="padding:20px;background:var(--bg-card);border:1px solid var(--border);font-family:'Monda',sans-serif;font-size:12px;color:var(--text-secondary)">
            No articles available yet.
        </div>
    <?php endif; ?>
</div>

<!-- BOTTOM CTA -->
<div class="supp-cta">
    <div>
        <div class="supp-cta-title">Can't find what you're looking for?</div>
        <div class="supp-cta-sub">Our support team is available every day to help you.</div>
    </div>
    <a href="/?page=support&tab=contact" class="btn btn-primary btn-sm">Contact Support</a>
</div>
