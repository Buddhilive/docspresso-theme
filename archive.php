<?php
/**
 * The template for displaying archive pages.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();

if ( have_posts() ) :

    the_archive_title( '<h1 class="page-title">', '</h1>' );
    the_archive_description( '<div class="archive-description">', '</div>' );

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();

        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', get_post_type() );

    endwhile;

    // Previous/next post navigation.
    the_posts_navigation();

else :

    // If no content, include the "No posts found" template.
    get_template_part( 'template-parts/content', 'none' );

endif;

get_footer();