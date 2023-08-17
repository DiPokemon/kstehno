<?php
/*
Template Name: Шаблон "Контакты"
*/
?>
<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

<section>
    <div class="container contacts_container">
        <div class="left_column">
            <div class="contacts_row">
                <p>Адрес:</p>
                <?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?>
            </div>

            <?php if ($contacts_main_phone_href): ?>
                <div class="contacts_row">
                    <p>Телефон:</p>                    
                        <a href="tel:<?= $contacts_main_phone_href ?>"><?= $contacts_main_phone_front ?></a>                    
                        <?php if ($contacts_add_phone_href): ?>
                            <a href="tel:<?= $contacts_add_phone_href ?>"><?= $contacts_add_phone_front ?></a>
                        <?php endif ?>                
                </div>
            <?php endif ?>
            <?php if ($contacts_mail): ?>
                <div class="contacts_row">
                    <p>E-Mail:</p>                    
                        <a href="mailto:<?= $contacts_mail?>"><?= $contacts_mail ?></a>                                                
                </div>
            <?php endif ?>
            
            <?php if ($work_hours): ?>
                <div class="contacts_row">
                    <p>График работы:</p>
                    <?= $work_hours ?>
                </div>
            <?php endif ?> 
            <?php get_template_part( 'template-parts/socials' ); ?>
        </div>
        <div class="right_column">
            <div class="map_wrapper" id="map" data-address="<?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?>" data-latitude="<?= $address_latitude ?>" data-longitude="<?= $address_longitude ?>" data-name="<?= $org_name ?>" data-phonefront="<?= $contacts_main_phone_front ?>" data-phonehref="<?= $contacts_main_phone_href ?>"></div>             
                            
        </div>
    </div>  
</section>

<?php get_footer(); ?>