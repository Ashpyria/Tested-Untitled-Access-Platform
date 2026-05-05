<!-- HERO BANNER -->
<div class="hero">
    <div class="hero-content">
        <p class="hero-tag">Featured Game</p>
        <h1 class="hero-title">Cyberpunk 2077</h1>
        <p class="hero-desc">
            Jelajahi Night City — kota futuristik penuh kejahatan dan ambisi.
            Jadilah V, tentukan jalanmu sendiri dalam dunia open-world yang brutal.
        </p>
        <div class="hero-actions">
            <a href="#" class="btn btn-green btn-lg">Add to Cart — Rp 349.999</a>
            <a href="#" class="btn btn-outline btn-lg">Learn More</a>
        </div>
    </div>
</div>

<!-- TABS -->
<div class="tabs">
    <button class="tab-btn active" onclick="switchTab(this, 'tab-featured')">Featured</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-new')">New Releases</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-sale')">On Sale</button>
    <button class="tab-btn" onclick="switchTab(this, 'tab-free')">Free to Play</button>
</div>

<div id="tab-featured" class="tab-content active">
    <?php include __DIR__ . '/featured.php'; ?>
</div>

<div id="tab-new" class="tab-content">
    <?php include __DIR__ . '/new-releases.php'; ?>
</div>

<div id="tab-sale" class="tab-content">
    <?php include __DIR__ . '/on-sale.php'; ?>
</div>

<div id="tab-free" class="tab-content">
    <?php include __DIR__ . '/free-to-play.php'; ?>
</div>
