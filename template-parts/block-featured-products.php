                <?php
                    // The tax query
                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    );

                    // The query
                    $query = new WP_Query( array(
                        'post_type'           => 'product',
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page'      => 8,
                        'orderby'             => 'date',
                        'order'               => $order == 'asc' ? 'asc' : 'desc',
                        'tax_query'           => $tax_query // <===
                    ) );

                    if ( $query->have_posts() ){
                        $featured_products_arr = array();
                        
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $featured_products_arr[] = get_the_id();
                            
                        }                            
                    }
                ?> 
                <?php if ( $query->have_posts() ): ?>
                <section>
                    <div class="container">
                        <h2>Популярные товары</h2>
                        <div class="slider_wrapper ">
                            <div class="featured_products">
                                <?php foreach ($featured_products_arr as $featured_product): ?>
                                    <?php $product = wc_get_product( $featured_product ); ?>                                  
                                    
                                    
                                    <div class="featured_product_wrapper">
                                        <a class="featured_product" href="<?= get_permalink( $product->get_id()); ?>" >
                                            <div class="featured_product_img">
                                                <?= $product->get_image(); ?>
                                            </div>
                                            <div class="featured_product_content">
                                                <h3 class="woocommerce-loop-product__title"><?= $product->get_name(); ?></h3>                                                
                                            </div>                                                
                                        </a>
                                        <!-- <a class="more_info" href="<?= get_permalink( $product->get_id()); ?>">Подробнее</a> -->

                                        <?php if($product->get_price()) :?>
                                            <div class="add_to_cart">                                        
                                                <?= do_shortcode( '[add_to_cart id=' . $product->get_id() . ' class="price" style=""] ' ) ?>                            
                                            </div>
                                        <?php else: ?>
                                            <a href="<?= get_permalink( $product->get_id()); ?>" >Подробнее</a>
                                        <?php endif; ?>
                                    </div>
                                    
                                    
                                <?php endforeach; ?>
                            </div>           
                        </div>
                    </div>
                </section>
                <?php endif; ?>
