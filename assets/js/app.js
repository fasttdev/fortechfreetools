/* =========================================================
   FastDev Free Tools — app.js
   Shared behavior: ripple, stagger, anti double-tap zoom
   ========================================================= */

(function () {
    'use strict';

    /* ---------- Anti double-tap zoom ---------- */
    let lastTouchEnd = 0;
    document.addEventListener(
        'touchend',
        function (e) {
            const now = Date.now();
            if (now - lastTouchEnd <= 300) {
                e.preventDefault();
            }
            lastTouchEnd = now;
        },
        { passive: false }
    );

    /* ---------- Ripple effect ---------- */
    const toolbarItems = document.querySelectorAll('.toolbar__item');

    toolbarItems.forEach(function (item) {
        item.addEventListener('pointerdown', function (e) {
            const rect = item.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height) * 1.6;

            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.width = size + 'px';
            ripple.style.height = size + 'px';
            ripple.style.left = e.clientX - rect.left - size / 2 + 'px';
            ripple.style.top = e.clientY - rect.top - size / 2 + 'px';

            item.appendChild(ripple);

            window.setTimeout(function () {
                ripple.remove();
            }, 700);
        });
    });

    /* ---------- Staggered fade-in ---------- */
    const staggerEls = document.querySelectorAll('[data-stagger]');

    staggerEls.forEach(function (el, i) {
        el.style.animationDelay = i * 70 + 'ms';
        el.classList.add('fade-in');
    });

    /* ---------- Prevent long-press context menu ---------- */
    document.addEventListener('contextmenu', function (e) {
        if (e.target.closest('.toolbar, .tool-card, .maint-btn')) {
            e.preventDefault();
        }
    });

    /* ---------- Debug ---------- */
    const currentPage = document.body.dataset.page || 'unknown';
    if (window.console && window.console.debug) {
        window.console.debug('[FastDev] page =', currentPage);
    }
})();