</div><!-- /page-content -->

<!-- ============================================================
     FOOTER — inside main-content
     ============================================================ -->
<footer class="footer">

    <div class="footer-grid">

        <!-- Brand -->
        <div class="footer-brand">
            <a href="/?page=store" class="footer-logo-link">
                <img src="/assets/images/logo.png" alt="UAP" class="footer-logo-img">
            </a>
            <p>Platform distribusi game digital. Temukan, beli, dan mainkan game favoritmu kapan saja.</p>
        </div>

        <!-- Store -->
        <div>
            <p class="footer-col-title">Store</p>
            <ul class="footer-links">
                <li><a href="/?page=store">Featured</a></li>
                <li><a href="/?page=store&filter=new">New Releases</a></li>
                <li><a href="/?page=store&filter=sale">Special Offers</a></li>
                <li><a href="/?page=store&filter=free">Free to Play</a></li>
            </ul>
        </div>

        <!-- Community -->
        <div>
            <p class="footer-col-title">Community</p>
            <ul class="footer-links">
                <li><a href="/?page=community">Feed</a></li>
                <li><a href="/?page=community&tab=guides">Guides</a></li>
                <li><a href="/?page=community&tab=reviews">Reviews</a></li>
                <li><a href="/?page=community&tab=guides">Guides</a></li>
            </ul>
        </div>

        <!-- Help -->
        <div>
            <p class="footer-col-title">Help</p>
            <ul class="footer-links">
                <li><a href="/?page=support">Help Center</a></li>
                <li><a href="/?page=support&tab=faq">FAQ</a></li>
                <li><a href="/?page=support&tab=contact">Contact Us</a></li>
                <li><a href="/?page=support&tab=refund">Refund Policy</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> UAP &mdash; Untitled Access Platform. All rights reserved.</p>
        <div style="display:flex;gap:16px">
            <a href="#" class="text-secondary text-sm">Privacy Policy</a>
            <a href="#" class="text-secondary text-sm">Terms of Service</a>
            <a href="#" class="text-secondary text-sm">Cookie Settings</a>
        </div>
    </div>

</footer>

</main><!-- /main-content -->
</div><!-- /app-layout -->

<!-- TOAST NOTIFICATION -->
<div class="toast" id="toast">
    <div class="toast-icon" id="toastIcon"></div>
    <div>
        <div class="toast-msg" id="toastMsg"></div>
        <div class="toast-sub" id="toastSub"></div>
    </div>
</div>

<script src="/assets/js/main.js"></script>
<?php if (file_exists(__DIR__ . '/../../../public/assets/js/' . ($current_page ?? 'store') . '.js')): ?>
<script src="/assets/js/<?= htmlspecialchars($current_page ?? 'store') ?>.js"></script>
<?php endif; ?>

</body>
</html>
