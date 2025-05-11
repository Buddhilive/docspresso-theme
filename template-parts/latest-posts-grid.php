<?php
/**
 * Template part for displaying latest posts grid
 *
 * @package DocsPresso_Tech_Blog
 */

$posts_per_page = isset($args['posts_per_page']) ? $args['posts_per_page'] : 6;
$exclude_current = isset($args['exclude_current']) ? $args['exclude_current'] : false;
$show_related = isset($args['show_related']) ? $args['show_related'] : false;
$title = isset($args['title']) ? $args['title'] : 'Latest Posts';
$description = isset($args['description']) ? $args['description'] : 'Discover our latest insights and research in technology, development, and innovation.';

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish'
);

// Exclude current post if requested
if ($exclude_current && is_singular('post')) {
    $query_args['post__not_in'] = array(get_the_ID());
}

// Show related posts by category if requested
if ($show_related && is_singular('post')) {
    $categories = get_the_category();
    if ($categories) {
        $category_ids = array();
        foreach($categories as $category) {
            $category_ids[] = $category->term_id;
        }
        $query_args['category__in'] = $category_ids;
        $query_args['orderby'] = 'rand';
    }
}

$latest_posts = new WP_Query($query_args);

// Fallback to latest posts if no related posts found
if (!$latest_posts->have_posts() && $show_related) {
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'post__not_in' => array(get_the_ID())
    );
    $latest_posts = new WP_Query($query_args);
}

if ($latest_posts->have_posts()) :
?>
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html($title); ?></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($description); ?></p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-video overflow-hidden">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <div class="text-sm text-purple-600 font-medium mb-2">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-purple-600 transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                            <span><?php echo get_the_author(); ?></span>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="inline-flex items-center px-6 py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors">
                View All Posts
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<?php
endif;
wp_reset_postdata();
?>