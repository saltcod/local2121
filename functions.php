<?php
/**
 * waterstreet functions and definitions
 *
 * @package waterstreet
 * @since waterstreet 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since waterstreet 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'waterstreet_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since waterstreet 1.0
 */
function waterstreet_setup() {

	/* Custom template tags for this theme. */
	require( get_template_directory() . '/inc/template-tags.php' );

	add_theme_support( 'automatic-feed-links' );
	 
	add_theme_support( 'post-thumbnails' );
 
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'waterstreet' ),
	) );

}
endif; // waterstreet_setup
add_action( 'after_setup_theme', 'waterstreet_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since waterstreet 1.0
 */
function waterstreet_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'waterstreet' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'waterstreet_widgets_init' );










/**
 * Enqueue scripts and styles
 */
function waterstreet_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_register_script( 'scripts', get_template_directory_uri() .'/js/scripts.js', array('jquery'));
    wp_enqueue_script( 'scripts' );

	wp_register_script( 'backstretch', get_template_directory_uri() .'/js/jquery.backstretch.min.js', array('jquery'));
    wp_enqueue_script( 'backstretch' );
	 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'waterstreet_scripts' );


/**
 * Load some admin css
 *
 * @since 0.1
 */



/**
 * Register the 'Guides' post type
 *
 */

register_post_type(
	'questions',
	array(
		'label' => 'Questions',
		'description' => '',
		'public' => true,
		'menu_icon' => get_bloginfo( 'template_directory' ) . '/images/question-icon.png',
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'rewrite' => array( 'slug' => '' ),
		'query_var' => true,
		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes', 'revisions', 'comments' ),
		'labels' => array (
			'name' => 'Questions',
			'singular_name' => 'Question',
			'menu_name' => 'Questions',
			'add_new' => 'Add question',
			'add_new_item' => 'Add new question',
			'edit' => 'Edit',
			'edit_item' => 'Edit question',
			'new_item' => 'New question',
			'view' => 'View question',
			'view_item' => 'View question',
			'search_items' => 'Search Questions',
			'not_found' => 'No Questions Found',
			'not_found_in_trash' => 'No Questions Found in Trash',
			'parent' => 'Parent question',
		), ) );


/**
 * Print out the current template file to the footer. 
 * Obviously to be removed in production
 *
 * @since 0.1
 */

function waterstreet_show_template() {
	if ( is_super_admin() ){
		global $template;
		echo '<strong>Template file:</strong>';
	 	print_r($template);
	 }
}
add_action('wp_footer', 'waterstreet_show_template');




 /**
 * Remove the Excerpt meta box from the Events post type
 *
 * @since 0.1
 *
 */

function holyheart_remove_excerpt_metabox() {
 remove_meta_box( 'postexcerpt','tribe_events','normal' );
 remove_meta_box( 'postcustom','tribe_events','normal' );
 remove_meta_box( 'authordiv','tribe_events','normal' );
 }
 add_action('admin_menu','holyheart_remove_excerpt_metabox');






 /**
 * Include the page slug in the body class attribute.
 *
 * @since 0.1
 *
 */

function waterstreet_better_body_classes( $classes ){
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
	add_filter('body_class', 'waterstreet_better_body_classes');



/**
 * Add slug to menu li classes
 *
 * @since 0.1
 */

function waterstreet_add_slug_class_to_menu_item($output){
	$ps = get_option('permalink_structure');
	if(!empty($ps)){
		$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);
		foreach($matches[1] as $mid){
			$id = get_post_meta($mid, '_menu_item_object_id', true);
			$slug = basename(get_permalink($id));
			$output = preg_replace('/menu-item-'.$mid.'">/', 'menu-item-'.$mid.' menu-item-'.$slug.'">', $output, 1);
		}
	}
	return $output;
}
add_filter('wp_nav_menu', 'waterstreet_add_slug_class_to_menu_item');


 