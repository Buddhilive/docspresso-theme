<?php
/**
 * Search form template
 *
 * @package DocsPresso_Tech_Blog
 */

$unique_id = wp_unique_id( 'search-form-' );

?>
<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-labelledby="<?php echo esc_attr( $unique_id ); ?>">
	<div class="search-form-wrapper flex items-center">
		<label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
			<?php esc_html_e( 'Search for:', 'docspresso-theme' ); ?>
		</label>
		<input 
			type="search" 
			id="<?php echo esc_attr( $unique_id ); ?>" 
			class="search-field flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent placeholder-gray-500" 
			placeholder="<?php echo esc_attr_x( 'Search posts...', 'placeholder', 'docspresso-theme' ); ?>" 
			value="<?php echo get_search_query(); ?>" 
			name="s" 
		/>
		<button 
			type="submit" 
			class="search-submit px-6 py-3 bg-purple-600 text-white font-medium rounded-r-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200 flex items-center justify-center"
			aria-label="<?php esc_attr_e( 'Search', 'docspresso-theme' ); ?>"
		>
			<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
			</svg>
			<span class="sr-only"><?php esc_html_e( 'Search', 'docspresso-theme' ); ?></span>
		</button>
	</div>
</form>