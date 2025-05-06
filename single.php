<?php
/**
 * The template for displaying all single posts.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<main id="primary" class="site-main flex-grow max-w-3xl mx-auto px-4 py-8">
    <?php
    if ( have_posts() ) :

        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'single' );

            // Previous/next post navigation.
            ?>
            <nav class="posts-navigation py-8 border-t border-b border-gray-200 my-8">
                <div class="nav-links flex flex-col md:flex-row justify-between gap-4">
                    <div class="nav-previous">
                        <?php
                        previous_post_link(
                            '%link',
                            '<span class="text-sm text-gray-600 block mb-1">' . esc_html__( 'Previous Post', 'docspresso-theme' ) . '</span><span class="text-blue-600 hover:text-blue-800 font-medium">%title</span>'
                        );
                        ?>
                    </div>
                    <div class="nav-next">
                        <?php
                        next_post_link(
                            '%link',
                            '<span class="text-sm text-gray-600 block mb-1 text-right">' . esc_html__( 'Next Post', 'docspresso-theme' ) . '</span><span class="text-blue-600 hover:text-blue-800 font-medium text-right">%title</span>'
                        );
                        ?>
                    </div>
                </div>
            </nav>
            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
</main><!-- #main -->

<?php
get_footer();