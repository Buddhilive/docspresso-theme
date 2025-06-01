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

		// Register navigation menus
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'docspresso-theme' ),
				'footer'  => esc_html__( 'Footer Menu', 'docspresso-theme' ),
			)
		);

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

/**
 * Custom Walker for Navigation Menu
 */
class DocsPresso_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	/**
	 * Start the list before the elements are added.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"absolute top-full left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50 hidden group-hover:block\">\n";
	}

	/**
	 * End the list after the elements are added.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	/**
	 * Start the element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		// Different classes for different levels
		if ( $depth === 0 ) {
			$li_class = 'relative group';
			$a_class = 'text-gray-700 hover:text-purple-600 transition-colors duration-200 flex items-center gap-1';
			if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-page-ancestor', $classes ) ) {
				$a_class = 'text-purple-600 flex items-center gap-1';
			}
		} else {
			$li_class = '';
			$a_class = 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-purple-600 transition-colors duration-200';
		}

		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' ' . $li_class . '"' : ' class="' . $li_class . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a class="' . $a_class . '"' . $attributes . '>';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		
		// Add dropdown arrow for parent items
		if ( $depth === 0 && in_array( 'menu-item-has-children', $classes ) ) {
			$item_output .= '<svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
			</svg>';
		}
		
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * End the element output.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}

/**
 * Custom Walker for Mobile Navigation Menu
 */
class DocsPresso_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	/**
	 * Start the list before the elements are added.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"ml-4 mt-2 space-y-2 border-l border-gray-200 pl-4\">\n";
	}

	/**
	 * End the list after the elements are added.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	/**
	 * Start the element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		// Mobile menu styling
		$li_class = '';
		$a_class = 'block py-2 text-base font-medium text-gray-700 hover:text-purple-600 transition-colors duration-200';
		if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-page-ancestor', $classes ) ) {
			$a_class = 'block py-2 text-base font-medium text-purple-600';
		}

		if ( $depth > 0 ) {
			$a_class = 'block py-1 text-sm text-gray-600 hover:text-purple-600 transition-colors duration-200';
		}

		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' ' . $li_class . '"' : ' class="' . $li_class . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a class="' . $a_class . '"' . $attributes . '>';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * End the element output.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}

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
	// Enqueue Material Icons
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null );
	
	// Enqueue FontAwesome for social icons
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0' );
	
	// Enqueue Tailwind CSS
	wp_enqueue_style( 'tailwind-css', get_template_directory_uri() . '/assets/css/tailwind-output.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue patterns support CSS
	wp_enqueue_style( 'patterns-support-css', get_template_directory_uri() . '/assets/css/patterns-support.css', array('tailwind-css'), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue background styles CSS
	wp_enqueue_style( 'background-styles-css', get_template_directory_uri() . '/assets/css/background-styles.css', array('tailwind-css'), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue utility overrides CSS (highest priority)
	wp_enqueue_style( 'utility-overrides-css', get_template_directory_uri() . '/assets/css/utility-overrides.css', array('tailwind-css', 'patterns-support-css'), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue theme's custom CSS (with overrides)
	wp_enqueue_style( 'docspresso-style', get_stylesheet_uri(), array('tailwind-css', 'patterns-support-css', 'background-styles-css', 'utility-overrides-css'), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue main JavaScript
	wp_enqueue_script( 'docspresso-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
	
	// Localize script for AJAX and other dynamic content
	wp_localize_script( 'docspresso-script', 'docspresso_vars', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'search_nonce' => wp_create_nonce( 'docspresso_search_nonce' ),
		'strings' => array(
			'search_placeholder' => __( 'Search for articles, tutorials, and more...', 'docspresso-theme' ),
			'search_label' => __( 'Search', 'docspresso-theme' ),
			'close_search' => __( 'Close search', 'docspresso-theme' ),
			'open_menu' => __( 'Open menu', 'docspresso-theme' ),
			'close_menu' => __( 'Close menu', 'docspresso-theme' ),
		)
	));
}
add_action( 'wp_enqueue_scripts', 'docspresso_scripts' );

/**
 * Enqueue editor styles for the block editor.
 */
