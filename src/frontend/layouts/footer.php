</main>

<footer class="footer">
    <div class="container">

        <!-- Footer Grid -->
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-brand">
                <a href="/?page=store" class="navbar-logo">
                        UAP <span>Platform</span>
                </a>
                <p>Platform distribusi game digital. Temukan, beli, dan mainkan ribuan game favoritmu.</p>
            </div>

            <!-- Store Links -->
            <div>
                <p class="footer-col-title">Store</p>
                <ul class="footer-links">
                    <li><a href="/?page=store">Home</a></li>
                    <li><a href="/?page=store&filter=new">New Releases</a></li>
                    <li><a href="/?page=store&filter=sale">Special Offers</a></li>
                    <li><a href="/?page=store&filter=free">Free to Play</a></li>
                </ul>
            </div>

            <!-- Community Links -->
            <div>
                <p class="footer-col-title">Community</p>
                <ul class="footer-links">
                    <li><a href="/?page=community">Forum</a></li>
                    <li><a href="/?page=community&tab=activity">Activity</a></li>
                    <li><a href="/?page=community&tab=reviews">Reviews</a></li>
                    <li><a href="/?page=community&tab=guides">Guides</a></li>
                </ul>
            </div>

            <!-- Support Links -->
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

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> UAP - Untitled Access Platform. All rights reserved.</p>
            <div class="flex-gap">
                <a href="#" class="text-secondary text-sm">Privacy Policy</a>
                <a href="#" class="text-secondary text-sm">Terms of Service</a>
                <a href="#" class="text-secondary text-sm">Cookie Settings</a>
            </div>
        </div>

    </div>
</footer>

<script src="/assets/js/main.js"></script>
<?php if (file_exists(__DIR__ . '/../../public/assets/js/' . $current_page . '.js')): ?>
<script src="/assets/js/<?= $current_page ?>.js"></script>
<?php endif; ?>

</body>
</html>
