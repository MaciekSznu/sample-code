<?php
/**
 * Block Hero Partial Content
 *
 * @package WordPress
 * @subpackage sample
 * @since sample 1.0
 */

?>

<div class="container">
	<div class="row">
		<div class="col-12 col-md-9 col-lg-7">
			<div class="block-hero__content">
				<?php if ( ! empty( $hero_content ) ) : ?>
					<?php echo wp_kses_post( $hero_content ); ?>
				<?php else : ?>
					<h1><?php echo esc_html( get_the_title() ); ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
