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
        
        <?php if ($about_links): ?>
            <div class="about_right">
                <?php foreach ($about_links as $about_link) : ?>                    
                        <?php 
                            $categorys = $about_link['about_link_category'];
                            if($categorys): 
                        ?>
                            <?php 
                                foreach ($categorys as $category){
                                    $cat_link = get_term_link( (int)$category['id'], 'product_cat' ); 
                                }
                            ?>
                        <?php endif; ?>                 
                        <div class="about_link_wrap" style="background-image: url(<?= $about_link['about_link_img'] ?>);">
                            <a class="about_link"  href="<?= $cat_link ?>">
                                <?= $about_link['about_link_text'] ?>
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