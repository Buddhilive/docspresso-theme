<?php
/**
 * Title: Page Hero (Featured Image)
 * Slug: docspresso/hero-page
 * Categories: docspresso
 * Description: A page title card that uses the featured image if present with opacity overlay, or a solid background with rounded corners matching the theme.
 */
?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"neutral-950","minHeight":220,"minHeightUnit":"px","contentPosition":"center center","className":"docspresso-page-hero rounded-2xl overflow-hidden border border-neutral-200 dark:border-neutral-800"} -->
<div class="wp-block-cover docspresso-page-hero rounded-2xl overflow-hidden border border-neutral-200 dark:border-neutral-800" style="min-height:220px">
	<span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-50 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"className":"mx-auto flex w-full max-w-content flex-col items-center gap-4 px-4 py-12 text-center sm:px-6 sm:py-16 lg:px-8","layout":{"type":"constrained","contentSize":"48rem"}} -->
		<div class="wp-block-group mx-auto flex w-full max-w-content flex-col items-center gap-4 px-4 py-12 text-center sm:px-6 sm:py-16 lg:px-8">
			<!-- wp:post-title {"level":1,"className":"text-3xl font-bold leading-tight tracking-tight sm:text-5xl"} /-->
		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
