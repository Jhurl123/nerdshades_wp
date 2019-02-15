<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="row">
	<div class="widgets_container columns large-12 align-center">
		<?php if ( is_active_sidebar( 'footer_menu_1' ) ) : ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'footer_menu_1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer_menu_2' ) ) : ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'footer_menu_2' ); ?>
			</div>
		<?php endif;?>

		<?php if ( is_active_sidebar( 'footer_menu_3' ) ) : ?>
			<div class="widget-column footer-widget-3">
				<?php dynamic_sidebar( 'footer_menu_3' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

