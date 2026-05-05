document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.game-card').forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.closest('.btn') || e.target.closest('a')) return;
            console.log('Open game detail:', this.querySelector('.game-card-title')?.textContent);
        });
    });

});
