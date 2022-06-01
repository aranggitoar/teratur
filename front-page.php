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
				<a href="<?php echo esc_attr( 'https://bibledit.org:8083' ); ?>" target="new"><p>Alkitab Studi</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( 'https://alkitabkita.info/wiki/petunjuk-penggunaan-bibledit/' ); ?>" target="_blank"><p>Petunjuk Penggunaan Bibledit</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo ( !( is_user_logged_in() ) ) ? esc_attr( get_permalink( get_page_by_title( 'Kursus Alkitab Kita' ) ) ) : esc_attr( get_permalink( get_page_by_title( 'Daftar Kursus' ) ) ); ?>"><p>Kursus Alkitab Kita</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Artikel Alkitabiah' ) ) ); ?>"><p>Artikel Alkitabiah</p><p>‣</p></a>
			</div>
		</section>
	</div>

	<div id="front-page-img-container">
		<img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/woman-studying-in-her-living-room.jpg">
	</div>

<?php
get_footer();
