<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package DocsPresso_Tech_Blog
 */

get_header();
?>

	<main id="primary" class="site-main flex-grow">

		<section class="error-404 not-found max-w-3xl mx-auto py-12">
			<header class="page-header mb-8 text-center">
				<h1 class="page-title text-4xl font-bold text-gray-900 mb-4"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'docspresso-theme' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p class="text-lg mb-8 text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'docspresso-theme' ); ?></p>

				<div class="search-form-container max-w-lg mx-auto mb-12">
					<?php
					get_search_form();
					?>
				</div>

				<div class="recent-posts mb-8">
					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 5 ) ); ?>
				</div>

				<div class="widget widget_categories mb-8 p-6 bg-gray-50 rounded-lg">
					<h2 class="widget-title text-xl font-semibold mb-4"><?php esc_html_e( 'Most Used Categories', 'docspresso-theme' ); ?></h2>
					<ul class="list-disc pl-5 space-y-2">
						<?php
						wp_list_categories(
							array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							)
						);
						?>
					</ul>
				</div><!-- .widget -->

				<?php
				/* translators: %1$s: smiley */
				$docspresso_archive_content = '<p class="mt-4 text-gray-600">' . sprintf( esc_html__( 'Try looking in the monthly archives: %1$s', 'docspresso-theme' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2><div class='p-4 bg-gray-50 rounded-lg'>$docspresso_archive_content</div>" );

				the_widget( 'WP_Widget_Tag_Cloud', array( 'taxonomy' => 'post_tag' ), array( 'widget_id' => 'tag_cloud_404' ) );
				?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();