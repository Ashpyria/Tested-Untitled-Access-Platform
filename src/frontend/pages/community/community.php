<?php
$category = $_GET['category'] ?? null;
$posts    = getAllPosts($category);
$reviews  = getAllReviews();
$guides   = getAllGuides();
$stats    = getCommunityStats();
?>

<!-- PAGE HEADER -->
<div class="flex-between mb-24">
    <h1 class="page-title" style="margin-bottom:0;border:none">Community</h1>
    <?php if (isLoggedIn()): ?>
    <a href="#" class="btn btn-primary" onclick="switchTab(document.querySelector('.tab-btn'), 'tab-forum');document.getElementById('new-post-form').scrollIntoView()">New Post</a>
    <?php endif; ?>
</div>

<!-- TABS -->
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab(this, 'tab-forum')">Forum</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-reviews')">Reviews</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-guides')">Guides</button>
</div>

<div id="tab-forum"   class="tab-content active"><?php include __DIR__ . '/forum.php'; ?></div>
<div id="tab-reviews" class="tab-content">       <?php include __DIR__ . '/reviews.php'; ?></div>
<div id="tab-guides"  class="tab-content">       <?php include __DIR__ . '/guides.php'; ?></div>
