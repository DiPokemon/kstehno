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
            </div>
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

add_filter( 'woocommerce_get_price_html', 'kstehno_add_price_prefix', 99, 2 );
 
function kstehno_add_price_prefix( $price, $product ){
    $price = 'от ' . $price;
    return $price;
}

add_action('woocommerce_single_product_summary', 'kstehno_short_attributes', 30);
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
            <a href="#tab-title-additional_information">Подробнее</a>         
        </div>
    <?
}

add_filter( 'woocommerce_product_related_products_heading', 'kstehno_change_related_product_heading' );

function kstehno_change_related_product_heading() {
    $related_products_title = carbon_get_theme_option( 'related_products_title' );    
	return $related_products_title;
}
  
add_filter( 'woocommerce_product_upsells_products_heading', 'kstehno_upsells_heading' );
  
function kstehno_upsells_heading() {
    $upsells_products_title = carbon_get_theme_option( 'upsells_products_title' );
    return $upsells_products_title;
}


/**
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}



add_action( 'woocommerce_before_main_content', 'kstehno_add_sidebar_only_archive', 50 );
function kstehno_add_sidebar_only_archive() {
	if ( ! is_product() ) {
		woocommerce_get_sidebar();
	}
}

add_action( 'woocommerce_before_main_content', 'kstehno_archive_wrapper_start', 40 );
function kstehno_archive_wrapper_start(){
    if ( ! is_product() ) :
?>
	<section>
        <div class="container page_header woocommerce-products-header">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="page_title woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>

            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?> 

            <?php if ( is_product_category() ) :?>
                <div class="container categories_container">
                    <div class="categories">
                
                
                    <?php 
                        $term = get_queried_object();
                        $taxonomy = $term->taxonomy;

                        //$parents = get_term_children( $term->term_id, $taxonomy);

                       
                            
                            $parents = get_categories(array(
                                'hierarchical' => false,
                                'taxonomy'   =>  'product_cat',
                                'hide_empty' => false,
                                'parent' => $term->term_id
                            ));
                        
                                                
                    ?>              
                    
                        <?php if(!empty($parents)): ?>
                            
                            <?php 
                                $i_parents = 1;
                                foreach($parents as $parent) : 
                            ?>
                                
                                <div class="category">
                                    <a class="category_parent_link" href="<?= get_category_link($parent->term_id) ?>"><?= $parent->name; ?></a>

                                    <ul class="child_categories_list">
                                        <?php 
                                            $child_categories = get_categories(array(
                                                'parent' => $parent->term_id,
                                                'taxonomy'   =>  'product_cat',
                                                'hide_empty' => false
                                            )); 
                                            $i_child = 1;
                                            foreach ($child_categories as $child_category):
                                        ?>
                                        <li class="child_category">
                                            <a href="<?= get_category_link($child_category->term_id) ?>" class="child_category_link"><?= $child_category->name; ?></a>
                                        </li>
                                        <?php if($i_child++ == 3) break; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                                <?php if($i_parents++ == 8 ) break; ?>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(is_shop()): ?>
                <div class="container categories_container">
                    <div class="categories">
                        <?php 
                            
                            $parents = get_categories(array(
                                'hierarchical' => false,
                                'taxonomy'   =>  'product_cat',
                                'hide_empty' => false,
                                'parent' => 0
                            ));
                        ?>
                        <?php if(!empty($parents)): ?>
                            
                            <?php 
                                $i_parents = 1;
                                foreach($parents as $parent) : 
                            ?>
                                
                                <div class="category">
                                    <a class="category_parent_link" href="<?= get_category_link($parent->term_id) ?>"><?= $parent->name; ?></a>

                                    <ul class="child_categories_list">
                                        <?php 
                                            $child_categories = get_categories(array(
                                                'parent' => $parent->term_id,
                                                'taxonomy'   =>  'product_cat',
                                                'hide_empty' => false
                                            )); 
                                            $i_child = 1;
                                            foreach ($child_categories as $child_category):
                                        ?>
                                        <li class="child_category">
                                            <a href="<?= get_category_link($child_category->term_id) ?>" class="child_category_link"><?= $child_category->name; ?></a>
                                        </li>
                                        <?php if($i_child++ == 3) break; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>
                                <?php if($i_parents++ == 8 ) break; ?>
                            <?php endforeach; ?>

                        <?php endif; ?>            
                    </div>
                </div>    
            <?php endif; ?>

            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action( 'woocommerce_archive_description' );
            ?>
        </div>
    </section>
	
    <div class="container shop_grid">
			
<?php
endif;
}

add_action( 'woocommerce_after_main_content', 'kstehno_archive_wrapper_end', 30 );
function kstehno_archive_wrapper_end(){
?>
                <?php get_template_part( 'template-parts/block', 'featured-products' ); ?>
				<div class="clearfix"> </div>
			</div>
	<?php
}

add_action( 'woocommerce_before_main_content', 'kstehno_archive_content_wrapper_start', 60 );
function kstehno_archive_content_wrapper_start(){
    if ( ! is_product() ) :
	?>
	    <div class="product_grid">
	<?php endif;
}
add_action( 'woocommerce_after_main_content', 'kstehno_archive_content_wrapper_end', 25 );
function kstehno_archive_content_wrapper_end(){
    if ( ! is_product() ) :
	?>
        </div>        
	<?php endif;
}

add_action( 'woocommerce_after_main_content', 'kstehno_archive_facet_pagination', 5 );
function kstehno_archive_facet_pagination(){
    if ( ! is_product() ) :
	?>
        <?php echo do_shortcode('[facetwp facet="pagination"]') ?>        
	<?php endif;
}