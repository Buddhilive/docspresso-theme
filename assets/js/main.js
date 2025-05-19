/**
 * Main JavaScript file for DocsPresso Tech Blog
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Search Toggle Functionality
    const searchToggle = document.getElementById('search-toggle');
    const searchDropdown = document.getElementById('search-dropdown');
    const searchField = searchDropdown ? searchDropdown.querySelector('.search-field') : null;
    
    if (searchToggle && searchDropdown) {
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = searchToggle.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                closeSearch();
            } else {
                openSearch();
            }
        });
        
        // Close search when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchDropdown.contains(e.target) && !searchToggle.contains(e.target)) {
                closeSearch();
            }
        });
        
        // Close search on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSearch();
            }
        });
    }
    
    function openSearch() {
        searchToggle.setAttribute('aria-expanded', 'true');
        searchDropdown.classList.remove('hidden');
        
        // Force reflow before adding visible classes
        requestAnimationFrame(() => {
            searchDropdown.classList.remove('opacity-0', 'translate-y-2');
            searchDropdown.classList.add('opacity-100', 'translate-y-0');
            
            // Focus the search field after animation
            setTimeout(() => {
                if (searchField) {
                    searchField.focus();
                }
            }, 100);
        });
    }
    
    function closeSearch() {
        searchToggle.setAttribute('aria-expanded', 'false');
        searchDropdown.classList.remove('opacity-100', 'translate-y-0');
        searchDropdown.classList.add('opacity-0', 'translate-y-2');
        
        // Hide the dropdown after animation
        setTimeout(() => {
            searchDropdown.classList.add('hidden');
        }, 200);
    }

    // Mobile Menu Functionality
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = mobileMenuToggle ? mobileMenuToggle.querySelector('.hamburger-icon') : null;
    const closeIcon = mobileMenuToggle ? mobileMenuToggle.querySelector('.close-icon') : null;
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                closeMobileMenu();
            }
        });
        
        // Close mobile menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });
        
        // Close mobile menu when window is resized to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) { // lg breakpoint
                closeMobileMenu();
            }
        });
    }
    
    function openMobileMenu() {
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
        mobileMenu.classList.remove('hidden');
        
        // Toggle icons
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Force reflow before adding visible classes
        requestAnimationFrame(() => {
            mobileMenu.classList.remove('opacity-0', 'translate-y-2');
            mobileMenu.classList.add('opacity-100', 'translate-y-0');
        });
    }
    
    function closeMobileMenu() {
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.classList.remove('opacity-100', 'translate-y-0');
        mobileMenu.classList.add('opacity-0', 'translate-y-2');
        
        // Toggle icons
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
        
        // Restore body scroll
        document.body.style.overflow = '';
        
        // Hide the menu after animation
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 200);
    }

    // Enhanced Dropdown Menu Functionality for Desktop
    const dropdownMenus = document.querySelectorAll('.main-navigation .menu-item-has-children');
    
    dropdownMenus.forEach(function(menuItem) {
        const submenu = menuItem.querySelector('ul');
        let timeout;
        
        if (submenu) {
            // Show submenu on hover
            menuItem.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
                submenu.classList.remove('hidden');
                submenu.classList.add('block');
            });
            
            // Hide submenu on leave with delay
            menuItem.addEventListener('mouseleave', function() {
                timeout = setTimeout(function() {
                    submenu.classList.remove('block');
                    submenu.classList.add('hidden');
                }, 150);
            });
            
            // Keep submenu open when hovering over it
            submenu.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
            });
            
            submenu.addEventListener('mouseleave', function() {
                timeout = setTimeout(function() {
                    submenu.classList.remove('block');
                    submenu.classList.add('hidden');
                }, 150);
            });
        }
    });

    // Skip link focus fix
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('content');
            if (target) {
                target.focus();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Search Form Enhancements
    const searchForms = document.querySelectorAll('.search-form');
    
    searchForms.forEach(function(form) {
        const searchInput = form.querySelector('.search-field');
        
        if (searchInput) {
            // Clear button functionality
            const clearButton = document.createElement('button');
            clearButton.type = 'button';
            clearButton.className = 'search-clear absolute right-16 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 hidden';
            clearButton.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            clearButton.setAttribute('aria-label', 'Clear search');
            
            // Show/hide clear button
            function toggleClearButton() {
                if (searchInput.value.length > 0) {
                    clearButton.classList.remove('hidden');
                } else {
                    clearButton.classList.add('hidden');
                }
            }
            
            searchInput.addEventListener('input', toggleClearButton);
            searchInput.addEventListener('focus', toggleClearButton);
            
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                searchInput.focus();
                clearButton.classList.add('hidden');
            });
            
            // Add clear button to form if the wrapper is positioned relatively
            const wrapper = form.querySelector('.search-form-wrapper');
            if (wrapper) {
                wrapper.style.position = 'relative';
                wrapper.appendChild(clearButton);
            }
        }
    });

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});