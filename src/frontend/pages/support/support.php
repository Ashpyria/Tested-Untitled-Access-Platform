<?php if ($page === 'support'): ?>
<?php require_once __DIR__ . '/../../../backend/models/Support.php'; ?>
<?php endif; ?>

<!-- PAGE HEADER -->
<div class="hero" style="padding:36px 40px;margin-bottom:32px">
    <div class="hero-content" style="text-align:center">
        <p class="hero-tag">Help Center</p>
        <h1 class="hero-title" style="font-size:28px">Bagaimana kami bisa membantu?</h1>
        <div class="navbar-search" style="max-width:500px;margin:16px auto 0">
            <input type="text" placeholder="Cari topik bantuan..." style="width:100%">
            <button>Cari</button>
        </div>
    </div>
</div>

<!-- TABS -->
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab(this, 'tab-home')">Help Home</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-faq')">FAQ</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-contact')">Contact Us</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-refund')">Refund Policy</button>
</div>

<div id="tab-home"    class="tab-content active"><?php include __DIR__ . '/help-home.php'; ?></div>
<div id="tab-faq"     class="tab-content">       <?php include __DIR__ . '/faq.php'; ?></div>
<div id="tab-contact" class="tab-content">       <?php include __DIR__ . '/contact.php'; ?></div>
<div id="tab-refund"  class="tab-content">       <?php include __DIR__ . '/refund.php'; ?></div>
