<?php
/**
 * TODO: Give user the ability to choose which page to display in the
 * front page.
 * 
 * The front page for Teratur
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teratur
 */

get_header();
get_template_part( 'wp-load.php' );
?>

	<div id="front-page-card">
		<section>
			<h1>alkitabkita.info</h1>
			<h2><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
		</section>
		<section>
			<div>
				<a href="<?php echo esc_attr( 'https://bibledit.org:8083' ); ?>"><p>Alkitab Studi</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( 'https://alkitabkita.info/wiki/petunjuk-penggunaan-bibledit/' ); ?>"><p>Petunjuk Penggunaan Bibledit</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Kursus Alkitab Kita' ) ) ); ?>"><p>Kursus Alkitab Kita</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Artikel Alkitabiah' ) ) ); ?>"><p>Artikel Alkitabiah</p><p>‣</p></a>
			</div>
		</section>
	</div>

	<div id="front-page-img-container">
		<img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/woman-opening-bibledit-in-her-living-room-2.jpg">
	</div>

<?php
get_footer();
