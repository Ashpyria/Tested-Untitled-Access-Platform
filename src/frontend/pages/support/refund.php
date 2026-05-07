<?php
$rules = [
    ['color' => '#4a8a5a', 'title' => 'Eligibility',       'body' => 'Request must be submitted within <strong>14 days</strong> of purchase and total playtime must be <strong>under 2 hours</strong>.'],
    ['color' => '#6677aa', 'title' => 'Processing Time',   'body' => 'Refund verification takes <strong>1–3 business days</strong>. Funds are returned within <strong>3–7 business days</strong> after approval.'],
    ['color' => '#c04040', 'title' => 'Non-Refundable',    'body' => 'DLC, in-game items, UAP Wallet top-ups, and games played for <strong>more than 2 hours</strong> are not eligible for refund.'],
    ['color' => '#a08040', 'title' => 'How to Request',    'body' => 'Click <strong>Request a Refund</strong> below, select <strong>Refund</strong> as the category, and describe your purchase. Our team will review within 1–3 business days.'],
];
?>

<div class="supp-section-label">Refund Policy</div>

<div class="supp-refund-layout">

    <!-- POLICY RULES -->
    <div style="display:flex;flex-direction:column;gap:12px">
        <div class="supp-refund-intro">
            UAP makes refunds easy to ensure your satisfaction with every purchase.
            Below are the terms and conditions that apply to all refund requests.
        </div>

        <?php foreach ($rules as $rule): ?>
        <div class="supp-refund-rule" style="border-left-color:<?= $rule['color'] ?>">
            <div class="supp-refund-rule-title" style="color:<?= $rule['color'] ?>"><?= $rule['title'] ?></div>
            <div class="supp-refund-rule-body"><?= $rule['body'] ?></div>
        </div>
        <?php endforeach; ?>

        <div style="margin-top:8px">
            <a href="/?page=support&tab=contact&cat=refund" class="btn btn-primary">Request a Refund</a>
        </div>
    </div>

    <!-- QUICK CHECK -->
    <div class="supp-refund-checker">
        <div class="supp-section-label" style="margin-bottom:16px">Quick Eligibility Check</div>

        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--ok">&#10003;</span>
            <span>Purchased within the last 14 days</span>
        </div>
        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--ok">&#10003;</span>
            <span>Less than 2 hours of total playtime</span>
        </div>
        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--ok">&#10003;</span>
            <span>Full game (not DLC or in-game item)</span>
        </div>
        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--ok">&#10003;</span>
            <span>Not purchased with promotional credit</span>
        </div>

        <div style="border-top:1px solid var(--border);margin:16px 0"></div>

        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--no">&#10007;</span>
            <span>More than 2 hours played — not eligible</span>
        </div>
        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--no">&#10007;</span>
            <span>Purchase older than 14 days — not eligible</span>
        </div>
        <div class="supp-check-row">
            <span class="supp-check-icon supp-check-icon--no">&#10007;</span>
            <span>DLC or in-game items — not eligible</span>
        </div>

        <a href="/?page=support&tab=contact&cat=refund" class="btn btn-outline btn-sm btn-block" style="margin-top:20px">
            Submit Refund Request &rsaquo;
        </a>
    </div>

</div>
