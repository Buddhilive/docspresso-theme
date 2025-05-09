<?php
/**
 * The template for displaying the front page.
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

<!-- Animated gradient background -->
<div class="animated-gradient"></div>
<div class="gradient-transition"></div>

<main id="primary" class="site-main relative z-10">
    <!-- Hero Section -->
    <section class="hero-section min-h-screen flex flex-col justify-center items-center text-center px-4 pt-32 pb-20 relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">
            Welcome to DocsPresso
        </h1>
        <p class="text-xl md:text-2xl text-white mb-8 max-w-2xl drop-shadow-md">
            A modern tech blog featuring the latest in web development, design, and technology trends
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" 
               class="px-8 py-4 bg-white text-purple-700 font-semibold rounded-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                Explore Articles
            </a>
            <a href="#content" 
               class="px-8 py-4 bg-purple-600 text-white font-semibold rounded-lg shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">
                Learn More
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="content" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"> cutting-edge technology insights</h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto">Explore the latest in web development, AI, and emerging technologies</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Web Development</h3>
                    <p class="text-gray-700">Latest frameworks, tools, and best practices for modern web development.</p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">AI & Machine Learning</h3>
                    <p class="text-gray-700">Explore the latest advancements in artificial intelligence and machine learning.</p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Emerging Tech</h3>
                    <p class="text-gray-700">Stay ahead with insights on blockchain, quantum computing, and more.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Highlights Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Articles</h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto">Hand-picked content from our latest research and insights</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $recent_posts = get_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                foreach($recent_posts as $post) : setup_postdata($post);
                ?>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php the_title(); ?></h3>
                            <p class="text-gray-700 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-purple-600 font-medium hover:text-purple-800 inline-flex items-center">
                                Read more
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php 
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-purple-600 to-purple-800 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Stay Updated with the Latest Tech Trends</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Subscribe to our newsletter for the latest articles, tutorials, and insights delivered to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <input type="email" placeholder="Your email address" class="px-6 py-4 rounded-lg text-gray-900 flex-grow max-w-md">
                <button class="px-8 py-4 bg-white text-purple-700 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-300">
                    Subscribe
                </button>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();