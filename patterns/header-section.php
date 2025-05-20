<?php
/**
 * Title: Header Section
 * Slug: docspresso-theme/header-section
 * Categories: header
 * Description: Site header with navigation and branding for front page
 */
?>

<header id="masthead" class="relative bg-transparent">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Hero area -->
        <div class="hero bg-black text-white rounded-lg overflow-hidden mb-12 mt-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <div class="md:col-span-7 px-6 py-16">
                    <h1 class="text-5xl font-extrabold leading-tight mb-4">Research to reality</h1>
                    <p class="text-lg text-gray-200 max-w-xl mb-6">Our mission is to drive breakthroughs that benefit society, businesses, and Google products. Through our research and foundational work in machine learning and generative AI, we deliver broad applications and transformative impact across many domains such as science, healthcare, climate, education, and more.</p>
                    <div class="flex gap-4">
                        <a class="px-5 py-3 bg-white text-black rounded-md text-sm font-semibold" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">See more publications</a>
                        <a class="px-5 py-3 border border-white text-white rounded-md text-sm" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">See more blog posts</a>
                    </div>
                </div>
                <div class="md:col-span-5 bg-gray-800 aspect-video flex items-center justify-center">
                    <!-- Placeholder for hero collage/image -->
                    <div class="w-11/12 h-3/4 bg-gray-900 rounded-lg border border-gray-700 flex items-center justify-center text-gray-400">Hero image</div>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->