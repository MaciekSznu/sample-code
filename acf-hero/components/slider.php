<?php
/**
 * Block Hero Partial Slider
 *
 * @package WordPress
 * @subpackage sample
 * @since sample 1.0
 */

?>

<div class="block-hero__slider-wrapper">
	<?php
	foreach ( $hero_slides as $slide ) :
		$slide_overlay = $slide['slide_overlay'];
		$slide_img     = $slide['slide_image'];
		$hero_content  = $slide['slide_content'];
		$slide_class   = $slide_overlay ? ' block-hero__slide--overlay' : '';
		?>
		<div class="block-hero__slide<?php echo esc_attr( $slide_class ); ?>">
			<figure class="block-hero__image">
			<?php echo wp_get_attachment_image( $slide_img, 'full' ); ?>
			</figure>
			<?php include 'content.php'; ?>
		</div>
	<?php endforeach; ?>
</div>
<div class="block-hero__slider-controls">
	<button type="button" aria-label="<?php echo esc_attr__( 'Previous', 'sample' ); ?>" class="block-hero__slider-prev"></button>
	<div class="block-hero__slider-dots"></div>
	<button type="button" aria-label="<?php echo esc_attr__( 'Next', 'sample' ); ?>" class="block-hero__slider-next"></button>
</div>
