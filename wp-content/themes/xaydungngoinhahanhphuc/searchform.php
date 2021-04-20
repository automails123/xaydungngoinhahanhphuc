<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form d-flex flex-wrap flex-sm-nowrap align-items-center justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="mb-3 pr-3" for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text text-nowrap"><?php echo _x( 'Tìm kiếm cho: ', 'label', 'twentyseventeen' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control w-75 mb-3" placeholder="<?php echo esc_attr_x( 'Nhập từ khóa cần tìm kiếm &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit btn btn-default ml-3 px-md-4 mb-3"><?php echo _x( 'Tìm Kiếm', 'submit button', 'twentyseventeen' ); ?></span></button>
</form>
