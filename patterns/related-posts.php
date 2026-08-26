<?php
/**
 * Title: Related Articles
 * Slug: docspresso/related-posts
 * Categories: docspresso
 * Block Types: core/query
 * Description: 3 related articles based on category for single post pages.
 */
?>
<!-- wp:group {"className":"docspresso-related-section w-full border-t border-neutral-200 dark:border-neutral-800 mt-16 pt-12","layout":{"type":"default"}} -->
<div class="wp-block-group docspresso-related-section w-full border-t border-neutral-200 dark:border-neutral-800 mt-16 pt-12">

	<!-- wp:heading {"level":2,"className":"mb-8 text-2xl font-bold tracking-tight text-neutral-950 dark:text-neutral-50 sm:text-3xl"} -->
	<h2 class="wp-block-heading mb-8 text-2xl font-bold tracking-tight text-neutral-950 dark:text-neutral-50 sm:text-3xl"><?php esc_html_e( 'Related Articles', 'docspresso' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":10,"namespace":"docspresso/related-posts","query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"docspressoRelated":true},"className":"docspresso-related-posts docspresso-blog-grid"} -->
	<div class="wp-block-query docspresso-related-posts docspresso-blog-grid">

		<!-- wp:post-template {"className":"grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3","layout":{"type":"grid","columnCount":3},"style":{"spacing":{"blockGap":"0px"}}} -->

			<!-- wp:group {"className":"docspresso-card group flex h-full flex-col overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 transition-shadow hover:shadow-lg","layout":{"type":"constrained"}} -->
			<div class="wp-block-group docspresso-card group flex h-full flex-col overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 transition-shadow hover:shadow-lg">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"m-0"} /-->

				<!-- wp:group {"className":"flex flex-1 flex-col gap-3 p-6","layout":{"type":"constrained"}} -->
				<div class="wp-block-group flex flex-1 flex-col gap-3 p-6">
					<!-- wp:post-terms {"term":"category","className":"text-xs font-semibold uppercase tracking-wide text-primary-700 dark:text-primary-400"} /-->
					<!-- wp:post-title {"level":3,"isLink":true,"className":"text-lg font-semibold leading-snug text-neutral-950 dark:text-neutral-50 no-underline group-hover:text-primary-700 dark:group-hover:text-primary-400"} /-->
					<!-- wp:post-excerpt {"excerptLength":16,"className":"text-sm text-neutral-600 dark:text-neutral-400"} /-->
					<!-- wp:post-date {"className":"mt-auto text-xs text-neutral-500 dark:text-neutral-500"} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"className":"text-sm text-neutral-500 dark:text-neutral-400"} -->
			<p class="text-sm text-neutral-500 dark:text-neutral-400"><?php esc_html_e( 'No related articles found.', 'docspresso' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
