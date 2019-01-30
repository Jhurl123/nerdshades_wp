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
	
	<?php wp_nav_menu( array(
		'theme_location' => 'topbar',
		'menu_id'        => 'top-menu',
		'menu_classes'   => 'top-nav'
	) );
	//implement walker when i get there ?>


</nav><!-- #site-navigation -->
