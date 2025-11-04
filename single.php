<?php
/**
 * The template for displaying all single posts.
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

                get_template_part( 'template-parts/content', 'single' );

                // Previous/next post navigation.
                ?>
                <nav class="posts-navigation py-12 border-t border-b border-gray-200 my-12">
                    <div class="nav-links grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="nav-previous">
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post) :
                            ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="group block p-6 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <span class="text-sm text-gray-500 block mb-2"><?php esc_html_e( 'Previous Article', 'docspresso-theme' ); ?></span>
                                    <span class="text-lg font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2"><?php echo get_the_title($prev_post); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="nav-next">
                            <?php
                            $next_post = get_next_post();
                            if ($next_post) :
                            ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="group block p-6 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors text-right">
                                    <span class="text-sm text-gray-500 block mb-2"><?php esc_html_e( 'Next Article', 'docspresso-theme' ); ?></span>
                                    <span class="text-lg font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2"><?php echo get_the_title($next_post); ?></span>
                                </a>
                            <?php endif; ?>
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
    </div>

    <!-- Related Posts Section -->
    <?php 
    get_template_part('template-parts/latest-posts-grid', null, array(
        'posts_per_page' => 6,
        'exclude_current' => true,
        'show_related' => true,
        'title' => 'Related Articles',
        'description' => 'Continue exploring our latest insights and research.'
    )); 
    ?>
</main><!-- #main -->

<?php
get_footer();