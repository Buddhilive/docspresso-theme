<?php
/**
 * Docspresso theme setup.
 *
 * @package Docspresso
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DOCSPRESSO_VERSION', '1.0.0' );
define( 'DOCSPRESSO_DIR', get_template_directory() );
define( 'DOCSPRESSO_URI', get_template_directory_uri() );

/**
 * Theme setup: supports, image sizes, editor style.
 */
function docspresso_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	add_image_size( 'docspresso-card', 800, 500, true );
	add_image_size( 'docspresso-hero', 1920, 1080, true );

	// Tailwind-classed patterns preview correctly inside the block editor.
	add_editor_style( 'assets/build/style.css' );
}
add_action( 'after_setup_theme', 'docspresso_setup' );

/**
 * Enqueue the compiled Tailwind stylesheet and theme toggle script.
 */
function docspresso_enqueue_assets() {
	$style_path = DOCSPRESSO_DIR . '/assets/build/style.css';
	$style_ver  = file_exists( $style_path ) ? filemtime( $style_path ) : DOCSPRESSO_VERSION;

	wp_enqueue_style(
		'docspresso-style',
		DOCSPRESSO_URI . '/assets/build/style.css',
		array(),
		$style_ver
	);

	$toggle_path = DOCSPRESSO_DIR . '/assets/js/theme-toggle.js';
	$toggle_ver  = file_exists( $toggle_path ) ? filemtime( $toggle_path ) : DOCSPRESSO_VERSION;

	wp_enqueue_script(
		'docspresso-theme-toggle',
		DOCSPRESSO_URI . '/assets/js/theme-toggle.js',
		array(),
		$toggle_ver,
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'docspresso_enqueue_assets' );

/**
 * Set the data-theme attribute before first paint to avoid a flash of the
 * wrong color scheme while assets/js/theme-toggle.js (deferred) loads.
 */
function docspresso_inline_theme_bootstrap() {
	?>
	<script>
	( function () {
		try {
			var stored = window.localStorage.getItem( 'docspresso-theme' );
			var theme = stored || ( window.matchMedia && window.matchMedia( '(prefers-color-scheme: dark)' ).matches ? 'dark' : 'light' );
			document.documentElement.setAttribute( 'data-theme', theme );
		} catch ( e ) {}
	} )();
	</script>
	<?php
}
add_action( 'wp_head', 'docspresso_inline_theme_bootstrap', 1 );

/**
 * Register block pattern categories used by this theme.
 */
function docspresso_register_pattern_categories() {
	register_block_pattern_category(
		'docspresso',
		array( 'label' => __( 'Docspresso', 'docspresso' ) )
	);
}
add_action( 'init', 'docspresso_register_pattern_categories' );

/**
 * Block Bindings API: dynamic copyright year source.
 *
 * Bound into a paragraph in parts/footer.html so the footer always
 * reads "2015 - {current year}" without hardcoding or shortcodes.
 */
function docspresso_register_block_bindings() {
	if ( ! function_exists( 'register_block_bindings_source' ) ) {
		return;
	}

	register_block_bindings_source(
		'docspresso/copyright-year',
		array(
			'label'              => __( 'Copyright Year', 'docspresso' ),
			'get_value_callback' => function () {
				return sprintf(
					/* translators: %d: current year. */
					__( '2015 - %d', 'docspresso' ),
					(int) current_time( 'Y' )
				);
			},
		)
	);
}
add_action( 'init', 'docspresso_register_block_bindings' );
