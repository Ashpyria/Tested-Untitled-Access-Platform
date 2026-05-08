<?php
$artCat = $_GET['cat'] ?? '';

$catColors = [
    'Purchase & Payment'      => '#4a8a5a',
    'Installation & Download' => '#6677aa',
    'Account & Login'         => '#a08040',
    'Refund'                  => '#b83232',
    'In-Game Issues'          => '#7a6699',
    'Account Security'        => '#5a7a9a',
];
$color = $catColors[$artCat] ?? 'var(--accent)';
?>

<!-- BREADCRUMB -->
<div class="supp-breadcrumb">
    <a href="/?page=support" class="supp-breadcrumb-link">Help Center</a>
    <span class="supp-breadcrumb-sep">/</span>
    <span class="supp-breadcrumb-current"><?= htmlspecialchars($artCat ?: 'All Articles') ?></span>
</div>

<div class="supp-section-label" style="margin-bottom:4px">Category</div>
<div style="display:flex;align-items:center;gap:12px;margin-bottom:24px">
    <div style="width:4px;height:28px;background:<?= $color ?>"></div>
    <h2 style="font-family:'Monda',sans-serif;font-size:18px;font-weight:900;color:var(--text-primary);margin:0">
        <?= htmlspecialchars($artCat ?: 'All Articles') ?>
    </h2>
</div>

<?php if (empty($categoryArticles)): ?>
<div class="supp-empty">
    <p>No articles found in this category.</p>
    <p><a href="/?page=support">Back to Help Center</a></p>
</div>
<?php else: ?>
<div style="display:flex;flex-direction:column;gap:4px;max-width:760px">
    <?php foreach ($categoryArticles as $art): ?>
    <a href="/?page=support&tab=article&id=<?= $art['id'] ?>" class="supp-article">
        <div>
            <div class="supp-article-title"><?= htmlspecialchars($art['title']) ?></div>
            <div style="font-family:'Monda',sans-serif;font-size:10px;color:var(--text-dim);margin-top:3px">
                <?= htmlspecialchars(mb_substr(strip_tags($art['content']), 0, 100)) ?>...
            </div>
        </div>
        <span class="supp-article-meta"><?= number_format($art['views']) ?> views &rsaquo;</span>
    </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="supp-cta" style="margin-top:28px;max-width:760px">
    <div>
        <div class="supp-cta-title">Did not find what you need?</div>
        <div class="supp-cta-sub">Contact our support team directly for personalized help.</div>
    </div>
    <?php
    $catToKey = [
        'Purchase & Payment'      => 'payment',
        'Installation & Download' => 'install',
        'Account & Login'         => 'account',
        'Refund'                  => 'refund',
        'In-Game Issues'          => 'ingame',
        'Account Security'        => 'security',
    ];
    $contactKey = $catToKey[$artCat] ?? '';
    ?>
    <a href="/?page=support&tab=contact<?= $contactKey ? '&cat=' . $contactKey : '' ?>" class="btn btn-primary btn-sm">Contact Support</a>
</div>
