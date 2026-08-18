<?php
/**
 * Title: Blog Card Grid
 * Slug: docspresso/blog-card-grid
 * Categories: docspresso
 * Block Types: core/query
 * Description: A responsive card-grid Query Loop used on the blog listing and archive/tag templates.
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"docspresso-blog-grid"} -->
<div class="wp-block-query docspresso-blog-grid">

	<!-- wp:post-template {"className":"grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3"} -->

		<!-- wp:group {"className":"docspresso-card group flex h-full flex-col overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 transition-shadow hover:shadow-lg","layout":{"type":"constrained"}} -->
		<div class="wp-block-group docspresso-card group flex h-full flex-col overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 transition-shadow hover:shadow-lg">

			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"m-0"} /-->

			<!-- wp:group {"className":"flex flex-1 flex-col gap-3 p-6","layout":{"type":"constrained"}} -->
			<div class="wp-block-group flex flex-1 flex-col gap-3 p-6">
				<!-- wp:post-terms {"term":"category","className":"text-xs font-semibold uppercase tracking-wide text-primary-700 dark:text-primary-400"} /-->
				<!-- wp:post-title {"level":3,"isLink":true,"className":"text-lg font-semibold leading-snug text-neutral-950 dark:text-neutral-50 no-underline group-hover:text-primary-700 dark:group-hover:text-primary-400"} /-->
				<!-- wp:post-excerpt {"excerptLength":20,"className":"text-sm text-neutral-600 dark:text-neutral-400"} /-->
				<!-- wp:post-date {"className":"mt-auto text-xs text-neutral-500 dark:text-neutral-500"} /-->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"className":"mt-12 flex items-center justify-center gap-4 text-sm"} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"className":"text-center text-neutral-600 dark:text-neutral-400"} -->
		<p class="text-center text-neutral-600 dark:text-neutral-400">No posts found.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->

</div>
<!-- /wp:query -->
