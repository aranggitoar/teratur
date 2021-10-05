<?php
/**
 * TODO: Add an SVG alternative for adding the custom logo!
 * (Maybe as a plugin)
 *
 * The header for Teratur
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teratur
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'teratur' ); ?></a>


	<header id="masthead" class="site-header">
	<?php
	if ( ! is_front_page() ) :
		?>
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'common-menu',
					'menu_id'        => 'common-menu',
				)
			);
			?>
			<div id="nav-bg"></div>
			<a href="javascript:void(null);" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span></span><span></span>
			</a>
			<a href="<?php echo esc_attr( get_home_url() ); ?>">
				<svg width="48" height="48" version="1.1" viewBox="0 0 12.7 12.7" xmlns="http://www.w3.org/2000/svg">
					<g transform="matrix(1.5 0 0 1.5 -8.3977e-7 .00032166)">
						<g transform="translate(0,-11.25)" stroke-width=".008522">
							<path d="m0.37703 13.483v4.0014h5.1531v-4.0014zm0.10995 0.12076h4.9332v3.7598h-4.9332z" fill="#fff6d5"/>
							<path d="m2.7507 13.417v4.1322h5.3389v-4.1322zm0.17904 0.19664h4.9808v3.7389h-4.9808z" fill="#ffe680"/>
						</g>
					</g>
				</svg>
			</a>
		<?php
		if ( get_post_type() === 'courses' || 'lesson' ) :
			?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'special-menu',
					'menu_id'        => 'special-menu',
				)
			);
		endif;
		?>
		</nav><!-- #site-navigation -->
		<?php
	endif;
	?>
	<hr>
	</header><!-- #masthead -->
