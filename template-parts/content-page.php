<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package DocsPresso_Tech_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
	<header class="entry-header mb-6">
		<?php the_title( '<h1 class="entry-title text-3xl font-bold m-0 mb-4">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php docspresso_post_thumbnail(); ?>

	<div class="entry-content mb-8">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links mb-4 p-4 bg-gray-100 rounded">' . esc_html__( 'Pages:', 'docspresso-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer text-sm">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'docspresso-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->