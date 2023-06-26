<?php



if (! defined('ABSPATH')){
    exit;
}

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <span class="cart-contents">
        <span class="count">
            <?= WC()->cart->get_cart_contents_count(); ?>
        </span>
    </span>

    <?php $fragments['span.cart-contents'] = ob_get_clean();

    return $fragments;

} );

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div id="mini_cart_panel" class="mini_cart_panel">
        <div class="mini_cart_top">
            <span>Корзина</span>
            <a onclick="closeCartPanel()" href="javascript:void(0)" class="close_mini_cart"><i class="fa-solid fa-xmark"></i></a>
        </div>                                
        <?php woocommerce_mini_cart() ?>
    </div>

    <?php $fragments['div.mini_cart_panel'] = ob_get_clean();

    return $fragments;

} );


add_action('woocommerce_before_single_product', 'kstehno_wrapper_product_start', 5);
function kstehno_wrapper_product_start(){
    ?>
        <section>
            <div class="container">
    <?
}

add_action('woocommerce_after_single_product', 'kstehno_wrapper_product_end', 5);
function kstehno_wrapper_product_end(){
    ?>
            <div>
        </section>
    <?
}


add_action('woocommerce_before_single_product_summary', 'kstehno_wrapper_product_main_info_start', 5);
function kstehno_wrapper_product_main_info_start(){
    ?>
        <div class="product_main_info">
    <?
}

add_action('woocommerce_after_single_product_summary', 'kstehno_wrapper_product_main_info_end', 25);
function kstehno_wrapper_product_main_info_end(){
    ?>
        </div>
    <?
}

/**
* Replace WooCommerce price with text ' Call for Price “and your telephone number
*/

//Hook

add_filter('woocommerce_get_price_html', 'product_price_text');

// Callback function

function product_price_text() {
    $price_text = carbon_get_theme_option( 'price_text' );
    return $price_text ;

}

add_action('woocommerce_single_product_summary', 'kstehno_short_attributes', 25);
function kstehno_short_attributes(){
    global $product;
    ?>
        <div class="product_short_attributes">
            <?
                $attributes = $product->get_attributes();
                $i = 0;                    
                    foreach ( $attributes as $attribute ):                            
                        $attribute_name = $attribute->get_taxonomy();                              
                        $attribute_value = $product->get_attribute( $attribute_name );
                        $attribute_label = wc_attribute_label( $attribute_name );
                        echo '<div class="short_attribute"><span class="attribute_label">'.$attribute_label.': </span><span class="attribute_value">'.$attribute_value.'</span></div>';
                        if(++$i > 2) break;                                                    
                    endforeach;
            ?>            
        </div>
    <?
}

add_filter( 'woocommerce_product_related_products_heading', 'kstehno_change_related_product_heading' );

function kstehno_change_related_product_heading() {
    $related_products_title = carbon_get_theme_option( 'related_products_title' );    
	return $related_products_title;
}
