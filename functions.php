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
	define( 'TERATUR_VERSION', '1.1.7' );
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
				'special-logged-out-menu'  => esc_html__( 'Special Logged Out', 'teratur' ),
				'special-logged-in-menu'  => esc_html__( 'Special Logged In', 'teratur' ),
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
				'width'              => 600,
				'height'             => 600,
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

	wp_enqueue_script( 'teratur-better-vh', get_template_directory_uri() . '/js/better-vh.js', array(), TERATUR_VERSION, true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'teratur-front-page', get_template_directory_uri() . '/js/front-page.js', array(), TERATUR_VERSION, true );
	}

  if ( get_the_title() === 'Kursus Alkitab Kita' ) {
		wp_enqueue_script( 'teratur-course-landing-page', get_template_directory_uri() . '/js/course-landing-page.js', array(), TERATUR_VERSION, true );
  }

  if ( is_search() ) {
		wp_enqueue_script( 'teratur-search-result-page', get_template_directory_uri() . '/js/search-result-page.js', array(), TERATUR_VERSION, true );
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
	if ( ! ( get_post_type() === 'bible-reader' ) ) {
		wp_deregister_script( 'bible-reader' );
		wp_dequeue_script( 'bible-reader' );
		wp_deregister_style( 'bible-reader' );
		wp_dequeue_style( 'bible-reader' );
	}

	if ( ! ( ( get_post_type() === 'courses' ) || ( get_post_type() === 'lesson' ) || ( get_post_type() === 'kursus' ) || ( get_post_type() === 'pelajaran' ) || ( get_the_title() === 'Kursus Alkitab Kita' ) || ( get_the_title() === 'Daftar Kursus Alkitab Kita' ) ) ) {
		wp_deregister_style( 'tutor-frontend' );
		wp_dequeue_style( 'tutor-frontend' );
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

/**
 * Remove a couple of TutorLMS Dashboard items.
 */
function remove_links_from_tutor_dashboard($links)
{
	unset($links['index']);
  unset($links['wishlist']);
	unset($links['reviews']);
  unset($links['purchase_history']);
	return $links;
}
add_filter('tutor_dashboard/nav_items', 'remove_links_from_tutor_dashboard');

/**
 * Page redirections.
 */
function page_redirection() {

  if ( isset( $_SERVER['HTTPS'] ) &&
    ( $_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1 ) ||
    isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) {
      $protocol = 'https://';
  }
  else {
    $protocol = 'http://';
  }

  $currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $currenturl_relative = wp_make_link_relative($currenturl);

  switch ( $currenturl_relative ) {
    case '/dashboard/':
    $urlto = home_url('/dashboard/enrolled-courses/');
    break;

    default:
    return;
  }

  if ( $currenturl != $urlto )
  exit( wp_redirect( $urlto ) );

}
add_action( 'template_redirect', 'page_redirection' );

/**
 * Limit, change number of posts in archive pages
 */
add_filter( 'pre_get_posts', 'posts_archive_limit_change' );
function posts_archive_limit_change($query){
    if ( $query->is_archive || $query->is_category ) {
        $query->set('posts_per_page', 6);
    }
    return $query;
}


/**
 * Ganti email pengirim, nama pengirim, teks subyek, dan isi email
 * pendaftaran.
 */
add_filter( 'wp_mail_from', 'sender_email' );
function sender_email($old) {
  return 'admin@alkitabkita.info';
}

add_filter( 'wp_mail_from_name', 'sender_name' );
function sender_name($old) {
  return 'Alkitab Kita';
}

add_filter( 'wp_new_user_notification_email', 'account_activation_message', 10, 4 );
function account_activation_message($email, $user, $blogname) {

  parse_str( $email['message'], $variables);

  if ( $user->has_prop( 'user_login' ) ) $user_login = $user->get( 'user_login' );
  if ( $user->has_prop( 'user_email' ) ) $user_email = $user->get( 'user_email' );

  /* $email['to'] = $user_email; */
  	function weekday_localization ($D_of_date_func)
	{
		if ($D_of_date_func === "Mon") return "Senin";
		if ($D_of_date_func === "Tue") return "Selasa";
		if ($D_of_date_func === "Wed") return "Rabu";
		if ($D_of_date_func === "Thu") return "Kamis";
		if ($D_of_date_func === "Fri") return "Jumat";
		if ($D_of_date_func === "Sat") return "Sabtu";
		if ($D_of_date_func === "Sun") return "Minggu";
	}

	function month_localization ($M_of_date_func)
	{
		if ($M_of_date_func === "Jan") return "Januari";
		if ($M_of_date_func === "Feb") return "Februari";
		if ($M_of_date_func === "Mar") return "Maret";
		if ($M_of_date_func === "Apr") return "April";
		if ($M_of_date_func === "May") return "Mei";
		if ($M_of_date_func === "Jun" || $M_of_date_func === "June") return "Juni";
		if ($M_of_date_func === "Jul" || $M_of_date_func === "July") return "Juli";
		if ($M_of_date_func === "Aug") return "Agustus";
		if ($M_of_date_func === "Sep" || $M_of_date_func === "Sept") return "September";
		if ($M_of_date_func === "Oct") return "Oktober";
		if ($M_of_date_func === "Nov") return "November";
		if ($M_of_date_func === "Des") return "Desember";
	}

	$localized_weekday = date('D');
	$localized_weekday = weekday_localization($localized_weekday);
	$localized_month = date('M');
	$localized_month = month_localization($localized_month);

	$sent_date = $localized_weekday.", ".date('d')." ".$localized_month." ".date('Y');

  $email['subject'] = "Anda telah terdaftar!";
  $email['message'] = "
			<div style='width: 100%; height: 100%; margin: 0; font: 500 18.4px Garamond, serif; letter-spacing: .015ch; word-spacing: .05ch; color: #333;'>
				<span style='display: none !important; opacity: 0 !important; font-size: 0px !important; line-height: 0px !important; max-height: 0px !important; max-width: 0px !important; overflow: hidden !important; visibility: hidden !important;'>
					Anda tidak akan menyesal mendaftar di Alkitab Kita!
				</span>

        <div style='font-style: italic; padding-top: 8px;'>
					<div style='width: 100%; max-width: 750px; padding: 0 1rem; margin: 0 auto;'>
						<div style='width: 100%; margin-top: 1rem;'>
              <svg width='48' height='48' version='1.1' viewBox='0 0 12.7 12.7' xmlns='http://www.w3.org/2000/svg'>
                <g transform='matrix(1.5 0 0 1.5 -8.3977e-7 .00032166)'>
                  <g transform='translate(0,-11.25)' stroke-width='.008522'>
                    <path d='m0.37703 13.483v4.0014h5.1531v-4.0014zm0.10995 0.12076h4.9332v3.7598h-4.9332z' fill='#fff6d5'/>
                    <path d='m2.7507 13.417v4.1322h5.3389v-4.1322zm0.17904 0.19664h4.9808v3.7389h-4.9808z' fill='#ffe680'/>
                  </g>
                </g>
              </svg>
						</div>
						<div style='display: inline-block; width: 45%;'>
							<p>Kepada:</p>
							<p>".$user_login."</p>
						</div>
						<div style='display: inline-block; width: 45%; text-align: right;'>
							<p>".$sent_date."</p>
						</div>
					</div>
				</div>
				<div style='background-color: #fff; border-top: 1px solid #333; border-bottom: 1px solid #333;'>
					<div style='width: 100%; max-width: 750px; padding: 0 1rem; margin: 0 auto;'>
						<h1 style='text-align: center; font-size: 40px; font-weight: 800; padding: 1rem 0 .5rem;'>Selamat bergabung!</h1>

							<p>Salam ".$user_login."</p>
              <p>Untuk mengaktifkan akun Anda, silahkan <a style='color: #4976FF;' href='https://alkitabkita.info/wp-login.php?action=rp&key=".$variables['key']."&login=".$user_login."'>klik tautan ini</a>.</p>
              <p>Setelah Anda mengaktifkannya Anda dapat masuk melalui <a style='color: #4976FF;' href='https://alkitabkita.info/wp-login.php'>tautan ini</a>.</p>
							<p>Demikian yang dapat kami sampaikan. Terima kasih.</p>

						<p style='width: 100%; padding: .5rem 0 1rem; text-align: right;'>
							Dengan hormat,<br>
							<em>Alkitab Kita<br>
								<a style='color: #4976FF;' href='https://alkitabkita.info'>
									alkitabkita.info
								</a>
							</em>
						</p>
					</div>
        </div>
      </div>";

  return $email;
}
