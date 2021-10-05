<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Teratur
 */

if ( ! is_front_page() ) {
	?>

	<footer id="colophon" class="site-footer">
		<hr>
		<div class="container">
			<div class="row">
				<div>
					<h5>Tentang Kami</h5>
					<p>Alkitab Kita adalah suatu pelayanan daring interdenominasional yang didukung dan diluncurkan oleh Yayasan Alkitab Bahasa Kita (Albata). Alkitab Kita hadir untuk memperlengkapi setiap anggota Tubuh Kristus memahami, menafsirkan dan mengajar Firman Tuhan di mana saja, kapan saja, bagaikan penerjemah Alkitab.</p>
					<p>Kami berharap untuk melakukan itu lewat menyediakan: (1) materi berupa kursus dan artikel, (2) pendidikan Kristen yang alkitabiah, berkualitas, dan gratis, serta (3) akses kepada alat-alat penyelidikan Alkitab.</p> 
				</div>

				<div>
					<h5>Tautan-tautan Penting</h5>
					<ul class="footer-links">
						<li><a href="https://alkitabkita.info">Beranda</a></li>
						<li><a href="https://alkitabkita.info/tentang-kami">Tentang Kami</a></li>
						<li><a href="https://alkitabkita.info/alkitab/tsi">Baca TSI</a></li>
						<li><a href="https://alkitabkita.info/petunjuk-penggunaan-bibledit">Petunjuk Penggunaan Bibledit</a></li>
						<li><a href="https://alkitabkita.info/kursus">Kursus Alkitab Kita</a></li>
						<li><a href="https://alkitabkita.info/artikel">Artikel</a></li>
						<li><a href="https://alkitabkita.info/peta-situs">Peta Situs</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div>
					<p class="copyright-text">Hak Cipta &copy; 2021
						<a href="https://albata.info">Yayasan Alkitab BahasaKita</a>
					</p>
				</div>

				<div>
					<ul class="social-icons">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
					</ul>
				</div>
			</div>
		</div>
</footer>
	<?php
};
wp_footer();
?>

</body>
</html>
