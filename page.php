<?php
/**
 * The template for displaying all pages.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();

if ( have_posts() ) :

    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.

else :

    get_template_part( 'template-parts/content', 'none' );

endif;

get_footer();