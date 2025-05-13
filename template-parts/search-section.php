<?php
/**
 * Template part for displaying search section
 *
 * @package DocsPresso_Tech_Blog
 */

// Only show search on blog-related pages
if ( is_home() || is_archive() || is_search() || ( is_front_page() && is_home() ) ) :
?>

<div class="search-section mb-12">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-900 mb-4 text-center">
            <?php
            if ( is_search() ) {
                esc_html_e( 'Refine Your Search', 'docspresso-theme' );
            } elseif ( is_category() ) {
                /* translators: %s: Category name */
                printf( esc_html__( 'Search in %s', 'docspresso-theme' ), single_cat_title( '', false ) );
            } elseif ( is_tag() ) {
                /* translators: %s: Tag name */
                printf( esc_html__( 'Search in %s', 'docspresso-theme' ), single_tag_title( '', false ) );
            } elseif ( is_author() ) {
                /* translators: %s: Author name */
                printf( esc_html__( 'Search %s\'s Posts', 'docspresso-theme' ), get_the_author() );
            } elseif ( is_date() ) {
                esc_html_e( 'Search Archive', 'docspresso-theme' );
            } else {
                esc_html_e( 'Search Posts', 'docspresso-theme' );
            }
            ?>
        </h2>
        <?php get_search_form(); ?>
        
        <?php if ( is_category() || is_tag() || is_author() ) : ?>
            <div class="search-context mt-3 text-center">
                <p class="text-sm text-gray-600">
                    <?php
                    if ( is_category() ) {
                        esc_html_e( 'Search will be filtered to this category', 'docspresso-theme' );
                    } elseif ( is_tag() ) {
                        esc_html_e( 'Search will be filtered to this tag', 'docspresso-theme' );
                    } elseif ( is_author() ) {
                        esc_html_e( 'Search will be filtered to this author\'s posts', 'docspresso-theme' );
                    }
                    ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>