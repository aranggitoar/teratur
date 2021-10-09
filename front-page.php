<?php
/**
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
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'TSI', OBJECT, 'bible-reader' ) ) ); ?>"><p>Alkitab dalam Terjemahan Sederhana</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Petunjuk Penggunaan Bibledit' ) ) ); ?>"><p>Alat Penerjemahan Alkitab</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_post_type_archive_link( 'courses' ) ); ?>"><p>Kursus Alkitab Kita</p><p>‣</p></a>
			</div>
			<div>
				<a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Artikel' ) ) ); ?>"><p>Artikel</p><p>‣</p></a>
			</div>
		</section>
	</div>

	<div id="front-page-img-container">
		<img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/gift-habeshaw-resized.jpg">
	</div>

<?php
get_footer();
