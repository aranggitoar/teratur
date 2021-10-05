<?php
/**
 * Template file for displaying custom main info for Alkitab Kita
 * site in a custom Tutor LMS archive-course.php template.
 *
 * @author Aranggi Toar
 * @url https://aranggitoar.com
 *
 * @package AlkitabKita/Templates
 * @version 1.0.0
 */ 

?>

<section id="tutor-index-main-info-container">
	<style>
		#site-header::after {
			width: <?php echo absint( get_theme_support( 'custom-header', 'width' ) ); ?>px;
			height: <?php echo absint( get_theme_support( 'custom-header', 'height' ) ); ?>px;
		}
	</style>
	<div id="site-header">
		<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	</div>
	<h1>Kursus Alkitab Kita</h1>
	<div id="tutor-index-main-info-blurb-container">
		<p>Kami menyediakan kursus alkitabiah yang komprehensif untuk melengkapi secara rohani dan intelektual setiap orang percaya agar dapat menyelesaikan Amanat Agung.</p>
	</div>
	<div id="tutor-index-main-info-navigation-container">
		<a class="teratur-button" href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Tentang Kursus Alkitab Kita' ) ) ); ?>"<span>Tentang</span></a>
		<a class="teratur-button" href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Kurikulum Kursus Alkitab Kita' ) ) ); ?>"<span>Kurikulum</span></a>
		<a class="teratur-button" href="#tutor-course-filter-loop-container"<span>Pilih Kursus</span></a>
	</div>
	<div id="tutor-index-main-info-description">
		<p>Gratis - Lengkap - Daring - Kursus Alkitabiah</p>
		<p>Kursus Alkitab Kita mencakup lima aspek dasar pemelajaran Alkitab, yakni (1) ajaran dasar tentang Alkitab (Bibliologi); (2) dasar ilmu penggalian maksud penulis Alkitab dalam konteks aslinya (Eksegesis); (3) prinsip-prinsip dasar ilmu penafsiran Alkitab (hermeneutika), (4) Prinsip penerjemahan Alkitab, dan (5) pelatihan praktis alat penafsiran Alkitab berbasis komputer, yakni Bibledit. Ditambah beberapa mata pelajaran . Semua kursus dipelajari sesuai keinginan Anda, sesuai jadwal Anda, tanpa batas waktu.</p>
	</div>
</section>
