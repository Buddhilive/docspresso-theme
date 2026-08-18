( function () {
	'use strict';

	var STORAGE_KEY = 'docspresso-theme';
	var root = document.documentElement;

	function getSystemPreference() {
		return window.matchMedia && window.matchMedia( '(prefers-color-scheme: dark)' ).matches
			? 'dark'
			: 'light';
	}

	function getStoredTheme() {
		try {
			return window.localStorage.getItem( STORAGE_KEY );
		} catch ( e ) {
			return null;
		}
	}

	function storeTheme( theme ) {
		try {
			window.localStorage.setItem( STORAGE_KEY, theme );
		} catch ( e ) {
			// Storage unavailable (private browsing, disabled cookies, etc). Fail silently.
		}
	}

	function applyTheme( theme ) {
		root.setAttribute( 'data-theme', theme );
		document.querySelectorAll( '[data-theme-toggle]' ).forEach( function ( button ) {
			button.setAttribute( 'aria-pressed', theme === 'dark' ? 'true' : 'false' );
		} );
	}

	// Apply immediately (also duplicated inline in header.html to avoid a flash of
	// wrong theme before this deferred script loads).
	applyTheme( getStoredTheme() || getSystemPreference() );

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( '[data-theme-toggle]' );
		if ( ! button ) {
			return;
		}
		var next = root.getAttribute( 'data-theme' ) === 'dark' ? 'light' : 'dark';
		applyTheme( next );
		storeTheme( next );
	} );

	if ( window.matchMedia ) {
		window.matchMedia( '(prefers-color-scheme: dark)' ).addEventListener( 'change', function ( event ) {
			if ( getStoredTheme() ) {
				return; // Respect an explicit user choice over the OS change.
			}
			applyTheme( event.matches ? 'dark' : 'light' );
		} );
	}
} )();
