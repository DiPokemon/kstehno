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
            ) ),

        Field::make( 'complex', 'advantages',  __('Advantages', 'kstehno') )
            ->add_fields( 'advantages_items', __('Advantages items', 'kstehno'), array(
                Field::make( 'text', 'advantage_icon', __( 'Icons code', 'kstehno' ) )
                    ->set_attribute( 'placeholder', '<i class="fa-brands fa-whatsapp"></i>' )
                    ->set_width(50),
                Field::make( 'text', 'advantage_text', __( 'Text', 'kstehno' ) )
                    ->set_width(50),                
            ) ),

        
        Field::make( 'text', 'main_categories_title', __( 'Categories title', 'kstehno' ) )                    
            ->set_width(25),
        Field::make( 'text', 'main_info_title', __( 'Info block title', 'kstehno' ) )                    
            ->set_width(25),
        Field::make( 'text', 'main_advantages_title', __( 'Advantages title', 'kstehno' ) )                    
            ->set_width(25),
        Field::make( 'text', 'main_testimonials_title', __( 'Testimonials title', 'kstehno' ) )                    
            ->set_width(25),

        Field::make( 'text', 'main_opt_title', __( 'Opt title', 'kstehno' ) )                    
            ->set_width(30),
        Field::make( 'image', 'main_opt_image', __( 'Image', 'kstehno' ) )
            ->set_value_type( 'url' )                        
            ->set_width(30),        
        Field::make( 'text', 'main_opt_subtitle', __( 'Info block title', 'kstehno' ) )                    
            ->set_width(40),
        Field::make( 'textarea', 'main_opt_text', __( 'Info block title', 'kstehno' ) )
	));

Container::make( 'post_meta', __( 'Page fields', 'kstehno' ) )
    ->show_on_template('page.php')
    ->add_fields(array(
		Field::make( 'complex', 'page_images',  __('Page images', 'kstehno') )
            ->add_fields( 'page_image', __('Page image', 'kstehno'), array(
                Field::make( 'image', 'page_image_img', __( 'Page image', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(30),
                Field::make( 'text', 'page_image_alt', __( 'Alt', 'kstehno' ) )
                    ->set_width(35),
                Field::make( 'text', 'page_image_title', __( 'Title', 'kstehno' ) )
                    ->set_width(35)
            ) ),
	));

Container::make( 'post_meta', __( 'About page fields', 'kstehno' ) )
    ->show_on_template('about.php')
    ->add_fields(array(
        Field::make( 'rich_text', 'about_additional_content', __( 'Additional text', 'kstehno' ) ),
        Field::make( 'association', 'about_category', __( 'Categories', 'kstehno' ) )
            ->set_max( 8 )
            ->set_types( array(
                array(
                    'type'      => 'term',
                    'taxonomy' => 'product_cat',
                )
            ) ),
        Field::make( 'complex', 'about_icons',  __('About icons', 'kstehno') )
            ->add_fields( 'about_icons_items', __('About_icons', 'kstehno'), array(
                Field::make( 'text', 'about_icon', __( 'Icon code', 'kstehno' ) )
                    ->set_attribute( 'placeholder', '<i class="fa-brands fa-whatsapp"></i>' )
                    ->set_width(50),
                Field::make( 'text', 'about_icon_text', __( 'Text', 'kstehno' ) )
                    ->set_width(50),                
            ) )
	));

Container::make( 'post_meta', __( 'Opt page fields', 'kstehno' ) )
    ->show_on_template('opt.php')
    ->add_fields(array(        
        Field::make( 'complex', 'opt_images',  __('Opt images', 'kstehno') )
            ->add_fields( 'opt_images_items', __('Opt images', 'kstehno'), array(
                Field::make( 'image', 'opt_image', __( 'Image', 'kstehno' ) )
                    ->set_value_type( 'url' )
                    ->set_width(30),
                Field::make( 'text', 'opt_image_alt', __( 'Alt', 'kstehno' ) )
                    ->set_width(35),
                Field::make( 'text', 'opt_image_title', __( 'Title', 'kstehno' ) )
                    ->set_width(35)              
            ) )     
	));

Container::make( 'post_meta', __( 'Buy and delivery fields', 'kstehno' ) )
    ->show_on_template('buy_delivery.php')
    ->add_fields(array(
        Field::make( 'complex', 'buy_icons',  __('Opt icons', 'kstehno') )
            ->add_fields( 'buy_icons_items', __('buy_icons', 'kstehno'), array(
                Field::make( 'text', 'buy_icon', __( 'Icon code', 'kstehno' ) )
                    ->set_attribute( 'placeholder', '<i class="fa-brands fa-whatsapp"></i>' )
                    ->set_width(50),
                Field::make( 'text', 'buy_icon_text', __( 'Text', 'kstehno' ) )
                    ->set_width(50),                
            ) ),
        Field::make( 'complex', 'buy_texts',  __('Buy texts', 'kstehno') )
            ->add_fields( 'buy_texts', __('Buy text item', 'kstehno'), array(
                Field::make( 'textarea', 'buy_text', __( 'Text', 'kstehno' ) )                              
            ) ), 
        Field::make( 'rich_text', 'buy_additional_text', __( 'Additional text', 'kstehno' ) ),          
	));

Container::make( 'post_meta', __( 'City page fields', 'kstehno' ) )
    ->show_on_template('city.php')
    ->add_fields(array(   
        Field::make( 'text', 'city_name', __( 'City name', 'kstehno' ) ),    
        Field::make( 'rich_text', 'city_delivery_text', __( 'Delivery text', 'kstehno' ) ),   
        Field::make( 'rich_text', 'city_delivery_text_two', __( 'Delivery text two', 'kstehno' ) ),        
	));
