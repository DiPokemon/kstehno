<?php
if (! defined ('ABSPATH')){
    exit;
}

// /**
//  * Set WooCommerce image dimensions upon theme activation
//  */
// // Remove each style one by one
// add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
// function jk_dequeue_styles( $enqueue_styles ) {
// 	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
// 	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
// 	return $enqueue_styles;
// }

// // Or just remove them all in one line
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//remove_all_filters('woocommerce_after_single_product_summary');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); 
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10); 

//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

