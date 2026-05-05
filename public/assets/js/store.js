document.addEventListener('DOMContentLoaded', function () {

    const params      = new URLSearchParams(window.location.search);
    const tabParam    = params.get('tab');
    const filterParam = params.get('filter');

    const filterMap = {
        'new'  : 'tab-new',
        'sale' : 'tab-sale',
        'free' : 'tab-free',
    };

    const activeTabId = tabParam
        ? 'tab-' + tabParam
        : (filterParam && filterMap[filterParam])
            ? filterMap[filterParam]
            : null;

    if (activeTabId && document.getElementById(activeTabId)) {
        document.querySelectorAll('.tab-btn').forEach(btn => {
            if ((btn.getAttribute('onclick') || '').includes(activeTabId)) {
                switchTab(btn, activeTabId);
            }
        });
    }

    document.querySelectorAll('.game-card').forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.closest('.btn') || e.target.closest('a')) return;
            console.log('Open game detail:', this.querySelector('.game-card-title')?.textContent);
        });
    });

});
