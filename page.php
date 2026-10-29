<?php
/*
* Template name: Шаблон страницы
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container">    
        <?php if (get_the_post_thumbnail_url() ) : ?>
            <div class="page_img_wrapper">
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
            </div>
        <?php endif; ?>
        <div class="page_content_wrapper">
            <div class="page_content">
                <?php the_content(); ?>
            </div>            
        </div>
    </div>
</section>

<?php if($page_images) : ?>
    <section>
        <div class="container">
            <div class="slider_wrapper">
                <div class="page_images_slider">
                    <?php foreach( $page_images as $page_image ) : ?>
                        
                            <img class="page_image_slide" src="<?= $page_image['page_image_img'] ?>" alt="<?= $page_image['page_image_alt'] ?>" title="<?= $page_image['page_image_title'] ?>" >
                                               
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section>
    <div class="container">
        <?php get_template_part( 'template-parts/block', 'form' ); ?>
    </div>
</section>



<?php get_footer(); ?>