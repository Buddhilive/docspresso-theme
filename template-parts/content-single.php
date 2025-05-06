<?php
/**
 * Template part for displaying single posts
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
	<header class="entry-header mb-6">
		<?php the_title( '<h1 class="entry-title text-3xl font-bold m-0 mb-4">', '</h1>' ); ?>

		<div class="entry-meta text-gray-600 text-sm mb-4">
			<?php
			$docspresso_posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'docspresso-theme' ),
				'<time class="entry-date published updated" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>'
			);
			$docspresso_post_by = sprintf(
				/* translators: %s: post author. */
				esc_html_x( ' by %s', 'post author', 'docspresso-theme' ),
				'<span class="author vcard"><a class="url fn n text-blue-600 hover:text-blue-800" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo $docspresso_posted_on . $docspresso_post_by; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			if ( has_category() ) {
				echo '<div class="post-categories mt-2 text-blue-600">';
				echo esc_html__( 'Categories: ', 'docspresso-theme' );
				the_category( ', ' );
				echo '</div>';
			}

			if ( has_tag() ) {
				echo '<div class="post-tags mt-2 text-blue-600">';
				echo esc_html__( 'Tags: ', 'docspresso-theme' );
				the_tags();
				echo '</div>';
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php docspresso_post_thumbnail(); ?>

	<div class="entry-content mb-8">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'docspresso-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links mb-4 p-4 bg-gray-100 rounded">' . esc_html__( 'Pages:', 'docspresso-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer text-sm">
		<?php docspresso_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->