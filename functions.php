<?php
/**
 * DocsPresso Tech Blog functions and definitions
 *
 * @package DocsPresso_Tech_Blog
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'docspresso_theme_support' ) ) :
	/**
	 * Sets up theme defaults and registers support for WordPress features.
	 */
	function docspresso_theme_support() {

		// Make theme available for translation.
		load_theme_textdomain( 'docspresso-theme', get_template_directory() . '/languages' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for block editor styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/editor-style.css' );
		
		// Add support for automatic feed links
		add_theme_support( 'automatic-feed-links' );
		
		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		// Add support for custom logo
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		// Add support for HTML5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);
		
		// Add theme support for selective refresh for widgets
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Add support for core custom logo
		add_theme_support(
			'custom-logo',
			array(
				'height'               => 250,
				'width'                => 250,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'docspresso_theme_support' );

if ( ! function_exists( 'docspresso_register_block_patterns' ) ) :
	/**
	 * Register Block Patterns.
	 */
	function docspresso_register_block_patterns() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			// Register block patterns here if needed
		}
	}
endif;

add_action( 'init', 'docspresso_register_block_patterns' );

/**
 * Enqueue scripts and styles.
 */
function docspresso_scripts() {
	wp_enqueue_style( 'docspresso-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'docspresso-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'docspresso_scripts' );

/**
 * Custom function to display post meta information
 */
function docspresso_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'docspresso-theme' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'docspresso-theme' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'docspresso-theme' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'docspresso-theme' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			esc_html__( 'Leave a comment', 'docspresso-theme' ),
			esc_html__( '1 Comment', 'docspresso-theme' ),
			esc_html__( '% Comments', 'docspresso-theme' )
		);
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'docspresso-theme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Display post thumbnail
 */
function docspresso_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

		<?php
	else :
		?>

		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>
		</div><!-- .post-thumbnail -->

		<?php
	endif;
}