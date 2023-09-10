<?php
/*
Template Name: Шаблон главной страницы
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>

<?php if ($main_banners) :?>
    <section>
        <div class="container">
            <div class="slider_wrapper">
            <div class="main_banner">
                <?php foreach( $main_banners as $banner ) : ?>
                    <?php if ($banner['main_banner_url']) : ?>
                        <a href="<?= $banner['main_banner_url'] ?>" class="banner">
                            <img class="main_banner_desk" src="<?=$banner['main_banner_desk']?>" alt="<?=$banner['main_banner_alt']?>" title="<?=$banner['main_banner_title']?>">
                            <img class="main_banner_mob" src="<?=$banner['main_banner_mob']?>" alt="<?=$banner['main_banner_alt']?>" title="<?=$banner['main_banner_title']?>">
                        </a>
                    <?php else : ?>
                        <div class="banner">
                            <img class="main_banner_desk" src="<?=$banner['main_banner_desk']?>" alt="<?=$banner['main_banner_alt']?>" title="<?=$banner['main_banner_title']?>">
                            <img class="main_banner_mob" src="<?=$banner['main_banner_mob']?>" alt="<?=$banner['main_banner_alt']?>" title="<?=$banner['main_banner_title']?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
</section>
<?php endif; ?>
                
<section>
    <div class="container categories_container">
        <h2><?= $main_categories_title ?></h2>  
        <div class="categories">
            <?php 
                $parents = get_categories(array(
                    'hierarchical' => false,
                    'taxonomy'   =>  'product_cat',
                    'hide_empty' => true,
                    'parent' => 0
                ));
            ?>

            <?php if(!empty($parents)): ?>
                 
                <?php 
                    $i_parents = 1;
                    foreach($parents as $parent) : 
                    
                    $thumbnail_id = get_term_meta( $parent->term_id, 'thumbnail_id', true ); 
                    
                    $background_image = wp_get_attachment_url( $thumbnail_id );
                ?>
                    
                    <div class="category" style="background-image: url('<?= $background_image; ?>')">
                        <div class="category_inner">
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
                                <?php if($i_child++ == 8) break; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        

                    </div>
                    <?php if($i_parents++ == 8 ) break; ?>
                <?php endforeach; ?>

            <?php endif; ?>            
        </div>
        <div class="shop_link_wrapper">
            <a href="<?= $shop_page_url ?>" class="shop_link btn">
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
</section>


<?php get_template_part( 'template-parts/block', 'featured-products' ); ?>



<?php if ($info_blocks) :?>
    <section>
        <div class="container">
            <h2><?= $main_info_title ?></h2>  
            <div class="slider_wrapper">
                <?php foreach( $info_blocks as $info_block ) : ?>
                    <div class="info_block">
                        <?php if ($info_block['info_block_title']): ?>
                            <h3 class="info_block_title">
                                <?= $info_block['info_block_title'] ?> 
                            </h3>
                        <?php endif; ?>
                        
                        <?php if ($info_block['info_block_text']): ?>
                            <p class="info_block_text"><?= $info_block['info_block_text'] ?></p>
                        <?php endif; ?>

                        <?php if ($info_block['info_block_url']): ?>
                            <a class="btn info_block_btn" href="<?= $info_block['info_block_url'] ?>">
                                <?= $info_block['info_block_btn_text'] ?>
                            </a>                        
                        <?php endif; ?>                        
                        
                        <?php if ($info_block['info_block_desk_img']): ?>
                            <div class="info_block_img"  style="background-image: url('<?=$info_block['info_block_desk_img']?>')">

                            </div>                           
                        <?php endif; ?> 
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section>
    <div class="container ">
        <h2><?= $main_opt_title ?></h2>
        <div class="opt_container">        
            <div class="opt_products_left" style="background-image:url('<?= $main_opt_image ?>')">
                <div class="slider_wrapper">
                    <?php  
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 8,
                            'orderby' => 'rand',
                        );

                        $loop = new WP_Query( $args );
                    ?>
                    <div class="opt_products products">
                        <?php while ( $loop->have_posts() ) : 
                            $loop->the_post(); 
                            global $product;
                        ?>                                
                                        
                        <div class="opt_product_wrapper product">
                            <a class="opt_product" href="<?= get_permalink() ?>" >
                                <div class="opt_product_img">
                                    <?= $product->get_image(); ?>
                                </div>
                                <div class="opt_product_content">
                                    <h3 class="woocommerce-loop-product__title"><?= $product->get_name(); ?></h3>                                                
                                </div>                                                
                            </a>
                                            
                            <?php if($product->get_price()) :?>
                                <div class="add_to_cart">                                        
                                    <?= do_shortcode( '[add_to_cart id=' . $product->get_id() . ' class="price" style=""] ' ) ?>                            
                                </div>
                            <?php else: ?>
                                <a class="button" href="<?= get_permalink( $product->get_id()); ?>" >Подробнее</a>
                            <?php endif; ?>
                        </div>                                    
                                        
                        <?php 
                            endwhile; 
                            wp_reset_query();
                        ?>
                    </div>  
                </div>
            </div>
            <div class="opt_products_right">
                <h3><?= $main_opt_subtitle ?></h3>
                <p class="opt_products_text"><?= $main_opt_text ?></p>
            </div>
        </div>
    </div>
</section>

<?php if ($advantages) :?>
    <section>
        <div class="container">
            <h2><?= $main_advantages_title ?></h2>  
            <div class="slider_wrapper">
                <div class="advantages">
                    <?php foreach( $advantages as $advantage ) : ?>
                        <div class="advantage">
                            <?= $advantage['advantage_icon']; ?>
                            <span class="advantage_text">
                                <?= $advantage['advantage_text']; ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>                
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($testimonials) :?>
    <section>
        <div class="container">
            <h2><?= $main_testimonials_title ?></h2>  
            <div class="slider_wrapper">
                <div class="testimonials">
                    
                        <?php foreach($testimonials as $i => $testimonial): ?>
                            <div class="testimonial" id="testimnial_<?= $i; ?>" itemscope itemtype="https://schema.org/Review">                
                                <div class="testimonial_img">
                                    <img loading="lazy" class="testimonial_author_img" src="<?= $testimonial['testimonial_img']; ?>" alt="Отзыв о KS-TEHNO от <?= $testimonial['testimonial_name']; ?> <?= $testimonial['testimonial_second_name']; ?>">
                                </div>
                                <div class="testimonial_content">
                                    <div class="testimonial_author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <span itemprop="name"><?= $testimonial['testimonial_name']; ?></span>
                                        <?php if($testimonial['testimonial_second_name']):?>
                                            <span itemprop="familyName"><?= $testimonial['testimonial_second_name']; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="testimonial_text" itemprop="reviewBody">
                                        <?= $testimonial['testimonial_text']; ?>
                                    </div>

                                    <meta itemprop="datePublished" content="<?= $testimonial['testimonial_date']; ?>"/>
                                    <meta itemprop="name" content="Отзыв о компании KS-TEHNO">
                                    <link itemprop="url" href="<?= get_site_url() ?>/#testimonial_<?= $i; ?>">

                                    <div class="testimonial_organization" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Organization">
                                        <meta itemprop="name" content="Отзыв о компании KS-TEHNO">
                                        <meta itemprop="telephone" content="<?= $contacts_main_phone ?>">
                                        <link itemprop="url" href="<?= get_site_url() ?>"/>
                                        <meta itemprop="email" content="<?= $contacts_mail ?>">
                                        <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                            <meta itemprop="addressLocality" content="<?= $address_city ?>">
                                            <meta itemprop="streetAddress" content="<?= $address_street ?>, <?= $address_building ?>">
                                        </p>
                                    </div>
                                    <div class="testimonial_rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                                        <meta itemprop="worstRating" content="1">
                                        <meta itemprop="ratingValue" content="<?= $testimonial['testimonial_rating']; ?>">
                                        <meta itemprop="bestRating" content="5"/>
                                    </div>                    
                                </div>
                            </div>            
                        <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>






<?php get_footer(); ?>