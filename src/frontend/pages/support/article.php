<?php
if (!$currentArticle): ?>
<div class="supp-empty">
    <p>Article not found.</p>
    <p><a href="/?page=support">Back to Help Center</a></p>
</div>
<?php return; endif;

// Related articles from same category
$related = [];
try {
    $related = array_filter(
        getArticlesByCategory($currentArticle['category']),
        fn($a) => $a['id'] !== $currentArticle['id']
    );
    $related = array_slice(array_values($related), 0, 4);
} catch (Exception $e) {}
?>

<!-- BREADCRUMB -->
<div class="supp-breadcrumb">
    <a href="/?page=support" class="supp-breadcrumb-link">Help Center</a>
    <span class="supp-breadcrumb-sep">/</span>
    <a href="/?page=support&tab=articles&cat=<?= urlencode($currentArticle['category']) ?>" class="supp-breadcrumb-link"><?= htmlspecialchars($currentArticle['category']) ?></a>
    <span class="supp-breadcrumb-sep">/</span>
    <span class="supp-breadcrumb-current"><?= htmlspecialchars(mb_strtolower($currentArticle['title'])) ?></span>
</div>

<div class="supp-article-layout">

    <!-- ARTICLE BODY -->
    <div class="supp-article-body">
        <div class="supp-article-cat-tag"><?= htmlspecialchars($currentArticle['category']) ?></div>
        <h2 class="supp-article-title"><?= htmlspecialchars($currentArticle['title']) ?></h2>
        <div class="supp-article-meta-row">
            <span><?= number_format($currentArticle['views']) ?> views</span>
            <span>Last updated <?= date('d M Y', strtotime($currentArticle['created_at'])) ?></span>
        </div>

        <div class="supp-article-content">
            <?php
            $lines = explode("\n", htmlspecialchars($currentArticle['content']));
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '') {
                    echo '<br>';
                } elseif (preg_match('/^[A-Z][A-Z\s&\/\-]+:$/', $line)) {
                    echo '<div class="supp-article-heading">' . $line . '</div>';
                } elseif (preg_match('/^\d+\./', $line)) {
                    echo '<div class="supp-article-step">' . $line . '</div>';
                } elseif (preg_match('/^-/', $line)) {
                    echo '<div class="supp-article-bullet">' . ltrim($line, '- ') . '</div>';
                } else {
                    echo '<p class="supp-article-para">' . $line . '</p>';
                }
            }
            ?>
        </div>

        <!-- WAS THIS HELPFUL -->
        <div class="supp-helpful">
            <div class="supp-helpful-label">Was this article helpful?</div>
            <div style="display:flex;gap:8px">
                <button class="btn btn-outline btn-sm" onclick="this.textContent='Thanks!';this.disabled=true;this.nextElementSibling.disabled=true">Yes</button>
                <button class="btn btn-outline btn-sm" onclick="this.textContent='Sorry!';this.disabled=true;this.previousElementSibling.disabled=true">No</button>
            </div>
        </div>

        <!-- STILL NEED HELP -->
        <div class="supp-cta" style="margin-top:20px">
            <div>
                <div class="supp-cta-title">Still need help?</div>
                <div class="supp-cta-sub">Our support team is available every day.</div>
            </div>
            <a href="/?page=support&tab=contact" class="btn btn-primary btn-sm">Contact Support</a>
        </div>
    </div>

    <!-- SIDEBAR: RELATED -->
    <?php if (!empty($related)): ?>
    <aside class="supp-article-sidebar">
        <div class="supp-section-label" style="margin-bottom:12px">Related Articles</div>
        <div style="display:flex;flex-direction:column;gap:4px">
            <?php foreach ($related as $rel): ?>
            <a href="/?page=support&tab=article&id=<?= $rel['id'] ?>" class="supp-related-link">
                <span><?= htmlspecialchars($rel['title']) ?></span>
                <span class="supp-related-views"><?= number_format($rel['views']) ?> views</span>
            </a>
            <?php endforeach; ?>
        </div>
        <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--border)">
            <a href="/?page=support&tab=articles&cat=<?= urlencode($currentArticle['category']) ?>" class="supp-clear-search">
                All <?= htmlspecialchars($currentArticle['category']) ?> articles &rsaquo;
            </a>
        </div>
    </aside>
    <?php endif; ?>

</div>
