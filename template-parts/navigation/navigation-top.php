<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Nerd_Shades
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">

	<a class="navigation_logo-link" href="<?php echo get_home_url(); ?>">

		<img 
			class="main-navigation_logo_image" 
			src="<?= get_theme_file_uri('assets/images/nerd-logo.png'); ?>"
		>

	</a>
	
	<div class="menu-primary-container">
		<?php wp_nav_menu( array(
			'menu'           => 'Primary',
			'container'		 => 'top-menu',
			'items_wrap'	 => '<ul id="%1$s" data-dropdown-menu class="%2$s">%3$s</ul>',
			'theme_location' => 'topbar',
			'menu_id'        => 'top-menu',
			'depth'          => 5,
			'menu_class'     => 'navigation_top-bar',
			'walker'		 => new Topbar_Menu_Walker(),
		) );
		?>
	</div>

	<div class="navigation_dropdown isClosed">
	<?php wp_nav_menu( array(
			'menu'           => 'Dropdown',
			'container'		 => 'navigation_dropdown',
			'items_wrap'	 => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'theme_location' => 'primary',
			'menu_id'        => 'drop-menu',
			'depth'          => 5,
			'menu_class'     => 'navigation_drop-nav',
			'walker'		 => new Topbar_Menu_Walker(),
		) );
		?>
	</div>


</nav><!-- #site-navigation -->
