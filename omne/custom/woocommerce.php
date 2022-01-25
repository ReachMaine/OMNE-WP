<?php /* woocommerce customizations */


// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );

// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

// if  we dont have product images,
// 1. remove image from shopping cart.
//add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );


// remove image from single product
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
// remove thumbnail image from loop (archive or shop )
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );


// to remove sku
add_filter( 'wc_product_sku_enabled', '__return_false' );

// remove the descrtion tab title.
add_filter ('woocommerce_product_description_tab_title','eainc_remove_descr_tab_title' );
function eainc_remove_descr_tab_title($title) {
    return '';
}

// remove additional information tab
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;

}
// remove display of category on single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// allow COD payment for Only meeting category & nursing summit categories of products
function filter_gateways($gateways){
    global $woocommerce;

    foreach ($woocommerce->cart->cart_contents as $key => $values ) {
        // ID(s) of the category we want to remove gateways from
        $category_ids = array( 14,15 ); // nursing summit & monthly meeting category id's

        // Get the terms, i.e. category list using the ID of the product
        $terms = get_the_terms( $values['product_id'], 'product_cat' );

        // Because a product can have multiple categories, we need to iterate through the list of the products category for a match
        if (is_array($terms) ) {
          foreach ($terms as $term) {
              if( ! in_array($term->term_id,$category_ids)){
                  unset($gateways['cod']);
                  break;
              }
          break;
          }
        }
    }
    return $gateways;
}
add_filter('woocommerce_available_payment_gateways','filter_gateways');


// Add email attachement for membership product.

add_filter( 'woocommerce_email_attachments', 'add_woocommerce_attachments_for_certain_product', 10, 3 );

function add_woocommerce_attachments_for_certain_product ( $attachments, $email_id, $email_order ){
    $product_id = 4164; // membership product

    $email_ids = array( 'customer_processing_order', 'customer_note', 'customer_on_hold_order' );
    if ( in_array ( $email_id, $email_ids ) ) {
      $order = wc_get_order( $email_order );
      $items = $order->get_items();

      foreach ( $items as $item ) {
        if ( $product_id === $item->get_product_id() ) {
  	       $upload_dir = wp_upload_dir();
           $attachments[] = $upload_dir['basedir'] . "/pdfs/OMNL-Membership-letter.pdf";

        }
      }

  }
  return $attachments;
}
