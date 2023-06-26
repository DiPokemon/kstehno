<?php
/*
* Template name: Шаблон страницы "Контакты"
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container flex">
        <div class="half_column">

        </div>

        <div class="half_column">
            
            
               
                    <div class="half_column map_wrapper" id="map" data-address="<?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?>" data-latitude="<?= $address_latitude ?>" data-longitude="<?= $address_longitude ?>" data-name="<?= $org_name ?>" data-phonefront="<?= $contacts_main_phone_front ?>" data-phonehref="<?= $contacts_main_phone_href ?>"></div>    
                    <div class="half_column contacts_block">  
                        <?php get_template_part( 'template-parts/form', 'vertical' ); ?>       
                        <div class="address"><?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?></div>  
                        <div class="phones">
                            <span><a href="<?= $contacts_main_phone_href ?>"><?= $contacts_main_phone_front ?></a></span>
                            <span><a href="<?= $contacts_add_phone_href ?>"><?= $contacts_add_phone_front ?></a></span>
                        </div>
                        <?php get_template_part( 'template-parts/socials' ); ?>
                    </div>
                
        </div>

        <?php if($contacts_main_phone_href) : ?>
            <a href="tel:<?= $contacts_main_phone_href ?>" class="header_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_main_phone_front ?></a>
            <a href="tel:<?= $contacts_main_phone_href ?>" class="header_phone-link-mob"><i class="fa-solid fa-phone"></i></a>
        <?php endif; ?>

        <?php if($contacts_add_phone_href) : ?>
            <a href="tel:<?= $contacts_add_phone_href ?>" class="header_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_add_phone_front ?></a>
            <a href="tel:<?= $contacts_add_phone_href ?>" class="header_phone-link-mob"><i class="fa-solid fa-phone"></i></a>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/socials' ); ?>

    </div>    
</section>