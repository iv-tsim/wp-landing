<?php

define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'THEME_PATH', get_stylesheet_directory() );
define( 'SITE_URL', get_home_url() );

function clearPhoneNumber($phone) {

	$drop_array = array('-', ' ', '/', ',', '()', '(', ')', '  ', '<span>', '</span>');
	return str_replace($drop_array, "", $phone);
	
}

function addZero($number) {

	if ($number < 10) {

		$number = 0 . $number;

	}

	return $number;

}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 200, true );

add_action('wp_enqueue_scripts', function () {
    global $styles_array;
    global $scripts_array;

    wp_register_style('site', THEME_URL . '/css/style.css', $styles_array, '14', 'all');
    wp_enqueue_style('site');

    wp_register_script('site', THEME_URL . '/js/main.js', $scripts_array, '6', true);
    wp_enqueue_script('site');
    wp_localize_script('site', 'ajax', array('url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('nonce')));
});

add_filter('admin_footer_text', function () {
    echo 'Developed by Ivan Tsimbalist';
});

add_action('wp_dashboard_setup', function () {

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    wp_add_dashboard_widget('dashboard_widget', 'Wordpress programmer', function () {
        echo 'Developed by Ivan Tsimbalist';
    });

});

add_action( 'widgets_init', 'widgets_init' );
function widgets_init() {

	register_sidebar( array(
		'name' => 'Widget 1',
		'id' => 'widget-1',
		'description' => 'Widget 1',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar( array(
		'name' => 'Widget 2',
		'id' => 'widget-2',
		'description' => 'Widget 2',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

}

register_nav_menus( array(
	'menu-1' => 'Menu 1',
	'menu-2' => 'Menu 2',
	'menu-3' => 'Menu 3',
	'menu-4' => 'Menu 4',
	'menu-5' => 'Menu 5'
));

function admin_menu() {
	remove_menu_page( 'edit-comments.php' );
}

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'feed_links_extra', 3 );


function get_filename() {
	$array = debug_backtrace();
	$file = basename( $array[0]['file'] );
	echo '<!-- ' . $file . ' -->' . "\n";
}

add_filter( 'body_class', 'browser_body_class' );
function browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if ( $is_lynx ) $classes[] = 'lynx';
	if ( $is_gecko ) $classes[] = 'gecko';
	if ( $is_opera ) $classes[] = 'opera';
	if ( $is_NS4 ) $classes[] = 'ns4';
	if ( $is_safari ) $classes[] = 'safari';
	if ( $is_chrome ) $classes[] = 'chrome';
	if ( $is_IE ) $classes[] = 'ie';
	if ( wp_is_mobile() ) $classes[] = 'mobile';
	if( $is_iphone ) $classes[] = 'iphone';

	return $classes;
}

add_filter( 'post_class', 'post_classes' );
function post_classes( $classes ) {
   global $wp_query;

   if ( $wp_query->found_posts < 1 ) return $classes;
   if ( $wp_query->current_post == 0 ) $classes[] = 'post-first';
   if ( $wp_query->current_post == ( $wp_query->post_count - 1 ) ) $classes[] = 'post-last';
   $classes[] = ( $wp_query->current_post + 1 ) % 2 ? 'post-notsecond' : 'post-second';
   $classes[] = ( $wp_query->current_post + 1 ) % 3 ? 'post-notthird' : 'post-third';
   $classes[] = ( $wp_query->current_post + 1 ) % 4 ? 'post-notfourth' : 'post-fourth';
   $classes[] = ( $wp_query->current_post + 1 ) % 5 ? 'post-notfifth' : 'post-fifth';
   return $classes;
}

function my_request( $request ) {
    $dummy_query = new WP_Query();
    $dummy_query->parse_query( $request );

    if ( $dummy_query->is_archive() ) {
        $request['posts_per_page'] = 1;
    }

    return $request;
}
add_filter( 'request', 'my_request' );