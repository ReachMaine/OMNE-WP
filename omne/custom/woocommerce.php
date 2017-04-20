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

// remove additional information tab
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;

}
// remove category on single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
