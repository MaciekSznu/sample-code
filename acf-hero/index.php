<?php
/**
 * Block Hero
 *
 * @package WordPress
 * @subpackage sample
 * @since sample 1.0
 */

$block               = isset( $block_array ) ? $block_array : $block;
$block_object        = new Block( $block );
$name                = $block_object->block_name();
$hero_variant        = ! empty( $hero_variant ) ? $hero_variant : get_field( 'hero_variant' );
$hero_content        = ! empty( $hero_content ) ? $hero_content : get_field( 'hero_content' );
$hero_video          = ! empty( $hero_video ) ? $hero_video : get_field( 'hero_video' );
$hero_slides         = ! empty( $hero_slides ) ? $hero_slides : get_field( 'hero_slides' );
$hero_img            = ! empty( $hero_img ) ? $hero_img : get_post_thumbnail_id();
$hero_autoplay       = ! empty( $hero_autoplay ) ? $hero_autoplay : get_field( 'hero_autoplay_slides' );
$hero_autoplay_speed = ! empty( $hero_autoplay_speed ) ? $hero_autoplay_speed : get_field( 'hero_autoplay_speed' );

$data_autoplay = '';

if ( 'slider' === $hero_variant ) {
	$data_autoplay = $hero_autoplay ? 'data-autoplay=' . $hero_autoplay : '';
}

$data_autoplay_speed = '';

if ( 'slider' === $hero_variant && $hero_autoplay ) {
	$data_autoplay_speed = $hero_autoplay_speed ? ' data-autoplay-speed=' . $hero_autoplay_speed : '';
}

?>
<section class="block-acf block-hero<?php echo 'slider' === $hero_variant ? ' block-hero--slider' : ''; ?>"<?php echo esc_attr( $data_autoplay ); ?><?php echo esc_attr( $data_autoplay_speed ); ?><?php $block_object->the_block_attributes(); ?>>
	<?php load_styles( __DIR__, $name ); ?>
	<?php
	if ( 'slider' === $hero_variant ) {
		load_styles_components( 'sliders' );
		load_styles_third( 'slick' );
	}
	?>
	<?php $block_object->pick_block_padding_margin(); ?>
	<?php
	if ( 'image' === $hero_variant || 'video' === $hero_variant ) :
		?>
		<?php
		if ( ! empty( $hero_video ) || ( $hero_img && 0 !== $hero_img ) ) :
			?>
			<div class="block-hero__media-wrapper">
				<?php if ( ! empty( $hero_video ) ) : ?>
					<video class="video" autoplay loop muted playsinline>
						<source src="<?php echo esc_url( $hero_video ); ?>" type="video/mp4">
					</video>
				<?php elseif ( $hero_img && 0 !== $hero_img ) : ?>
					<figure class="block-hero__image">
						<?php echo wp_get_attachment_image( $hero_img, 'full' ); ?>
					</figure>
				<?php endif; ?>
			</div>
			<?php
		endif;
		include 'components/content.php';
	endif;
	?>
	<?php
	if ( 'slider' === $hero_variant && ! empty( $hero_slides ) ) {
		include 'components/slider.php';
	}
	?>
</section>
