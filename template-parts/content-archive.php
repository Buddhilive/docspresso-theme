<?php
/**
 * Template part for displaying posts in archive/grid layout
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-card bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-100'); ?>>
    
    <!-- Post Thumbnail -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail aspect-video overflow-hidden">
            <a href="<?php the_permalink(); ?>" class="block h-full">
                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300' ) ); ?>
            </a>
        </div>
    <?php else : ?>
        <!-- Default thumbnail placeholder -->
        <div class="post-thumbnail-placeholder aspect-video bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-12 h-12 text-purple-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <span class="text-sm text-purple-400 font-medium">DocsPresso</span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Post Content -->
    <div class="post-content p-6">
        
        <!-- Post Meta -->
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="post-meta flex items-center text-xs text-gray-500 mb-3 space-x-4">
                <time class="post-date flex items-center" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
                
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) :
                    $primary_category = $categories[0];
                ?>
                    <span class="post-category flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <a href="<?php echo esc_url( get_category_link( $primary_category->term_id ) ); ?>" class="hover:text-purple-600 transition-colors">
                            <?php echo esc_html( $primary_category->name ); ?>
                        </a>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Post Title -->
        <header class="post-header mb-3">
            <h2 class="post-title text-lg font-bold leading-tight m-0">
                <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-purple-600 no-underline transition-colors line-clamp-2">
                    <?php the_title(); ?>
                </a>
            </h2>
        </header>

        <!-- Post Excerpt -->
        <div class="post-excerpt mb-4">
            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 m-0">
                <?php
                $excerpt = get_the_excerpt();
                if ( $excerpt ) {
                    echo esc_html( $excerpt );
                } else {
                    echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );
                }
                ?>
            </p>
        </div>

        <!-- Post Footer with Tags and Read More -->
        <footer class="post-footer flex items-center justify-between">
            
            <!-- Tags -->
            <?php
            $tags = get_the_tags();
            if ( $tags && count( $tags ) > 0 ) :
                $displayed_tags = array_slice( $tags, 0, 2 ); // Show only first 2 tags
            ?>
                <div class="post-tags flex items-center space-x-2">
                    <?php foreach ( $displayed_tags as $tag ) : ?>
                        <span class="tag bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">
                            <?php echo esc_html( $tag->name ); ?>
                        </span>
                    <?php endforeach; ?>
                    <?php if ( count( $tags ) > 2 ) : ?>
                        <span class="text-gray-400 text-xs">+<?php echo count( $tags ) - 2; ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Read More Link -->
            <a href="<?php the_permalink(); ?>" class="read-more-link inline-flex items-center text-purple-600 hover:text-purple-800 text-sm font-medium transition-colors group">
                Read More
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </footer>
    </div>
</article>