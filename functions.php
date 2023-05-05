<?php
    require_once( get_template_directory().'/functions-parts/breadcrumbs.php' );
    require_once( get_template_directory().'/functions-parts/navmenu.php' );
    require_once( get_template_directory().'/functions-parts/crb_init.php' );


//Cuting excerpt for words number
function custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Add custom logo
add_theme_support( 'custom-logo' );

//Miniatures
add_theme_support('post-thumbnails');

//Register menu areas
register_nav_menus([
    'main_menu' => 'Main menu',
    'footer_menu' => 'Footer menu'
]);

//Add class for logo
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {
       $html = str_replace( 'custom-logo-link', 'header__logo_img', $html );
    return $html;
};

//Register and load CSS
function load_styles(){
	wp_enqueue_style('fontawesome', get_template_directory_uri().'/static/fontawesome/css/fontawesome.min.css');
  	wp_enqueue_style('style_min', get_template_directory_uri().'/static/css/style.min.css');
  	wp_enqueue_style('slick', get_template_directory_uri().'/static/libs/slick/slick.min.css');
  	wp_enqueue_style('slick_theme', get_template_directory_uri().'/static/libs/slick/slick-theme.min.css');

}; 
add_action('wp_enqueue_scripts', 'load_styles', 10);

//Register and load JS
function load_scripts(){  
  wp_enqueue_script('script', get_template_directory_uri() . '/static/js/script.js', array(), NULL, true);
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.4.min.js');
  wp_enqueue_script( 'jquery' , array(), NULL, true);
  wp_enqueue_script('slick', get_template_directory_uri() . '/static/libs/slick/slick.min.js', array('jquery'), NULL, true);
  //wp_enqueue_script('inits', get_template_directory_uri().'/static/js/inits.js', array('slick','masonry','maskedinput'), NULL, true);
  //wp_enqueue_script('yamap_api', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array(), NULL, true);  
  //wp_enqueue_script('map_init', get_template_directory_uri().'/static/js/map_init.js', array('yamap_api'), NULL, true); 
  wp_enqueue_script('spincrement', get_template_directory_uri().'/static/js/spincrement.min.js', array('jquery'), NULL, true); 
  //wp_enqueue_script('masonry', get_template_directory_uri().'/static/js/masonry.js', array('jquery'), NULL, true); 
  wp_enqueue_script('maskedinput', get_template_directory_uri().'/static/js/maskedinput.min.js', array('jquery'), NULL, true); 
} 
add_action('wp_enqueue_scripts', 'load_scripts', 10);