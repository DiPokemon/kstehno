<?php
/*
* Template name: Шаблон "Оплата и доставка"
*/
?>

<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container ">            
            <div class="content">
                <?php the_content(); ?>
            </div>          
        </div>
    </div>
</section>

<?php if ($buy_icons) :?>
    <section>
        <div class="container">
            <div class="slider_wrapper">
                <div class="buy_icons">
                    <?php foreach( $buy_icons as $buy_icon ) : ?>
                        <div class="buy_icon">
                            <?= $buy_icon['buy_icon']; ?>
                            <?php if($buy_icon['buy_icon_text']) : ?>
                                <span class="buy_icon_text">
                                    <?= $buy_icon['buy_icon_text']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>                
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($buy_texts) :?>
    <section>
        <div class="container buy_texts_container">
            <?php foreach ($buy_texts as $buy_text): ?>
                <div class="buy_text">
                    <?= $buy_text['buy_text']; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($buy_add_text) :?>
    <section>
        <div class="container">
            <div class="content">
                <?= $buy_add_text; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>