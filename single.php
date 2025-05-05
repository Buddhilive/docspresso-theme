<?php
/**
 * The template for displaying all single posts.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();

if ( have_posts() ) :

    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'single' );

        // Previous/next post navigation.
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'docspresso-theme' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'docspresso-theme' ) . '</span> <span class="nav-title">%title</span>',
            )
        );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.

else :

    get_template_part( 'template-parts/content', 'none' );

endif;

get_footer();