<?php

//add_action( 'after_setup_theme', 'be_themes_child_theme_setup' );
//function be_themes_child_theme_setup() {
    load_child_theme_textdomain( 'be-themes', get_stylesheet_directory() . '/languages' );
//}

// function be_restore_default_gallery() {
// remove_shortcode('gallery');
// add_shortcode('gallery','gallery_shortcode');
// remove_shortcode('video');
// add_shortcode('video','wp_video_shortcode');
// }
// add_action( 'init', 'be_restore_default_gallery');

  require_once(get_stylesheet_directory().'/custom/branding.php');
  require_once(get_stylesheet_directory().'/custom/oshine.php');
  require_once(get_stylesheet_directory().'/custom/alerts.php');
  require_once(get_stylesheet_directory().'/custom/woocommerce.php');
  require_once(get_stylesheet_directory().'/custom/language.php');
    require_once(get_stylesheet_directory().'/custom/tribe_events.php');
  function reach_widgets_init() {
    // widget area on home page above contnet
    register_sidebar(
      array(
              'name' => __( 'Homepage Intro ', 'be-themes' ),
              'id'   => 'reach-home-intro',
              'description'   => __( 'Homepage above content', 'be-themes' ),
              'before_widget' => '<div class="%2$s widget">',
              'after_widget'  => '</div>',
              'before_title'  => '<h6>',
              'after_title'   => '</h6>',
      )
    );
    // widget area on every page above header
    register_sidebar(
      array(
             'name' => __( 'Bottom Call to Action ', 'be-themes' ),
             'id'   => 'reach-bottom-cta',
             'description'   => __( 'Widget area (above footer)', 'be-themes' ),
             'before_widget' => '<div class="%2$s widget">',
             'after_widget'  => '</div>',
             'before_title'  => '<h6>',
             'after_title'   => '</h6>',
      )
   );
 }
add_action( 'widgets_init', 'reach_widgets_init' );

add_action( 'after_setup_theme', 'remove_parent_theme_features', 10 );
function remove_parent_theme_features() {
  /* remove oshine's adding this to product */
  remove_action('woocommerce_single_product_summary', 'be_themes_share_woo_products', 59);
}

?>
