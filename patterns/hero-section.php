<?php
/**
 * Title: Hero Section with Animated Gradient
 * Slug: docspresso/hero-section
 * Categories: featured, header
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"8rem","bottom":"5rem","left":"1rem","right":"1rem"}},"color":{"background":"#667eea"}},"backgroundColor":"purple","className":"hero-section min-h-screen flex flex-col justify-center items-center text-center relative z-10 animated-gradient","layout":{"type":"constrained","contentSize":"64rem"}} -->
<div class="wp-block-group hero-section min-h-screen flex flex-col justify-center items-center text-center relative z-10 animated-gradient has-purple-background-color has-background" style="background-color:#667eea;padding-top:8rem;padding-right:1rem;padding-bottom:5rem;padding-left:1rem">
    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3.5rem","fontWeight":"700"},"color":{"text":"#ffffff"}},"className":"drop-shadow-lg mb-6"} -->
    <h1 class="wp-block-heading has-text-align-center drop-shadow-lg mb-6 has-text-color" style="color:#ffffff;font-size:3.5rem;font-weight:700">Get started</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"},"color":{"text":"#ffffff"}},"className":"drop-shadow-md mb-8 max-w-2xl"} -->
    <p class="has-text-align-center drop-shadow-md mb-8 max-w-2xl has-text-color" style="color:#ffffff;font-size:1.25rem">Explore cutting-edge technology insights, AI innovations, and the latest in web development</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"className":"flex flex-col sm:flex-row gap-4 justify-center","layout":{"type":"flex","orientation":"horizontal","justifyContent":"center"}} -->
    <div class="wp-block-group flex flex-col sm:flex-row gap-4 justify-center">
        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"white","textColor":"purple","style":{"border":{"radius":"0.5rem"},"typography":{"fontWeight":"600"}},"className":"px-8 py-4 shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"} -->
            <div class="wp-block-button px-8 py-4 shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"><a class="wp-block-button__link has-purple-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:0.5rem;font-weight:600">Explore Articles</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"backgroundColor":"purple","style":{"border":{"radius":"0.5rem"},"typography":{"fontWeight":"600"}},"className":"px-8 py-4 shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105"} -->
            <div class="wp-block-button px-8 py-4 shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105"><a class="wp-block-button__link has-purple-background-color has-background wp-element-button" style="border-radius:0.5rem;font-weight:600">Learn More</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->