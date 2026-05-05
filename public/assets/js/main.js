// ============================================================
// TABS — shared, dipakai di semua page
// ============================================================
function switchTab(clickedBtn, targetId) {
    const tabsContainer = clickedBtn.closest('.tabs');
    const pageWrapper   = tabsContainer.parentElement;

    tabsContainer.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    pageWrapper.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });

    clickedBtn.classList.add('active');
    document.getElementById(targetId).classList.add('active');
}

// ============================================================
// SHARED — navbar highlight + search
// ============================================================
document.addEventListener('DOMContentLoaded', function () {

    const params      = new URLSearchParams(window.location.search);
    const currentPage = params.get('page') || 'store';

    document.querySelectorAll('.nav-link').forEach(link => {
        const href     = link.getAttribute('href');
        const linkPage = new URLSearchParams(href.split('?')[1]).get('page');
        if (linkPage === currentPage) link.classList.add('active');
    });

    const navSearch = document.querySelector('.navbar-search input');
    if (navSearch) {
        navSearch.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && this.value.trim() !== '') {
                window.location.href = '/?page=store&search=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    const navSearchBtn = document.querySelector('.navbar-search button');
    if (navSearchBtn) {
        navSearchBtn.addEventListener('click', function () {
            const input = this.previousElementSibling;
            if (input && input.value.trim() !== '') {
                window.location.href = '/?page=store&search=' + encodeURIComponent(input.value.trim());
            }
        });
    }

});
