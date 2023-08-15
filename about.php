<?php
/*
* Template name: Шаблоy "О нас"
*/
?>

<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container about_container">    
        <div class="about_left">
            <div class="content">
                <?php the_content(); ?>
            </div>

            <?php if($about_additional_content) : ?>
                <div class="additional_content">
                    <?= $about_additional_content ?>
                </div>
            <?php endif; ?>
        </div>
        <!--
        <?php if ($about_links): ?>
            <div class="about_right">
                <?php foreach ($about_links as $about_link) : ?>                    
                        <?php 
                            $categorys = $about_link['about_link_category'];
                            if($categorys): 
                        ?>
                            <?php 
                                foreach ($categorys as $category){
                                    $cat_id = (int)$category['id'];
                                    $cat_link = get_term_link( $cat_id, 'product_cat' ); 
                                    $thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true );                     
                                    $background_image = wp_get_attachment_url( $thumbnail_id );
                                }
                            ?>
                        <?php endif; ?>                 
                        <div class="about_link_wrap" style="background-image: url(<?= $background_image //$about_link['about_link_img'] ?>);">
                            <a class="about_link"  href="<?= $cat_link ?>">
                                <?= $about_link['about_link_text'] ?>
                            </a>
                        </div>
                        
                        
                <?php endforeach ?>
            </div>
        <?php endif; ?>
        -->

        <?php if ($about_categories): ?>
            <div class="about_right">
                <?php foreach ($about_categories as $about_category) : ?>                            
                            <?php                           
                                $cat_id = (int)$about_category['id'];
                                $category = get_the_category_by_id($cat_id);
                                $cat_link = get_term_link( $cat_id, 'product_cat' ); 
                                $thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true );                     
                                $cat_image = wp_get_attachment_url( $thumbnail_id );                                
                            ?>                                       
                        <div class="about_link_wrap" style="background-image: url(<?= $cat_image //$about_link['about_link_img'] ?>);">
                            <a class="about_link"  href="<?= $cat_link ?>">
                                <?= $category ?>
                            </a>
                        </div>
                        
                        
                <?php endforeach ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<section>
    <div class="container">
        <?php get_template_part( 'template-parts/block', 'form' ); ?>
    </div>
</section>

<?php if ($about_icons) :?>
    <section>
        <div class="container">
            <div class="slider_wrapper">
                <div class="about_icons">
                    <?php foreach( $about_icons as $about_icon ) : ?>
                        <div class="about_icon">
                            <?= $about_icon['about_icon']; ?>
                            <span class="about_icon_text">
                                <?= $about_icon['about_icon_text']; ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>                
            </div>
        </div>
    </section>
<?php endif; ?>



<?php get_footer(); ?>