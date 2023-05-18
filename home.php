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
                        <a href="<?=$banner['main_banner_url']?>" class="banner">
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
    <div class="container">
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
                <?php foreach($parents as $parent) : ?>
                    
                    <div class="category">
                        <a class="category_parent_link" href="<?= get_category_link($parent->term_id) ?>"><?= $parent->name; ?></a>

                        <ul class="child_categories_list">
                            <?php 
                                $child_categories = get_categories(array(
                                    'parent' => $parent->term_id,
                                    'taxonomy'   =>  'product_cat',
                                    'hide_empty' => false
                                )); 
                                foreach ($child_categories as $child_category):
                            ?>
                            <li class="child_category">
                                <a href="<?= get_category_link($child_category->term_id) ?>" class="child_category_link"><?= $child_category->name; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>


            <!--
                <?php
                $args = array(
                    'taxonomy' => 'product_cat',
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'hide_empty' => false
                );

                $product_categories = get_terms( $args );

                $count = count($product_categories);
            ?>
            <?php if ( $count > 0 ) : ?>
                <?php foreach ( $product_categories as $product_category ) : ?>
                    <div class="category">
                        <a class="category_link" href="<?= get_term_link( $product_category ) ?>"><?= $product_category->name ?></a>

                    </div>
                                                      
                    <?php endforeach ?>               
            <?php endif; ?>
        -->
        </div>
    </div>   

</section>

<?php get_footer(); ?>