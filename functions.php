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
			// Register pattern categories
			register_block_pattern_category(
				'docspresso-sections',
				array( 'label' => __( 'DocsPresso Sections', 'docspresso-theme' ) )
			);

			// Register Hero Section pattern
			register_block_pattern(
				'docspresso/hero-section',
				array(
					'title'         => __( 'Hero Section', 'docspresso-theme' ),
					'description'   => __( 'A large homepage hero with call-to-action buttons', 'docspresso-theme' ),
					'content'       => file_get_contents( get_template_directory() . '/patterns/hero-section.php' ),
					'categories'    => array( 'featured', 'header', 'docspresso-sections' ),
					'keywords'      => array( 'hero', 'header', 'cta' ),
				)
			);

			// Register Latest Posts Grid pattern
			register_block_pattern(
				'docspresso/latest-posts-grid',
				array(
					'title'       => __( 'Read the latest - Posts Grid', 'docspresso-theme' ),
					'description' => __( 'Grid of latest posts for the homepage', 'docspresso-theme' ),
					'content'     => file_get_contents( get_template_directory() . '/patterns/latest-posts-grid.php' ),
					'categories'  => array( 'featured', 'docspresso-sections' ),
				)
			);

			// Register Large Video pattern
			register_block_pattern(
				'docspresso/large-video',
				array(
					'title'       => __( 'Large Video Feature', 'docspresso-theme' ),
					'description' => __( 'A center-aligned large video area for the homepage', 'docspresso-theme' ),
					'content'     => file_get_contents( get_template_directory() . '/patterns/large-video-section.php' ),
					'categories'  => array( 'media', 'docspresso-sections' ),
				)
			);

			// Register Spotlight pattern
			register_block_pattern(
				'docspresso/spotlight',
				array(
					'title'       => __( 'Spotlight / Research Paper', 'docspresso-theme' ),
					'description' => __( 'Two-column spotlight for a featured paper or story', 'docspresso-theme' ),
					'content'     => file_get_contents( get_template_directory() . '/patterns/spotlight-section.php' ),
					'categories'  => array( 'featured', 'docspresso-sections' ),
				)
			);

			// Register Two Column Feature pattern
			register_block_pattern(
				'docspresso/two-column-feature',
				array(
					'title'       => __( 'Two Column Feature', 'docspresso-theme' ),
					'description' => __( 'Image and text feature block', 'docspresso-theme' ),
					'content'     => file_get_contents( get_template_directory() . '/patterns/two-column-feature.php' ),
					'categories'  => array( 'layout', 'docspresso-sections' ),
				)
			);

			// Register Build Section pattern
			register_block_pattern(
				'docspresso/build-section',
				array(
					'title'         => __( 'Build Section with Services', 'docspresso-theme' ),
					'description'   => __( 'A build section showcasing AI services and tools', 'docspresso-theme' ),
					'content'       => file_get_contents( get_template_directory() . '/patterns/build-section.php' ),
					'categories'    => array( 'featured', 'services', 'docspresso-sections' ),
					'keywords'      => array( 'build', 'services', 'ai', 'tools' ),
				)
			);

			// Register Research Section pattern
			register_block_pattern(
				'docspresso/research-section',
				array(
					'title'         => __( 'Research Section with Articles', 'docspresso-theme' ),
					'description'   => __( 'A research section displaying latest articles and findings', 'docspresso-theme' ),
					'content'       => file_get_contents( get_template_directory() . '/patterns/research-section.php' ),
					'categories'    => array( 'featured', 'research', 'docspresso-sections' ),
					'keywords'      => array( 'research', 'articles', 'dark', 'grid' ),
				)
			);

			// Register Action Buttons pattern
			register_block_pattern(
				'docspresso/action-buttons',
				array(
					'title'         => __( 'Quick Action Buttons', 'docspresso-theme' ),
					'description'   => __( 'A set of action buttons for AI features', 'docspresso-theme' ),
					'content'       => file_get_contents( get_template_directory() . '/patterns/action-buttons.php' ),
					'categories'    => array( 'featured', 'buttons', 'docspresso-sections' ),
					'keywords'      => array( 'buttons', 'actions', 'ai', 'cta' ),
				)
			);
		}
	}
endif;

add_action( 'init', 'docspresso_register_block_patterns' );

/**
 * Set posts per page for archive pages
 */
function docspresso_modify_main_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// Set 12 posts per page for all archive pages
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_archive() ) {
			$query->set( 'posts_per_page', 12 );
		}
	}
}
add_action( 'pre_get_posts', 'docspresso_modify_main_query' );

/**
 * Enqueue scripts and styles.
 */
