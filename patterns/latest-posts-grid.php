<?php
/**
 * Title: Read the latest - Posts Grid
 * Slug: docspresso-theme/latest-posts-grid
 * Categories: query
 * Description: Grid of latest posts with featured image and excerpt to match homepage layout
 */
?>

<section class="latest-posts-grid max-w-7xl mx-auto px-6 py-12">
    <header class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Read the latest</h2>
        <div class="flex gap-3">
            <a href="#" class="text-sm text-gray-600 border rounded px-3 py-1">See more publications</a>
            <a href="#" class="text-sm text-gray-600 border rounded px-3 py-1">See more blog posts</a>
        </div>
    </header>

    <div class="posts-grid grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Placeholder cards - in real usage replace with loop -->
        <?php for ( $i = 0; $i < 6; $i++ ) : ?>
        <article class="archive-post-card">
            <div class="post-thumbnail-placeholder"></div>
            <div class="post-content">
                <div class="post-meta text-xs text-gray-500">October 20 · Blog</div>
                <h3 class="post-title"><a href="#">Sample post title that demonstrates the layout</a></h3>
                <p class="post-excerpt">A short excerpt about the post goes here to show preview of the content and layout.</p>
            </div>
        </article>
        <?php endfor; ?>
    </div>
</section>
