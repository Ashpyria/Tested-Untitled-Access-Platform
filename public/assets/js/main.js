// ============================================================
// HERO SLIDESHOW
// ============================================================
let currentSlide = 0;

function goSlide(n) {
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.hero-dot');
    if (!slides.length) return;
    slides.forEach((s, i) => s.classList.toggle('active', i === n));
    dots.forEach((d, i)   => d.classList.toggle('active', i === n));
    currentSlide = n;
}

(function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 1) {
        setInterval(() => goSlide((currentSlide + 1) % slides.length), 5000);
    }
})();

// ============================================================
// TABS — shared across all pages
// ============================================================
function switchTab(clickedBtn, targetId) {
    const tabsContainer = clickedBtn.closest('.tabs');
    const pageWrapper   = tabsContainer.parentElement;

    tabsContainer.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    pageWrapper.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

    clickedBtn.classList.add('active');
    document.getElementById(targetId).classList.add('active');
}

// ============================================================
// TOAST NOTIFICATION
// ============================================================
let toastTimer;

function showToast(icon, msg, sub) {
    const t = document.getElementById('toast');
    if (!t) return;
    document.getElementById('toastIcon').textContent = icon || '';
    document.getElementById('toastMsg').textContent  = msg  || '';
    document.getElementById('toastSub').textContent  = sub  || '';
    t.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
}

// ============================================================
// DOM READY
// ============================================================
document.addEventListener('DOMContentLoaded', function () {

    // Highlight active topbar nav link from URL
    const params      = new URLSearchParams(window.location.search);
    const currentPage = params.get('page') || 'store';

    document.querySelectorAll('.topbar-nav a').forEach(link => {
        const href     = link.getAttribute('href') || '';
        const linkPage = new URLSearchParams(href.split('?')[1] || '').get('page');
        if (linkPage === currentPage) link.classList.add('active');
    });

    // Search input — Enter key
    const searchInput = document.querySelector('.topbar-search-input');
    if (searchInput) {
        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = '/?page=store&search=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    // Add to cart / add to wishlist — optional toast feedback
    document.querySelectorAll('[data-toast]').forEach(el => {
        el.addEventListener('click', function () {
            const msg = this.dataset.toast;
            if (msg) showToast('', msg, '');
        });
    });

});
