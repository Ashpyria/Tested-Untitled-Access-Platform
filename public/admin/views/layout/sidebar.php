<aside style="position:fixed;top:0;left:0;width:220px;height:100vh;background:var(--bg-deep);border-right:1px solid var(--border);display:flex;flex-direction:column;z-index:50;overflow:hidden">

    <!-- Logo -->
    <div style="padding:20px 20px 16px;border-bottom:1px solid var(--border);flex-shrink:0">
        <a href="/admin/" style="display:flex;align-items:center;gap:10px;text-decoration:none">
            <img src="/assets/images/logo.png" style="height:28px;width:auto;object-fit:contain">
            <span style="font-family:'Monda',sans-serif;font-size:11px;font-weight:700;letter-spacing:0.12em;color:var(--accent);text-transform:uppercase">Admin</span>
        </a>
    </div>

    <!-- Nav -->
    <nav style="flex:1;padding:16px 0;display:flex;flex-direction:column;gap:2px">

        <span style="font-size:10px;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:var(--text-dim);padding:0 20px;margin-bottom:6px;font-family:'Monda',sans-serif">Management</span>

        <a href="/admin/?page=dashboard"
           style="display:flex;align-items:center;gap:10px;padding:9px 20px;font-size:13px;font-weight:600;font-family:'Monda',sans-serif;text-decoration:none;border-left:2px solid <?= $page === 'dashboard' ? 'var(--accent)' : 'transparent' ?>;color:<?= $page === 'dashboard' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'dashboard' ? 'rgba(184,50,50,0.06)' : 'transparent' ?>">
            Dashboard
        </a>

        <a href="/admin/?page=games"
           style="display:flex;align-items:center;gap:10px;padding:9px 20px;font-size:13px;font-weight:600;font-family:'Monda',sans-serif;text-decoration:none;border-left:2px solid <?= $page === 'games' ? 'var(--accent)' : 'transparent' ?>;color:<?= $page === 'games' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'games' ? 'rgba(184,50,50,0.06)' : 'transparent' ?>">
            Games
        </a>

        <a href="/admin/?page=users"
           style="display:flex;align-items:center;gap:10px;padding:9px 20px;font-size:13px;font-weight:600;font-family:'Monda',sans-serif;text-decoration:none;border-left:2px solid <?= $page === 'users' ? 'var(--accent)' : 'transparent' ?>;color:<?= $page === 'users' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'users' ? 'rgba(184,50,50,0.06)' : 'transparent' ?>">
            Users
        </a>

        <a href="/admin/?page=tickets"
           style="display:flex;align-items:center;gap:10px;padding:9px 20px;font-size:13px;font-weight:600;font-family:'Monda',sans-serif;text-decoration:none;border-left:2px solid <?= $page === 'tickets' ? 'var(--accent)' : 'transparent' ?>;color:<?= $page === 'tickets' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'tickets' ? 'rgba(184,50,50,0.06)' : 'transparent' ?>">
            Support Tickets
        </a>

    </nav>

    <!-- Footer -->
    <div style="padding:16px 20px;border-top:1px solid var(--border);flex-shrink:0;display:flex;flex-direction:column;gap:4px">
        <a href="/?page=store" style="padding:8px 0;font-size:12px;font-weight:600;font-family:'Monda',sans-serif;color:var(--text-secondary);text-decoration:none">Back to Store</a>
        <a href="/?page=logout" style="padding:8px 0;font-size:12px;font-weight:600;font-family:'Monda',sans-serif;color:var(--danger);text-decoration:none">Logout</a>
    </div>

</aside>
