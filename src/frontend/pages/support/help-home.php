<?php
$categories = [
    ['icon' => 'PAY', 'color' => '#4a8a5a', 'title' => 'Purchase & Payment',      'desc' => 'Transaction issues, payment methods, billing',     'href' => '/?page=support&tab=contact&cat=payment'],
    ['icon' => 'DL',  'color' => '#6677aa', 'title' => 'Installation & Download', 'desc' => 'Failed install, slow download, launch errors',       'href' => '/?page=support&tab=contact&cat=install'],
    ['icon' => 'ACC', 'color' => '#a08040', 'title' => 'Account & Login',         'desc' => 'Forgot password, locked account, change email',      'href' => '/?page=support&tab=contact&cat=account'],
    ['icon' => 'REF', 'color' => '#b83232', 'title' => 'Refund & Returns',        'desc' => 'Refund eligibility, how to apply, refund status',    'href' => '/?page=support&tab=refund'],
    ['icon' => 'GAME','color' => '#7a6699', 'title' => 'In-Game Issues',          'desc' => 'Bugs, crashes, corrupt saves, performance',          'href' => '/?page=support&tab=contact&cat=ingame'],
    ['icon' => 'SEC', 'color' => '#5a7a9a', 'title' => 'Account Security',        'desc' => 'Hacked account, enable 2FA, suspicious activity',    'href' => '/?page=support&tab=contact&cat=security'],
];

$articles = [
    ['title' => 'How to request a refund for a purchased game',    'views' => '8.4K', 'href' => '/?page=support&tab=refund'],
    ['title' => 'Fixing "Game failed to launch" error',            'views' => '6.1K', 'href' => '/?page=support&tab=faq'],
    ['title' => 'How to enable Two-Factor Authentication (2FA)',    'views' => '5.7K', 'href' => '/?page=support&tab=faq'],
    ['title' => 'Slow game downloads — solutions and tips',         'views' => '4.2K', 'href' => '/?page=support&tab=faq'],
    ['title' => 'Forgot password — how to reset your UAP account', 'views' => '3.8K', 'href' => '/?page=support&tab=contact&cat=account'],
];
?>

<!-- CATEGORIES -->
<div class="supp-section-label">Browse by Category</div>
<div class="supp-cat-grid">
    <?php foreach ($categories as $cat): ?>
    <a href="<?= $cat['href'] ?>" class="supp-cat-card">
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
    <?php foreach ($articles as $article): ?>
    <a href="<?= $article['href'] ?>" class="supp-article">
        <span class="supp-article-title"><?= htmlspecialchars($article['title']) ?></span>
        <span class="supp-article-meta"><?= $article['views'] ?> views &rsaquo;</span>
    </a>
    <?php endforeach; ?>
</div>

<!-- BOTTOM CTA -->
<div class="supp-cta">
    <div>
        <div class="supp-cta-title">Can't find what you're looking for?</div>
        <div class="supp-cta-sub">Our support team is available every day to help you.</div>
    </div>
    <a href="/?page=support&tab=contact" class="btn btn-primary btn-sm">Contact Support</a>
</div>
