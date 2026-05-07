<?php
$ratingLabels = [5 => 'Masterpiece', 4 => 'Great', 3 => 'Good', 2 => 'Mixed', 1 => 'Poor'];
$ratingColors = [5 => '#4a8a5a', 4 => '#4a8a5a', 3 => '#a08040', 2 => '#a08040', 1 => '#c04040'];
?>

<!-- WRITE REVIEW FORM -->
<?php if (isLoggedIn() && !empty($userGames)): ?>
<div class="comm-compose" style="margin-bottom:16px">
    <?php $cu = getCurrentUser();
          $cc = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
          $col = $cc[crc32($cu['username']) % count($cc)];
          $cuAvatar = $cu['avatar'] ?? null;
          $cuHasAvatar = $cuAvatar && file_exists(__DIR__ . '/../../../../public/assets/images/avatars/' . $cuAvatar); ?>
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
        <?php if ($cuHasAvatar): ?>
        <img src="/assets/images/avatars/<?= htmlspecialchars($cuAvatar) ?>"
             class="comm-avatar" style="object-fit:cover;border-color:<?= $col ?>44">
        <?php else: ?>
        <div class="comm-avatar" style="background:<?= $col ?>22;border-color:<?= $col ?>55;color:<?= $col ?>">
            <?= mb_strtoupper(mb_substr($cu['username'], 0, 2)) ?>
        </div>
        <?php endif; ?>
        <span style="font-family:'Monda',sans-serif;font-size:13px;font-weight:600;color:var(--text-primary)"><?= htmlspecialchars($cu['username']) ?></span>
    </div>
    <form method="POST">
        <input type="hidden" name="action" value="create_review">
        <div style="display:grid;grid-template-columns:1fr auto;gap:8px;margin-bottom:10px">
            <select name="game_id" class="form-select">
                <?php foreach ($userGames as $g): ?>
                <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['title']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="rating" class="form-select" style="width:120px">
                <?php for ($i = 5; $i >= 1; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?>/5 — <?= $ratingLabels[$i] ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <textarea name="content" class="form-textarea" placeholder="Share your thoughts about this game..." style="min-height:80px;margin-bottom:10px"></textarea>
        <div style="display:flex;justify-content:flex-end">
            <button type="submit" class="btn btn-primary btn-sm">Submit Review</button>
        </div>
    </form>
</div>
<?php endif; ?>

<!-- REVIEWS LIST -->
<?php if (empty($reviews)): ?>
<div style="padding:48px;text-align:center;background:var(--bg-card);border:1px solid var(--border)">
    <p class="text-secondary">No reviews yet. Be the first to review a game!</p>
</div>
<?php else: ?>
<div style="display:flex;flex-direction:column;gap:8px">
    <?php foreach ($reviews as $review):
        $ucolors    = ['#b83232','#6677aa','#4a8a5a','#a08040','#7a6699'];
        $ucol       = $ucolors[crc32($review['username']) % count($ucolors)];
        $rating     = (int)$review['rating'];
        $rColor     = $ratingColors[$rating] ?? '#a08040';
        $rLabel     = $ratingLabels[$rating] ?? '';
        $avatarFile = $review['avatar'] ?? null;
        $hasAvatar  = $avatarFile && file_exists(__DIR__ . '/../../../../public/assets/images/avatars/' . $avatarFile);
    ?>
    <div class="comm-post-card">
        <div class="comm-post-top">
            <?php if ($hasAvatar): ?>
            <img src="/assets/images/avatars/<?= htmlspecialchars($avatarFile) ?>"
                 class="comm-avatar" style="object-fit:cover;border-color:<?= $ucol ?>44">
            <?php else: ?>
            <div class="comm-avatar" style="background:<?= $ucol ?>22;border-color:<?= $ucol ?>55;color:<?= $ucol ?>">
                <?= mb_strtoupper(mb_substr($review['username'], 0, 2)) ?>
            </div>
            <?php endif; ?>
            <div class="comm-post-meta">
                <span class="comm-post-author"><?= htmlspecialchars($review['username']) ?></span>
                <span class="comm-post-time">
                    <?= htmlspecialchars($review['game_title']) ?>
                    <?php if ($review['hours_played']): ?>&middot; <?= number_format($review['hours_played']) ?> hrs<?php endif; ?>
                    &middot; <?= timeAgo($review['created_at']) ?>
                </span>
            </div>
            <div style="display:flex;align-items:center;gap:6px;flex-shrink:0">
                <span style="font-family:'Monda',sans-serif;font-size:16px;font-weight:900;color:<?= $rColor ?>"><?= $rating ?><span style="font-size:11px;color:var(--text-dim)">/5</span></span>
                <span style="font-family:'Monda',sans-serif;font-size:10px;font-weight:700;color:<?= $rColor ?>;background:<?= $rColor ?>22;border:1px solid <?= $rColor ?>44;padding:2px 8px"><?= $rLabel ?></span>
            </div>
        </div>
        <div class="comm-post-body">
            <p class="comm-post-content" style="font-size:13px"><?= htmlspecialchars($review['content']) ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
