<?php
/*
* Template name: Страница города
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container">            
        <div class="content">
            <?php the_content(); ?>
        </div>        
    </div>
</section>

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
                            <a class="category_parent_link" href="<?= get_category_link($parent->term_id) ?>?city=<?= $city_name ?>"><?= $parent->name; ?></a>

                            <ul class="child_categories_list">
                                <?php 
                                    $child_categories = get_categories(array(
                                        'parent' => $parent->term_id,
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => false
                                        )); 
                                        $i_child = 1;
                                    foreach ($child_categories as $child_category):
                                ?>
                                        <li class="child_category">
                                            <a href="<?= get_category_link($child_category->term_id) ?>?city=<?= $city_name ?>" class="child_category_link"><?= $child_category->name; ?></a>
                                        </li>
                                        <?php if($i_child++ == 8) break; ?>
                                    <?php endforeach; ?>
                    
                                    <?php if (count($child_categories) > 8) : ?>
                                        <li class="child_category">
                                            <a href="<?= get_category_link($parent->term_id) ?>?city=<?= $city_name ?>" class="child_category_link child_category_link_points">...</a>
                                        </li>
                                    <?php endif; ?>
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

<section>
    <div class="container">
        <div class="content">
            <?= $city_delivery_text ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/block', 'featured-products' ); ?>

<section>
    <div class="container">
        <div class="content">
            <?= $city_delivery_text_two ?>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <?php get_template_part( 'template-parts/block', 'form' ); ?>
    </div>
</section>

<?php get_footer(); ?>