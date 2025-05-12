<?php
/**
 * The template for displaying archive pages.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<div class="archive-page min-h-screen bg-white">
    <div class="site">
        <?php if ( have_posts() ) : ?>
            
            <!-- Archive Header -->
            <header class="archive-header py-12 text-center border-b border-gray-100 mb-12">
                <?php
                the_archive_title( '<h1 class="archive-title text-4xl font-bold text-gray-900 mb-4">', '</h1>' );
                the_archive_description( '<div class="archive-description text-lg text-gray-600 max-w-3xl mx-auto">', '</div>' );
                ?>
            </header>

            <!-- Posts Grid -->
            <div class="posts-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    
                    /*
                     * Include the Post-Type-specific template for the archive content.
                     */
                    get_template_part( 'template-parts/content', 'archive' );

                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div class="archive-pagination mb-16">
                <?php
                // Custom pagination
                $big = 999999999; // need an unlikely integer
                
                $pagination_links = paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>',
                    'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                    'type' => 'array'
                ) );

                if ( $pagination_links ) : ?>
                    <nav class="pagination flex justify-center items-center space-x-2" aria-label="Posts pagination">
                        <?php foreach ( $pagination_links as $link ) : ?>
                            <div class="pagination-item">
                                <?php echo $link; ?>
                            </div>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <!-- No posts found -->
            <div class="no-posts-found text-center py-16">
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();