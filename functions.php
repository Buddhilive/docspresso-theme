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
 * Google AdSense Auto Ads publisher ID (format: pub-XXXXXXXXXXXXXXXX).
 * Leave empty to disable Auto Ads and /ads.txt output entirely — keep
 * unset on this local ServBay environment and only define it in the
 * production deploy.
 */
define( 'DOCSPRESSO_ADSENSE_PUBLISHER_ID', '' );

/**
 * Theme setup: supports, image sizes, editor style.
 */
function docspresso_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
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

/**
 * Whether a known SEO plugin is active. Used to avoid emitting duplicate or
 * conflicting meta description, canonical, Open Graph, Twitter Card or
 * JSON-LD output when a full SEO plugin already handles it.
 */
function docspresso_seo_plugin_active() {
	return (
		defined( 'WPSEO_VERSION' )                // Yoast SEO.
		|| class_exists( 'RankMath' )              // Rank Math.
		|| defined( 'THE_SEO_FRAMEWORK_VERSION' )  // The SEO Framework.
		|| class_exists( '\SEOPress\SEOPress' )    // SEOPress.
		|| class_exists( 'All_in_One_SEO_Pack' )   // All in One SEO (legacy).
		|| defined( 'AIOSEO_VERSION' )             // All in One SEO (current).
		|| class_exists( 'SlimSEO\Plugin' )        // Slim SEO.
	);
}

/**
 * Output baseline SEO meta tags (description, canonical, Open Graph,
 * Twitter Card) when no dedicated SEO plugin is active. This is a
 * theme-level safety net, not a replacement for a full SEO plugin.
 */
function docspresso_output_seo_meta_tags() {
	if ( docspresso_seo_plugin_active() || is_admin() ) {
		return;
	}

	$title     = wp_get_document_title();
	$site_name = get_bloginfo( 'name' );
	$image_url = '';

	if ( is_singular() ) {
		$post_id     = get_queried_object_id();
		$description = has_excerpt( $post_id )
			? wp_strip_all_tags( get_the_excerpt( $post_id ) )
			: wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 35 );
		$canonical   = get_permalink( $post_id );
		$og_type     = 'article';
		$image_id    = get_post_thumbnail_id( $post_id );
		$image_url   = $image_id ? wp_get_attachment_image_url( $image_id, 'docspresso-hero' ) : '';
	} else {
		$description = get_bloginfo( 'description' );
		$canonical   = is_front_page() ? home_url( '/' ) : docspresso_get_current_url();
		$og_type     = 'website';
	}
	?>
	<?php if ( $description ) : ?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>" />
	<?php endif; ?>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />

	<meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>" />
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
	<?php if ( $description ) : ?>
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />
	<?php endif; ?>
	<meta property="og:url" content="<?php echo esc_url( $canonical ); ?>" />
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>" />
	<?php if ( $image_url ) : ?>
	<meta property="og:image" content="<?php echo esc_url( $image_url ); ?>" />
	<?php endif; ?>

	<meta name="twitter:card" content="<?php echo esc_attr( $image_url ? 'summary_large_image' : 'summary' ); ?>" />
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>" />
	<?php if ( $description ) : ?>
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>" />
	<?php endif; ?>
	<?php if ( $image_url ) : ?>
	<meta name="twitter:image" content="<?php echo esc_url( $image_url ); ?>" />
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', 'docspresso_output_seo_meta_tags', 2 );

/**
 * Current front-end request URL, used as a canonical fallback for
 * non-singular views (archives, search, etc).
 */
function docspresso_get_current_url() {
	global $wp;
	return home_url( add_query_arg( array(), $wp->request ) );
}

/**
 * Output minimal Organization + WebSite JSON-LD when no SEO plugin is
 * active. Intentionally limited in scope — this is a safety net, not a
 * substitute for a dedicated SEO plugin's richer schema graph.
 */
function docspresso_output_schema_jsonld() {
	if ( docspresso_seo_plugin_active() || is_admin() ) {
		return;
	}

	$site_name = get_bloginfo( 'name' );
	$site_url  = home_url( '/' );
	$logo_id   = get_theme_mod( 'custom_logo' );
	$logo_url  = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';

	$graph = array(
		array(
			'@type' => 'Organization',
			'@id'   => $site_url . '#organization',
			'name'  => $site_name,
			'url'   => $site_url,
		),
		array(
			'@type'     => 'WebSite',
			'@id'       => $site_url . '#website',
			'name'      => $site_name,
			'url'       => $site_url,
			'publisher' => array( '@id' => $site_url . '#organization' ),
		),
	);

	if ( $logo_url ) {
		$graph[0]['logo'] = $logo_url;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'docspresso_output_schema_jsonld', 3 );

/**
 * Output the Google AdSense Auto Ads script when a publisher ID is
 * configured via DOCSPRESSO_ADSENSE_PUBLISHER_ID.
 */
function docspresso_output_adsense_auto_ads() {
	if ( ! DOCSPRESSO_ADSENSE_PUBLISHER_ID ) {
		return;
	}

	$publisher_id = DOCSPRESSO_ADSENSE_PUBLISHER_ID;

	if ( ! preg_match( '/^pub-\d{16}$/', $publisher_id ) ) {
		return;
	}
	?>
	<script async src="<?php echo esc_url( 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' . $publisher_id ); ?>" crossorigin="anonymous"></script>
	<?php
}
add_action( 'wp_head', 'docspresso_output_adsense_auto_ads', 5 );

/**
 * Register the rewrite rule that serves a virtual /ads.txt.
 *
 * After this ships, visit Settings -> Permalinks -> Save Changes once in
 * wp-admin to flush rewrite rules, or /ads.txt will 404.
 */
function docspresso_register_ads_txt_rewrite() {
	add_rewrite_rule( '^ads\.txt$', 'index.php?docspresso_ads_txt=1', 'top' );
}
add_action( 'init', 'docspresso_register_ads_txt_rewrite' );

/**
 * Register the ads_txt query var so WP recognizes it from the rewrite rule.
 */
function docspresso_register_ads_txt_query_var( $vars ) {
	$vars[] = 'docspresso_ads_txt';
	return $vars;
}
add_filter( 'query_vars', 'docspresso_register_ads_txt_query_var' );

/**
 * Output ads.txt content and short-circuit the request when the
 * docspresso_ads_txt query var is present.
 */
function docspresso_render_ads_txt() {
	if ( ! get_query_var( 'docspresso_ads_txt' ) ) {
		return;
	}

	$publisher_id = DOCSPRESSO_ADSENSE_PUBLISHER_ID;

	if ( ! $publisher_id || ! preg_match( '/^pub-\d{16}$/', $publisher_id ) ) {
		status_header( 404 );
		exit;
	}

	header( 'Content-Type: text/plain; charset=utf-8' );
	echo esc_html( 'google.com, ' . $publisher_id . ', DIRECT, f08c47fec0942fa0' );
	exit;
}
add_action( 'template_redirect', 'docspresso_render_ads_txt' );
