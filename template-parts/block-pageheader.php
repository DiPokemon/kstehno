<?php include 'variables.php' ?>
<?php if ( is_product() ) : ?>
    <section>
        <div class="container page_header">
            <h1 class="page_title">
                <?php the_title(); ?>                 
            </h1>
            <?php 
                woocommerce_breadcrumb( $args = array(
                    'delimiter'   => ' / ',
                    'wrap_before' => '<div class="page-header__breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">',
                    'wrap_after'  => '</div>',
                    'before'      => '<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">',
                    'after'       => '</span>',                    
                ) )
            ?> 
        </div>
    </section>

<?php else: ?>
    <section>
        <div class="container page_header">
            <h1 class="page_title"><?php the_title(); ?></h1>
            <?php if (function_exists('breadcrumbs')) breadcrumbs(); ?> 
        </div>
    </section>
<?php endif; ?>