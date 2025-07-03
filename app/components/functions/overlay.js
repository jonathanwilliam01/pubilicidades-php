        document.addEventListener('click', function (e) {
        const btn = e.target.closest('.more-btn');

        document.querySelectorAll('.options-menu').forEach(menu => {
            menu.style.display = 'none';
        });

        if (btn) {
            const menu = btn.parentElement.querySelector('.options-menu');
            if (menu) {
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            }
            e.stopPropagation();
        };

        overlay.addEventListener('click', e => {
            if (e.target === overlay) overlay.style.display = 'none';
             });
        });