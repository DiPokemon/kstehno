<?php

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