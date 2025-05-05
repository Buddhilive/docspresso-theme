<?php
/**
 * The template for displaying the front page.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();

// Check if the page is using a static front page
if ( is_front_page() && ! is_home() ) {
    // Static front page
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'front-page' );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
} else {
    // Blog posts index
    get_template_part( 'index' );
}

get_footer();