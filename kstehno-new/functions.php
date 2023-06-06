<?php
/**
 * kstehno functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kstehno
 */



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kstehno_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kstehno_content_width', 640 );
}
add_action( 'after_setup_theme', 'kstehno_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kstehno_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kstehno' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kstehno' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kstehno_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kstehno_scripts() {
	wp_enqueue_style( 'kstehno-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kstehno-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kstehno-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kstehno_scripts' );