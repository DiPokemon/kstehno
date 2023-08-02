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

            <?php if($opt_btn) : ?>
                <a class="btn opt_btn" href="<?= $opt_btn['opt_btn_url'] ?>">
                    <?= $opt_btn['opt_btn_text'] ?>
                </a>  
            <?php endif; ?>
        </div>
        
        <div class="opt_right">
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
        </div>        
    </div>
</section>

<?php if ($opt_icons) :?>
    <section>
        <div class="container">
            <div class="slider_wrapper">
                <div class="opt_icons">
                    <?php foreach( $opt_icons as $opt_icon ) : ?>
                        <div class="opt_icon">
                            <?= $opt_icon['opt_icon']; ?>
                            <?php if($opt_icon['opt_icon_text']): ?>
                                <span class="opt_icon_text">
                                    <?= $opt_icon['opt_icon_text']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
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
        <?php get_template_part( 'template-parts/block', 'form' ); ?>
    </div>
</section>

<?php get_footer(); ?>