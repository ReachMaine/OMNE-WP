<?php /* Oshine overrides & customizations */
// MOBILE MENU
register_nav_menu( 'mobile_nav', 'Mobile Menu' );

if ( ! function_exists( 'be_themes_get_header_mobile_navigation' ) ) {
	function be_themes_get_header_mobile_navigation() {
		global $be_themes_data;
		if(basename($be_themes_data['opt-header-style'], '.png') == 'style6' ) {
			$defaults = array (
				'theme_location'=>'main_left_nav',
				'depth'=> 3,
				'container_class'=> 'mobile-menu left-mobile-menu',
				'menu_id' => 'mobile-menu',
				'menu_class' => 'clearfix',
				'fallback_cb' => '',
				'walker' => new Be_Themes_Walker_Mobile_Menu()
			);
			wp_nav_menu( $defaults );
			$defaults = array (
				'theme_location'=>'main_right_nav',
				'depth'=> 3,
				'container_class'=> 'mobile-menu right-mobile-menu',
				'menu_id' => 'mobile-menu',
				'menu_class' => 'clearfix',
				'fallback_cb' => '',
				'walker' => new Be_Themes_Walker_Mobile_Menu()
			);
			wp_nav_menu( $defaults );
		} else {
			$defaults = array (
				'theme_location'=> 'mobile_nav',
				'depth'=> 3,
				'container_class'=> 'mobile-menu',
				'menu_id' => 'mobile-menu',
				'menu_class' => 'clearfix',
				'fallback_cb' => '',
				'walker' => new Be_Themes_Walker_Mobile_Menu()
			);
			wp_nav_menu( $defaults );
		}
	}
}
