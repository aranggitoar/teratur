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
			<h2>Memperlengkapi Anda memahami Alkitab<br>— seperti penerjemah Alkitab.</h2>
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

<?php
get_footer();
