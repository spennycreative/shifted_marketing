<?php
/** functions * @package shifted_marketing */

if ( ! function_exists( 'shifted_marketing_setup' ) ) :

	function shifted_marketing_setup() {

		load_theme_textdomain( 'shifted_marketing', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shifted_marketing' ),
			'footer-menu' => esc_html__( 'footer-menu', 'shifted_marketing' ),
		) );

		//  Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shifted_marketing_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//  Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shifted_marketing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shifted_marketing_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shifted_marketing_content_width', 640 );
}
add_action( 'after_setup_theme', 'shifted_marketing_content_width', 0 );

/**
 * Register widget area.
 */
function shifted_marketing_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shifted_marketing' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shifted_marketing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Secondary', 'shifted_marketing' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'shifted_marketing' ),
		'before_widget' => '<section id="%2$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shifted_marketing_widgets_init' );

//// START / Shifted Marketing Custom Functions

 //SVG Support
 add_action('upload_mimes', 'add_file_types_to_uploads');
 function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}

// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'shifted_marketing_scripts' );
function shifted_marketing_scripts() {
	wp_register_script('jquery', 'wp-includes/js/jquery/jquery.js', false, '1.12.4', true);
	wp_register_script('jquery-migrate', 'wp-includes/js/jquery/jquery-migrate.min.js', false, '1.12.4', true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-migrate');
	// wp_engueue_script('mobile-selects', get_template_directory_URI() . '/js/mobile-selects.js', false);
	wp_enqueue_style( 'critical-styles', get_template_directory_uri() . '/assets/styles/critical-styles.css', null);
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/styles/style.css', null);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// adding theme options page
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	if( function_exists('acf_add_options_page') ) {
		$option_page = acf_add_options_page(array(
			'page_title' 	=> __('Theme General Settings'),
			'menu_title' 	=> __('Theme Settings'),
			'icon_url'   => 'dashicons-admin-site',
			'menu_slug' 	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' => false,
		));

		$option_page = acf_add_options_page(array(
			'page_title'	=> __('Theme Header Settings'),
			'menu_title'	=> __('Header Settings'),
			'menu_slug'		=> 'header-settings',
			'parent_slug'	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' => false,
		));

		$option_page = acf_add_options_page(array(
			'page_title'	=> __('Theme Footer Settings'),
			'menu_title'	=> __('Footer Settings'),
			'menu_slug'		=> 'footer-settings',
			'parent_slug'	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' => false,
		));

		$option_page = acf_add_options_page(array(
			'page_title'	=> __('Theme Blog Settings'),
			'menu_title'	=> __('Blog Settings'),
			'menu_slug'		=> 'blog-settings',
			'parent_slug'	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' => false,
		));

		$option_page = acf_add_options_page(array(
			'page_title'	=> __('Theme API Settings'),
			'menu_title'	=> __('API Settings'),
			'menu_slug'		=> 'api-settings',
			'parent_slug'	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' => false,
		));
	}
}

// read more 
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
function wpdocs_excerpt_more( $more ) {
    return '... ';
}

// Declaring Woo-commerce Theme suppport.
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Filter the except length to 20 words.
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}


//removing the extra div around the nav menu
function my_wp_nav_menu_args($args = '') {
	$args['container'] = false;
	return $args;
}

//// END / Shifted Marketing Custom Functions


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';


// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';


// Customizer additions.
require get_template_directory() . '/inc/customizer.php';


// Load Jetpack compatibility file.
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }



