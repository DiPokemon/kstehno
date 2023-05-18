<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Main page fields', 'kstehno' ) )     
    ->show_on_template('home.php')
    ->add_fields(array(
		Field::make( 'complex', 'main_banners',  __('Main banners', 'kstehno') )
            ->add_fields( 'main_banners_items', __('Banner', 'kstehno'), array(                
                Field::make( 'image', 'main_banner_desk', __( 'Banner for desktop', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(20),  
                Field::make( 'image', 'main_banner_mob', __( 'Banner for mobile', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(20),                   
                Field::make( 'text', 'main_banner_alt', __( 'Alt', 'kstehno' ) )
                    ->set_width(30),
                Field::make( 'text', 'main_banner_title', __( 'Title', 'kstehno' ) )
                    ->set_width(30),
                Field::make( 'text', 'main_banner_url', __( 'URL', 'kstehno' ) )
                    ->set_attribute( 'placeholder', 'https://ks-tehno.ru/example/' )
                    ->set_width(100),
            ) )
	));