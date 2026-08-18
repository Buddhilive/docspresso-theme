<?php
/**
 * Title: Page Hero (Featured Image)
 * Slug: docspresso/hero-page
 * Categories: docspresso
 * Description: A full-width hero using the page's featured image as a background, with the page title and excerpt overlaid. Falls back to a solid primary background when no featured image is set.
 */
?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":60,"overlayColor":"primary-900","minHeight":420,"minHeightUnit":"px","contentPosition":"center center","className":"docspresso-page-hero","style":{"color":{"duotone":[]}}} -->
<div class="wp-block-cover docspresso-page-hero" style="min-height:420px">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-900-background-color has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"className":"mx-auto flex w-full max-w-content flex-col items-center gap-4 px-4 py-20 text-center sm:px-6 lg:px-8","layout":{"type":"constrained","contentSize":"42rem"}} -->
		<div class="wp-block-group mx-auto flex w-full max-w-content flex-col items-center gap-4 px-4 py-20 text-center sm:px-6 lg:px-8">
			<!-- wp:post-title {"level":1,"className":"text-4xl font-bold text-white sm:text-5xl"} /-->
			<!-- wp:post-excerpt {"className":"max-w-xl text-lg text-white/85"} /-->
		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
