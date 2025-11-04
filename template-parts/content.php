<?php
/**
 * Template part for displaying posts
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
	<header class="entry-header mb-6">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title text-3xl font-bold m-0 mb-4">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title text-2xl font-bold m-0 mb-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-gray-900 hover:text-purple-600 no-underline">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-gray-600 text-sm mb-4">
				<?php
				$docspresso_posted_on = sprintf(
					/* translators: %s: post date. */
					esc_html_x( 'Posted on %s', 'post date', 'docspresso-theme' ),
					'<time class="entry-date published updated" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>'
				);
				echo $docspresso_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

				if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<span class="comments-link ml-4">';
					comments_popup_link(
						sprintf(
							wp_kses(
								/* translators: %s: post title */
								__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'docspresso-theme' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					echo '</span>';
				}
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_singular() || is_archive() ) : ?>
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
	<?php else : ?>
		<div class="entry-summary mb-6">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php endif; ?>

	<footer class="entry-footer text-sm">
		<?php docspresso_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->