<?php
/**
 * The template for displaying search results pages.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<div class="search-page min-h-screen bg-white">
    <div class="site">
        <?php if ( have_posts() ) : ?>
            
            <!-- Search Results Header -->
            <header class="search-header py-12 text-center border-b border-gray-100 mb-12">
                <h1 class="search-title text-4xl font-bold text-gray-900 mb-4">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'docspresso-theme' ), '<span class="text-purple-600">"' . get_search_query() . '"</span>' );
                    ?>
                </h1>
                <p class="text-lg text-gray-600">
                    <?php
                    /* translators: %d: number of search results. */
                    printf( esc_html( _n( 'Found %d result', 'Found %d results', $wp_query->found_posts, 'docspresso-theme' ) ), number_format_i18n( $wp_query->found_posts ) );
                    ?>
                </p>
            </header>

            <!-- Search Form -->
            <?php get_template_part( 'template-parts/search', 'section' ); ?>

            <!-- Search Results Grid -->
            <div class="search-results-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    
                    /*
                     * Include the Post-Type-specific template for the search content.
                     */
                    get_template_part( 'template-parts/content', 'archive' );

                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div class="search-pagination mb-16">
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
                    <nav class="pagination flex justify-center items-center space-x-2" aria-label="Search results pagination">
                        <?php foreach ( $pagination_links as $link ) : ?>
                            <div class="pagination-item">
                                <?php echo $link; ?>
                            </div>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <!-- No search results found -->
            <div class="no-search-results text-center py-16">
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();