<?php
/*
* Template name: Шаблон "Оптовикам"
*/
?>

<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container opt_container">    
        <div class="opt_left">

            <div class="content">
                <?php the_content(); ?>
            </div>

            <div class="shop_link_wrapper">
                <a href="/catalog/" class="shop_link btn">
                    <?php if($catalog_icon && $catalog_text) :?>
                        <?= $catalog_icon.$catalog_text ?>
                    <?php elseif ($catalog_icon && !$catalog_text) : ?>
                        <?= $catalog_icon.__('Каталог','kstehno') ?>
                    <?php elseif (!$catalog_icon && $catalog_text) : ?>
                        <?= '<i class="fa-solid fa-gear"></i>'.$catalog_text ?>
                    <?php else: ?>
                        <i class="fa-solid fa-gear"></i> <?= __('Каталог','kstehno') ?>
                    <?php endif; ?>
                </a>
            </div>           
        </div>
        
        <?php if($opt_images): ?>
            <div class="opt_right">
                <div class="slider_wrapper">
                    <div class="opt_img_slider">
                        <?php foreach( $opt_images as $opt_image ) : ?>
                            <div class="img_wrapper">
                                <img src="<?= $opt_image['opt_image'] ?>" alt="<?= $opt_image['opt_image_alt'] ?>" title="<?=$opt_image['opt_image_title'] ?>">
                            </div>
                            
                        <?php endforeach; ?>    
                    </div>                     
                </div>
            </div> 
        <?php endif; ?>   

    </div>
</section>

                <section>
                    <div class="container">
                        <h2>Каталог</h2>
                        <?php  
                            $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 8,
                                'orderby' => 'rand',
                            );

                            $loop = new WP_Query( $args );
                        ?>

                        <div class="slider_wrapper ">
                            <div class="featured_products">
                                <?php while ( $loop->have_posts() ) : 
                                    $loop->the_post(); 
                                    global $product;
                                ?>                                    
                                    
                                    <div class="featured_product_wrapper">
                                        <a class="featured_product" href="<?= get_permalink() ?>" >
                                            <div class="featured_product_img">
                                                <?= $product->get_image(); ?>
                                            </div>
                                            <div class="featured_product_content">
                                                <h3 class="woocommerce-loop-product__title"><?= $product->get_name(); ?></h3>                                                
                                            </div>                                                
                                        </a>
                                        
                                        <div class="add_to_cart">                                        
                                            <?= do_shortcode( '[add_to_cart id=' . $product->get_id() . ' class="price" style=""] ' ) ?>                            
                                        </div>
                                    </div>
                                    
                                    
                                <?php 
                                    endwhile; 
                                    wp_reset_query();
                                ?>
                            </div>           
                        </div>
                    </div>
                </section>                

<section>
    <div class="container">
        <?php get_template_part( 'template-parts/block', 'form' ); ?>
    </div>
</section>

<?php get_footer(); ?>