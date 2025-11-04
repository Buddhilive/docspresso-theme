<?php
/**
 * Title: Read the latest - Posts Grid
 * Slug: docspresso-theme/latest-posts-grid
 * Categories: query
 * Description: Grid of latest posts with featured image and excerpt to match homepage layout
 */

// Query for latest posts
$latest_posts = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'meta_key'       => '',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'no_found_rows'  => true, // Performance optimization
) );
?>

<section class="latest-posts-grid max-w-7xl mx-auto px-6 py-12">
    <header class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Read the latest</h2>
        <div class="flex gap-3">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" class="text-sm font-medium text-gray-700 border border-gray-300 rounded-lg px-4 py-2 hover:border-purple-600 hover:text-purple-600 hover:bg-purple-50 transition-all duration-200">See more blog posts</a>
        </div>
    </header>

    <div class="posts-grid grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php if ( $latest_posts->have_posts() ) : ?>
            <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                <article class="archive-post-card group bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail overflow-hidden bg-gray-100 h-56">
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1" class="block w-full h-full">
                                <?php the_post_thumbnail( 'medium_large', array(
                                    'alt' => the_title_attribute( array( 'echo' => false ) ),
                                    'class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-300'
                                ) ); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="post-thumbnail-placeholder bg-gradient-to-br from-purple-100 via-blue-100 to-purple-100 flex items-center justify-center h-56 w-full">
                            <svg class="w-16 h-16 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content p-5 flex flex-col h-full">
                        <div class="post-meta text-xs text-gray-500 flex items-center space-x-2 mb-3 flex-wrap gap-1">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" class="font-medium">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                            <span class="text-gray-300">·</span>
                            <span class="text-gray-600 font-medium"><?php esc_html_e( 'Blog', 'docspresso-theme' ); ?></span>
                            <?php if ( get_the_category() ) : ?>
                                <span class="text-gray-300">·</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800"><?php echo esc_html( get_the_category()[0]->name ); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="post-title mb-3 flex-grow">
                            <a href="<?php the_permalink(); ?>" class="text-lg font-semibold text-gray-900 hover:text-purple-600 no-underline transition-colors duration-200 line-clamp-2">
                                <?php 
                                $title = get_the_title();
                                echo esc_html( $title ?: __( 'Untitled', 'docspresso-theme' ) );
                                ?>
                            </a>
                        </h3>
                        
                        <div class="post-excerpt">
                            <?php if ( has_excerpt() ) : ?>
                                <p class="text-gray-600 text-sm leading-relaxed m-0 line-clamp-3">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </p>
                            <?php else : ?>
                                <p class="text-gray-600 text-sm leading-relaxed m-0 line-clamp-3">
                                    <?php 
                                    $content = get_the_content();
                                    $content = wp_strip_all_tags( $content );
                                    $content = wp_trim_words( $content, 20, '...' );
                                    echo esc_html( $content ?: __( 'No preview available.', 'docspresso-theme' ) );
                                    ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <!-- Fallback when no posts are found -->
            <div class="col-span-full text-center py-16 px-6">
                <div class="text-gray-400 mb-4">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2"><?php esc_html_e( 'No posts found', 'docspresso-theme' ); ?></h3>
                <p class="text-gray-500 mb-6"><?php esc_html_e( 'There are no published posts to display at the moment.', 'docspresso-theme' ); ?></p>
                <?php if ( current_user_can( 'publish_posts' ) ) : ?>
                    <div>
                        <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="inline-flex items-center px-6 py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <?php esc_html_e( 'Create your first post', 'docspresso-theme' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