function docspresso_scripts() {
	// Enqueue Tailwind CSS
	wp_enqueue_style( 'tailwind-css', get_template_directory_uri() . '/assets/css/tailwind-output.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue theme's custom CSS (with overrides)
	wp_enqueue_style( 'docspresso-style', get_stylesheet_uri(), array('tailwind-css'), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue main JavaScript
	wp_enqueue_script( 'docspresso-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'docspresso_scripts' );

/**
 * Enqueue editor styles for the block editor.
 */
function docspresso_block_editor_assets() {
	wp_enqueue_style( 'docspresso-editor-css', get_template_directory_uri() . '/assets/css/tailwind-output.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'docspresso_block_editor_assets' );

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

/**
 * Enhance search functionality
 */

/**
 * Improve search to include custom fields and post excerpts
 */
function docspresso_extend_search( $search_query ) {
	if ( ! is_admin() && $search_query->is_main_query() && $search_query->is_search() ) {
		// Add post_excerpt to search
		$search_query->set( 'meta_query', array(
			'relation' => 'OR',
		));
	}
}
add_action( 'pre_get_posts', 'docspresso_extend_search' );

/**
 * Highlight search terms in search results
 */
function docspresso_highlight_search_terms( $content ) {
	if ( is_search() && ! is_admin() && in_the_loop() && is_main_query() ) {
		$search_terms = get_search_query();
		if ( ! empty( $search_terms ) ) {
			$content = preg_replace(
				'/(' . preg_quote( $search_terms, '/' ) . ')/i',
				'<mark class="search-highlight bg-yellow-200 px-1 rounded">$1</mark>',
				$content
			);
		}
	}
	return $content;
}
add_filter( 'the_content', 'docspresso_highlight_search_terms' );
add_filter( 'the_excerpt', 'docspresso_highlight_search_terms' );

/**
 * Add search form to wp_nav_menu for easy inclusion in navigation
 */
function docspresso_add_search_to_menu( $items, $args ) {
	// Only add to primary menu if not on front page
	if ( $args->theme_location === 'primary' && ! is_front_page() ) {
		$search_form = '<li class="menu-item menu-item-search hidden lg:block">';
		$search_form .= '<div class="inline-search-form relative">';
		$search_form .= get_search_form( false );
		$search_form .= '</div></li>';
		$items .= $search_form;
	}
	return $items;
}
// Uncomment the line below if you want search in the navigation menu
// add_filter( 'wp_nav_menu_items', 'docspresso_add_search_to_menu', 10, 2 );

/**
 * Custom search results per page
 */
function docspresso_search_results_per_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'posts_per_page', 12 ); // Show 12 results per page
	}
}
add_action( 'pre_get_posts', 'docspresso_search_results_per_page' );

/**
 * Add search shortcode for easy placement
 */
function docspresso_search_form_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'placeholder' => __( 'Search posts...', 'docspresso-theme' ),
		'class' => '',
	), $atts );
	
	ob_start();
	get_search_form();
	$form = ob_get_clean();
	
	// Modify placeholder if custom one is provided
	if ( $atts['placeholder'] !== __( 'Search posts...', 'docspresso-theme' ) ) {
		$form = str_replace( 
			'placeholder="' . esc_attr__( 'Search posts...', 'docspresso-theme' ) . '"',
			'placeholder="' . esc_attr( $atts['placeholder'] ) . '"',
			$form
		);
	}
	
	// Add custom class if provided
	if ( ! empty( $atts['class'] ) ) {
		$form = str_replace( 
			'class="search-form',
			'class="search-form ' . esc_attr( $atts['class'] ),
			$form
		);
	}
	
	return $form;
}
add_shortcode( 'search_form', 'docspresso_search_form_shortcode' );

/**
 * Filter search form for different contexts
 */
function docspresso_modify_search_form_for_context( $form ) {
	// Add hidden fields to maintain context on archive pages
	if ( is_category() ) {
		$category = get_queried_object();
		$form = str_replace( 
			'</form>',
			'<input type="hidden" name="cat" value="' . esc_attr( $category->term_id ) . '"></form>',
			$form
		);
	} elseif ( is_tag() ) {
		$tag = get_queried_object();
		$form = str_replace( 
			'</form>',
			'<input type="hidden" name="tag" value="' . esc_attr( $tag->slug ) . '"></form>',
			$form
		);
	} elseif ( is_author() ) {
		$author = get_queried_object();
		$form = str_replace( 
			'</form>',
			'<input type="hidden" name="author" value="' . esc_attr( $author->ID ) . '"></form>',
			$form
		);
	}
	
	return $form;
}
add_filter( 'get_search_form', 'docspresso_modify_search_form_for_context' );