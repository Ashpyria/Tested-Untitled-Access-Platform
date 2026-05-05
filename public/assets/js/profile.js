document.addEventListener('DOMContentLoaded', function () {

    const params      = new URLSearchParams(window.location.search);
    const tabParam    = params.get('tab');
    const activeTabId = tabParam ? 'tab-' + tabParam : null;

    if (activeTabId && document.getElementById(activeTabId)) {
        document.querySelectorAll('.tab-btn').forEach(btn => {
            if ((btn.getAttribute('onclick') || '').includes(activeTabId)) {
                switchTab(btn, activeTabId);
            }
        });
    }

});
