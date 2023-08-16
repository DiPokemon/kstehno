<?php
/*
* Template name: Шаблон "Контакты"
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container contacts_container">
        <div class="right_column">
            <div class="half_column map_wrapper" id="map" data-address="<?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?>" data-latitude="<?= $address_latitude ?>" data-longitude="<?= $address_longitude ?>" data-name="<?= $org_name ?>" data-phonefront="<?= $contacts_main_phone_front ?>" data-phonehref="<?= $contacts_main_phone_href ?>"></div>             
                            
        </div>
    </div>    
</section>