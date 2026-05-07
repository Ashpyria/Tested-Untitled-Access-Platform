<?php
$q = trim($_GET['q'] ?? '');

$faqs = [
    ['q' => 'Can I refund a game I already purchased?',
     'a' => 'Yes, you can request a refund within 14 days of purchase as long as total playtime has not exceeded 2 hours. Go to the Refund Policy tab for full details or submit a request via Contact Us.'],
    ['q' => 'What payment methods are available?',
     'a' => 'We accept Bank Transfer, QRIS, GoPay, OVO, Dana, ShopeePay, and Visa/Mastercard Credit/Debit cards.'],
    ['q' => 'How long does the refund process take?',
     'a' => 'Refund verification takes 1–3 business days. Funds are returned to your original payment method within 3–7 business days after approval.'],
    ['q' => 'Can games be played offline?',
     'a' => 'It depends on the game. Most single-player games support offline mode after their initial download. Online and multiplayer games require an active internet connection.'],
    ['q' => 'Can I use my account on another device?',
     'a' => 'Yes, your UAP account works on any device. Just log in with the same email and password. A maximum of 3 devices can be active simultaneously.'],
    ['q' => 'What should I do if my account is hacked?',
     'a' => 'Contact our support team immediately via the Contact Us form with proof of account ownership (original email, purchase history). We will help recover your account within 24 hours.'],
    ['q' => 'How do I fix "Game failed to launch" error?',
     'a' => 'Try these steps in order: (1) Restart the UAP client, (2) Verify game files from your Library, (3) Update your GPU drivers, (4) Temporarily disable antivirus, (5) Reinstall the game. If the issue persists, contact support.'],
    ['q' => 'How do I enable Two-Factor Authentication?',
     'a' => 'Go to Account Settings → Security → Two-Factor Authentication and follow the setup steps. We support authenticator apps and SMS verification. Enabling 2FA is strongly recommended.'],
    ['q' => 'Why is my download speed slow?',
     'a' => 'Try switching to a closer download server in Settings → Downloads. Pause other downloads or streaming apps, connect via ethernet instead of Wi-Fi, and ensure no background apps are consuming bandwidth.'],
    ['q' => 'Can I transfer my games to another account?',
     'a' => 'Game licenses are tied to the purchasing account and cannot be transferred to another account. Family sharing features may be available depending on your region.'],
];

// Filter by search query
if ($q) {
    $ql = mb_strtolower($q);
    $faqs = array_filter($faqs, fn($f) =>
        str_contains(mb_strtolower($f['q']), $ql) || str_contains(mb_strtolower($f['a']), $ql)
    );
}
?>

<?php if ($q): ?>
<div class="supp-search-result-label">
    <?= count($faqs) ?> result<?= count($faqs) != 1 ? 's' : '' ?> for
    <strong>"<?= htmlspecialchars($q) ?>"</strong>
    &mdash; <a href="/?page=support&tab=faq" class="supp-clear-search">Clear search</a>
</div>
<?php endif; ?>

<div class="supp-section-label">Frequently Asked Questions</div>

<?php if (empty($faqs)): ?>
<div class="supp-empty">
    <p>No results found for "<?= htmlspecialchars($q) ?>".</p>
    <p>Try different keywords or <a href="/?page=support&tab=contact">contact our support team</a>.</p>
</div>
<?php else: ?>
<div class="supp-faq-list" id="faqList">
    <?php foreach (array_values($faqs) as $i => $faq): ?>
    <div class="supp-faq-item" id="faq-<?= $i ?>">
        <button class="supp-faq-q" onclick="toggleFaq(<?= $i ?>)" type="button">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <span class="supp-faq-chevron" id="chevron-<?= $i ?>">&#8250;</span>
        </button>
        <div class="supp-faq-a" id="faqA-<?= $i ?>">
            <div class="supp-faq-a-inner"><?= htmlspecialchars($faq['a']) ?></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="supp-cta" style="margin-top:28px">
    <div>
        <div class="supp-cta-title">Still have questions?</div>
        <div class="supp-cta-sub">Our team is happy to help with anything not covered here.</div>
    </div>
    <a href="/?page=support&tab=contact" class="btn btn-primary btn-sm">Contact Us</a>
</div>

<script>
function toggleFaq(i) {
    var a = document.getElementById('faqA-' + i);
    var c = document.getElementById('chevron-' + i);
    var item = document.getElementById('faq-' + i);
    var isOpen = item.classList.contains('open');
    // Close all
    document.querySelectorAll('.supp-faq-item.open').forEach(function(el) {
        el.classList.remove('open');
        el.querySelector('.supp-faq-a').style.maxHeight = null;
        el.querySelector('.supp-faq-chevron').style.transform = '';
    });
    // Open clicked if it was closed
    if (!isOpen) {
        item.classList.add('open');
        a.style.maxHeight = a.scrollHeight + 'px';
        c.style.transform = 'rotate(90deg)';
    }
}
</script>