function docspresso_block_editor_assets() {
	// Enqueue Tailwind CSS for the block editor
	wp_enqueue_style( 'docspresso-editor-tailwind', get_template_directory_uri() . '/assets/css/tailwind-output.css', array(), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue background styles CSS for the block editor (before patterns support)
	wp_enqueue_style( 'docspresso-editor-backgrounds', get_template_directory_uri() . '/assets/css/background-styles.css', array( 'docspresso-editor-tailwind' ), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue patterns support CSS for the block editor
	wp_enqueue_style( 'docspresso-editor-patterns', get_template_directory_uri() . '/assets/css/patterns-support.css', array( 'docspresso-editor-tailwind', 'docspresso-editor-backgrounds' ), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue utility overrides CSS for the block editor
	wp_enqueue_style( 'docspresso-editor-utilities', get_template_directory_uri() . '/assets/css/utility-overrides.css', array( 'docspresso-editor-tailwind', 'docspresso-editor-backgrounds', 'docspresso-editor-patterns' ), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue editor-specific styles
	wp_enqueue_style( 'docspresso-editor-styles', get_template_directory_uri() . '/assets/css/editor-style.css', array( 'docspresso-editor-tailwind', 'docspresso-editor-patterns', 'docspresso-editor-backgrounds', 'docspresso-editor-utilities' ), wp_get_theme()->get( 'Version' ) );
	
	// Enqueue force editor styles (highest priority)
	wp_enqueue_style( 'docspresso-editor-force', get_template_directory_uri() . '/assets/css/editor-force.css', array( 'docspresso-editor-tailwind', 'docspresso-editor-patterns', 'docspresso-editor-backgrounds', 'docspresso-editor-utilities', 'docspresso-editor-styles' ), wp_get_theme()->get( 'Version' ) );
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

	// Note: edit_post_link removed from here as it's handled in the template
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

/**
 * Custom comment callback for modern comment styling
 */
function docspresso_comment_callback( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment-item', $comment ); ?>>
		<article class="bg-white rounded-lg border border-gray-200 hover:border-gray-300 hover:shadow-md transition-all duration-200 p-6">
			<header class="comment-header flex items-start gap-4 mb-4">
				<!-- Avatar -->
				<div class="flex-shrink-0">
					<?php
					$avatar_size = 48;
					echo get_avatar( $comment, $avatar_size, '', '', array(
						'class' => 'rounded-full w-12 h-12 object-cover',
						'extra_attr' => 'loading="lazy"',
					) );
					?>
				</div>

				<!-- Metadata -->
				<div class="flex-1 min-w-0">
					<div class="flex items-center justify-between gap-4 flex-wrap">
						<div>
							<div class="comment-author vcard">
								<?php
								if ( $comment->user_id === 0 && $comment->comment_author ) {
									echo '<span class="fn font-semibold text-gray-900">' . esc_html( $comment->comment_author ) . '</span>';
								} else {
									echo '<span class="fn font-semibold text-gray-900"><a href="' . esc_url( get_comment_author_url( $comment ) ) . '" rel="external nofollow" class="text-purple-600 hover:text-purple-700 transition-colors">' . esc_html( get_comment_author( $comment ) ) . '</a></span>';
								}
								?>
							</div>
							<div class="text-sm text-gray-500 mt-1">
								<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>" class="comment-link hover:text-purple-600 transition-colors">
									<?php
									/* translators: 1: comment date, 2: comment time */
									printf(
										esc_html__( '%1$s at %2$s', 'docspresso-theme' ),
										get_comment_date( 'F j, Y', $comment ),
										get_comment_time( 'g:i a', '', '', true )
									);
									?>
								</a>
							</div>
						</div>

						<?php
						// Edit link for comment author or admin
						if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) :
							?>
							<div class="flex-shrink-0">
								<a href="<?php echo esc_url( get_edit_comment_link( $comment->comment_ID ) ); ?>" class="inline-flex items-center text-xs font-medium text-gray-500 hover:text-purple-600 transition-colors">
									<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
										<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
									</svg>
									<?php esc_html_e( 'Edit', 'docspresso-theme' ); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</header><!-- .comment-header -->

			<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded text-sm text-yellow-800 flex items-center gap-2">
					<svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
					</svg>
					<?php esc_html_e( 'Your comment is awaiting moderation.', 'docspresso-theme' ); ?>
				</p>
			<?php endif; ?>

			<!-- Comment content -->
			<div class="comment-content prose prose-sm prose-purple max-w-none text-gray-700">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<!-- Comment footer actions -->
			<footer class="comment-footer mt-4 flex items-center justify-between text-sm">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'before'     => '<div class="comment-reply-link">',
							'after'      => '</div>',
							'reply_text' => '<span class="inline-flex items-center text-purple-600 hover:text-purple-700 transition-colors font-medium"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path><path d="M6 11h8v2H6v-2z"></path></svg>' . esc_html__( 'Reply', 'docspresso-theme' ) . '</span>',
						)
					),
					$comment,
					$args
				);
				?>
			</footer><!-- .comment-footer -->
		</article><!-- .comment-article -->
	</<?php echo esc_attr( $tag ); ?>>
	<?php
}
