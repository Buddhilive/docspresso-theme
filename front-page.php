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

<!-- Content that appears over the gradient -->
<main id="primary" class="site-main relative z-10">
    <section class="hero-section min-h-screen flex flex-col justify-center items-center text-center px-4 pt-32 pb-20">
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

    <!-- Rest of the content section -->
    <section id="content" class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <h3 class="text-xl font-bold mb-4 text-purple-700">Latest Tech</h3>
                    <p class="text-gray-700">Stay updated with the latest technology trends and innovations in the web development world.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <h3 class="text-xl font-bold mb-4 text-purple-700">Tutorials</h3>
                    <p class="text-gray-700">Comprehensive tutorials covering everything from beginner to advanced web development topics.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <h3 class="text-xl font-bold mb-4 text-purple-700">Resources</h3>
                    <p class="text-gray-700">Curated resources to help you build better websites and applications.</p>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-md mb-16">
                <h2 class="text-3xl font-bold mb-6 text-center text-gray-900">About DocsPresso</h2>
                <p class="text-gray-700 mb-4 text-lg">
                    DocsPresso is your go-to resource for all things tech. We're passionate about sharing knowledge,
                    tips, and tricks that help developers and tech enthusiasts stay ahead of the curve.
                </p>
                <p class="text-gray-700 text-lg">
                    Our mission is to simplify complex technical concepts and provide practical, actionable advice
                    that you can apply in your projects right away.
                </p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();