<?php
/**
 * Teratur functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Teratur
 */

if ( ! defined( 'TERATUR_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TERATUR_VERSION', '1.1.0' );
}

if ( ! function_exists( 'teratur_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function teratur_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'teratur' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'teratur', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Add some custom image sizes for IP Tutor plugin.
		 */
		add_image_size( 'tutor-single-course-avatar', 21, 21, true );
		add_image_size( 'tutor-text-avatar', 50, 50, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'special-menu'  => esc_html__( 'Special', 'teratur' ),
				'common-menu'   => esc_html__( 'Common', 'teratur' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom header feature.
		add_theme_support(
			'custom-header',
			array(
				'default-image'      => "https://unsplash.com/photos/9BlA8vech74",
				'default-text-color' => 'fff',
				'width'              => 1000,
				'height'             => 250,
				'flex-width'         => true,
				'flex-height'        => true,
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'teratur_custom_background_args',
				array(
					'default-color' => '',
					'default-image' => 'https://unsplash.com/photos/RmNAdoJNFJs',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'teratur_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teratur_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'teratur_content_width', 640 );
}
add_action( 'after_setup_theme', 'teratur_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function teratur_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'teratur' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'teratur' ),
			'before_widget' => '<section id="teratur" class="widget teratur">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'teratur_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function teratur_scripts() {
	wp_enqueue_style( 'teratur-style', get_stylesheet_uri(), array(), TERATUR_VERSION );
	wp_style_add_data( 'teratur-style', 'rtl', 'replace' );

	wp_enqueue_script( 'teratur-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TERATUR_VERSION, true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'front-page', get_template_directory_uri() . '/js/front-page.js', array(), TERATUR_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'teratur_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Change the slugs for Tutor LMS.
 */
add_filter( 'tutor_courses_base_slug', 'alkitabkita_course_slug', 10, 0 );
add_filter( 'tutor_lesson_base_slug', 'alkitabkita_lesson_slug', 10, 0 );

function alkitabkita_course_slug()
{
	return 'kursus';
}

function alkitabkita_lesson_slug()
{
	return 'pelajaran';
}

/**
 * Deregister scripts for improved page load speed.
 */
function alkitabkita_deregister_scripts()
{
	if ( get_post_type() === 'courses' || is_front_page() ) {
		wp_deregister_script( 'bible-reader' );
		wp_dequeue_script( 'bible-reader' );
		wp_deregister_style( 'bible-reader' );
		wp_dequeue_style( 'bible-reader' );
	}
}

add_action( 'wp_enqueue_scripts', 'alkitabkita_deregister_scripts' );

/**
 * Deactivate Yoast's title configuration.
 */
add_filter('wpseo_title', '__return_empty_string');

/**
 * TODO: Localize the page title without hardcoding the title!
 *
 * Replace the name for Tutor LMS's courses post type archive page.
 */
function override_courses_post_type_archive_title($title)
{
	return 'Kursus';
}

add_filter( 'post_type_archive_title', 'override_courses_post_type_archive_title', 'courses' );

/**
 * Replace all title separator.
 */
function replace_all_title_separator($sep)
{
	return '|';
}

add_filter( 'document_title_separator', 'replace_all_title_separator' );
