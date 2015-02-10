<?php

// LOAD THEME TEXT DOMAIN AFTER THEME SETUP
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('Nostrum_V1', get_template_directory() . '/languages');
}


// CLEAN UP THE HEAD
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra');
	remove_action('wp_head', 'feed_links');
	remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'start_post_rel_link'); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link'); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link'); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'rel_canonical');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');



// REMOVE VERSION INFO FROM HEAD AND FEEDS
function complete_version_removal() {
	return '';
}
add_filter('the_generator', 'complete_version_removal');



// ADD FAVICON
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');



// ADD EDITOR STYLES
add_editor_style('css/master.css');


// ADD THEME SUPPORT FOR POST THUMBNAILS
if (function_exists( 'add_theme_support' )) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 135, 135, true );

	add_theme_support('automatic-feed-links' );
	add_theme_support('post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'));
}



//	CHECK AND SET DEFAULT THUMBNAIL AND EMBED SIZES
if (get_option('thumbnail_size_w')!=135) 	{ update_option('thumbnail_size_w',135); }
if (get_option('thumbnail_size_h')!=135) 	{ update_option('thumbnail_size_h',135); }
if (get_option('medium_size_w')!=460) 		{ update_option('medium_size_w',460); }
if (get_option('medium_size_h')!=690) 		{ update_option('medium_size_h',690); }
if (get_option('large_size_w')!=640) 		{ update_option('large_size_w',640); }
if (get_option('large_size_h')!=960) 		{ update_option('large_size_h',960); }
if (get_option('embed_size_w')!=640) 		{ update_option('embed_size_w',640); }
if (get_option('embed_size_h')!=960) 		{ update_option('embed_size_h',960); }



// LOAD JQUERY, THEME SCRIPTS
if (!is_admin()) {
  wp_register_script(
    'mwpt-scripts',
    get_template_directory_uri() . '/scripts/mwpt-scripts.js',
    array('jquery', 'froogaloop'),
    null,
    true
  );

  wp_register_script(
    'froogaloop',
    'http://a.vimeocdn.com/js/froogaloop2.min.js',
    false,
    null,
    true
  );

  wp_enqueue_script('jquery-ui-accordion');
  wp_enqueue_script('mwpt-scripts');
}




// SET CONTENT WIDTH
if ( ! isset( $content_width ) ) $content_width = 460;




// WIDGETIZE
if (function_exists('register_sidebar')) {
	$allWidgetizedAreas = array('Blog Sidebar');
	foreach ($allWidgetizedAreas as $WidgetAreaName) {
	register_sidebar(array(
		'name' => $WidgetAreaName,
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'decription'	=> __( 'Widgets in this area will be shown between the post meta and the comments section.' ),
		));
	}
}




// REGISTER CUSTOM MENUS
function register_menus() {
	register_nav_menus(
		array(
			'global-nav' 	=> __('Global Nav'),
			'footer-column-1' => __('Footer: column 1'),
			'footer-column-2' => __('Footer: column 2'),
			'footer-column-3' => __('Footer: column 3'),
			'footer-help' => __('Footer: Phone App Help'),
		)
	);
}
add_action('init', 'register_menus');




// ADD HOME MENU IN CUSTOM MENUS
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );




// SET EXCERPT LENGTH, ELIPSE AND ALLOW FOR HTML
function mwpt_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$allowed_tags = '<p>,<a>,<em>,<strong>,<img>,<blockquote>,<cite>,<embed>,<div>,<audio>';
		$text = strip_tags($text, $allowed_tags);
		$excerpt_word_count = 30;
		$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
		$excerpt_end = '&#8230;';
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
	        $text = implode(' ', $words);
	        $text = $text . $excerpt_more;
	    } else {
	        $text = implode(' ', $words);
	    }
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mwpt_trim_excerpt');





// LOAD THE FUNCTION FILE FOR POST TYPES
get_template_part('inc/fn', 'promo-post-type');



// CREATE THEME SETTINGS PAGE
get_template_part('inc/fn', 'theme-settings');





// CUSTOM ADMIN LOGIN LOGO, URL & TITLE
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a {
		background-image: url('.get_template_directory_uri().'/images/custom-login-logo.png)!important;
		width: 267px;
		height:90px;
		margin-left: 30px; }
	</style>';
}
add_action('login_head', 'custom_login_logo');




// CUSTOM ADMIN FOOTER TEXT
function custom_admin_footer() {
	echo 'Themed by <a href="http://snapsize.com">Studio Snapsize</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');

function alphabetical_order( $query ) {
    //if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    //}
}
add_action( 'pre_get_posts', 'alphabetical_order' );

//////////////////////////////////////////////////
// Add Category Taxonomy to Pages (Andy, 04/05/2014)
/////////////////////////////////////////////////

function myplugin_settings() {  
	// Add category metabox to page
	register_taxonomy_for_object_type('category', 'page');  
}
add_action( 'init', 'myplugin_settings' );

//////////////////////////////////////////////////
// Add Doc Sidebar to show on documentation pages (Andy, 04/05/2014)
/////////////////////////////////////////////////
if (function_exists('register_sidebar')) {
	$allWidgetizedAreas = array('Doc Sidebar');
	foreach ($allWidgetizedAreas as $WidgetAreaName) {
	register_sidebar(array(
		'name' => $WidgetAreaName,
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'decription'	=> __( 'Widgets in this area will be shown between the post meta and the comments section.' ),
		));
	}
}

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<div class="container_12 group"><div class="grid_6 prefix_3 suffix_3 xtra-spacey"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "Hi there. This is a protected post.<br/><br/>Please, enter your personal password: " ) . '<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><br/><br/><input type="submit" name="Submit" value="' . esc_attr__( "Show me the post" ) . '" />
    </form></div></div>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );


?>
