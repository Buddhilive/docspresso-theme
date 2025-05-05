/**
 * Main JavaScript file for DocsPresso Tech Blog
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenu = document.querySelector('#primary-menu');
    
    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', function() {
            const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !expanded);
            
            if (primaryMenu.style.display === 'none' || primaryMenu.style.display === '') {
                primaryMenu.style.display = 'flex';
                primaryMenu.style.flexDirection = 'column';
            } else {
                primaryMenu.style.display = 'none';
            }
        });
    }

    // Skip link focus fix
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('content');
            if (target) {
                target.focus();
            }
        });
    }
});