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

	<aside class="widget-area" role="complementary" >
		<?php	wp_nav_menu( array(
					'menu'           => 'footer',
					'container'		 => 'footer-container',
					'items_wrap'	 => '<ul id="%1$s" footer-list class="%2$s">%3$s</ul>',
					'theme_location' => 'footer',
					'menu_id'        => 'none',
					'depth'          => 5,
					'menu_class'     => 'footer-menu accordion-menu',
					'walker'		 => new Topbar_Menu_Walker(),
				) );
		?>

			</div>
		<?php 
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		<?php } ?>
	</aside><!-- .widget-area -->


