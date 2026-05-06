<div class="grid-2" style="align-items:start">
    <div style="display:flex;flex-direction:column;gap:20px">

        <div>
            <h2 class="section-title">Recently Played</h2>
            <?php if (empty($recentlyPlayed)): ?>
            <div class="card" style="padding:20px;text-align:center">
                <p class="text-secondary">Belum ada game yang dimainkan.</p>
            </div>
            <?php else: ?>
            <div style="display:flex;flex-direction:column;gap:8px">
                <?php foreach ($recentlyPlayed as $game): ?>
                <div class="card" style="padding:14px 16px">
                    <div class="flex-between">
                        <div class="flex-gap">
                            <div style="width:44px;height:44px;background:var(--bg-secondary);flex-shrink:0"></div>
                            <div>
                                <p class="text-white" style="font-weight:600;font-size:13px"><?= htmlspecialchars($game['title']) ?></p>
                                <p class="text-secondary text-sm"><?= $game['hours_played'] ?> jam total</p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-green btn-sm">Play</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <div style="display:flex;flex-direction:column;gap:20px">
        <?php if ($mostPlayed): ?>
        <div>
            <h2 class="section-title">Most Played</h2>
            <div class="card" style="padding:20px;text-align:center">
                <div style="width:64px;height:64px;background:var(--bg-secondary);margin:0 auto 12px"></div>
                <p class="text-white" style="font-weight:700;font-size:16px;margin-bottom:4px"><?= htmlspecialchars($mostPlayed['title']) ?></p>
                <p class="text-secondary text-sm"><?= $mostPlayed['hours_played'] ?> jam dimainkan</p>
                <div class="flex-gap mt-8" style="justify-content:center">
                    <span class="tag tag-accent"><?= htmlspecialchars($mostPlayed['genre']) ?></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
