<aside style="position:fixed;top:0;left:0;width:220px;height:100vh;background:var(--bg-header);border-right:1px solid var(--border);padding:24px 16px;display:flex;flex-direction:column;gap:4px">

    <a href="/admin/" style="font-size:16px;font-weight:800;color:var(--text-white);text-decoration:none;margin-bottom:24px;display:block">
        UAP <span style="color:var(--accent)">Admin</span>
    </a>

    <a href="/admin/?page=dashboard"
       style="display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:var(--radius-sm);color:<?= $page === 'dashboard' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'dashboard' ? 'var(--bg-hover)' : 'transparent' ?>;text-decoration:none;font-size:13px">
        Dashboard
    </a>

    <a href="/admin/?page=games"
       style="display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:var(--radius-sm);color:<?= $page === 'games' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'games' ? 'var(--bg-hover)' : 'transparent' ?>;text-decoration:none;font-size:13px">
        Games
    </a>

    <a href="/admin/?page=users"
       style="display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:var(--radius-sm);color:<?= $page === 'users' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'users' ? 'var(--bg-hover)' : 'transparent' ?>;text-decoration:none;font-size:13px">
        Users
    </a>

    <a href="/admin/?page=tickets"
       style="display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:var(--radius-sm);color:<?= $page === 'tickets' ? 'var(--accent)' : 'var(--text-secondary)' ?>;background:<?= $page === 'tickets' ? 'var(--bg-hover)' : 'transparent' ?>;text-decoration:none;font-size:13px">
        Support Tickets
    </a>

    <hr style="border:none;border-top:1px solid var(--border);margin:16px 0">

    <a href="/?page=store" style="padding:8px 10px;color:var(--text-secondary);text-decoration:none;font-size:13px">
        Back to Store
    </a>
    <a href="/?page=logout" style="padding:8px 10px;color:var(--danger);text-decoration:none;font-size:13px">
        Logout
    </a>

</aside>
