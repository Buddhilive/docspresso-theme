<?php
/**
 * The template for displaying all pages.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Main content container -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <?php
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
        ?>
    </div>

    <!-- Latest Posts Section -->
    <?php 
    get_template_part('template-parts/latest-posts-grid', null, array(
        'posts_per_page' => 6,
        'exclude_current' => false,
        'title' => 'Latest Posts',
        'description' => 'Discover our latest insights and research in technology, development, and innovation.'
    )); 
    ?>
</main><!-- #main -->

<?php
get_footer();