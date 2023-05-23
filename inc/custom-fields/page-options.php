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
            ) ),
        Field::make( 'complex', 'info_blocks',  __('Info blocks', 'kstehno') )
            ->add_fields( 'info_blocks_items', __('Info block', 'kstehno'), array(                
                Field::make( 'image', 'info_block_desk_img', __( 'Info block for desktop', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(20),  
                Field::make( 'image', 'info_block_mob_img', __( 'Info block for mobile', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(20),                   
                Field::make( 'text', 'info_block_img_alt', __( 'Alt', 'kstehno' ) )
                    ->set_width(30),
                Field::make( 'text', 'info_block_img_title', __( 'Title', 'kstehno' ) )
                    ->set_width(30),
                Field::make( 'text', 'info_block_title', __( 'Info block title', 'kstehno' ) )                    
                    ->set_width(50),
                Field::make( 'textarea', 'info_block_text', __( 'Info block text', 'kstehno' ) )   
                    ->set_rows(1)                 
                    ->set_width(50),
                Field::make( 'text', 'info_block_url', __( 'Button URL', 'kstehno' ) )
                    ->set_attribute( 'placeholder', 'https://ks-tehno.ru/example/' )
                    ->set_width(50),
                Field::make( 'text', 'info_block_btn_text', __( 'Button text', 'kstehno' ) )
                    ->set_attribute( 'placeholder', 'https://ks-tehno.ru/example/' )
                    ->set_width(50),
            ) )
	));