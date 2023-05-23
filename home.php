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
        </div>
    </div>   

</section>

<section>
    <div class="container">
        <div class="slider_wrapper">
            <div class="featured_products">                
                    <?php
                        $args = array(
                            'featured' => true,
                        );
                        $featured_products = wc_get_products( $args );
                    ?>
                    <?php foreach ($featured_products as $featured_product) : ?>
                        <a class="featured_product" href="<?= get_permalink( $featured_product->get_id() ); ?>" >
                            <div class="featured_product_img">
                                <?= $featured_product->get_image(); ?>
                            </div>
                            <div class="featured_product_content">
                                <h3><?= $featured_product->get_name(); ?></h3>
                                <div class="featured_product_desc">
                                    <!--<?= $featured_product->get_description(); ?>-->
                                </div>
                            </div>                            
                        </a>
                    <?php endforeach; ?>     
            </div>       
        </div>
    </div>
</section>

<?php if ($info_blocks) :?>
    <section>
        <div class="container">
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
                            <a class="info_block_btn" href="<?= $info_block['info_block_url'] ?>">
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

<?php get_footer(); ?>