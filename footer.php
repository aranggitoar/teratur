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
		<div class="container">
			<div id="about-us">
				<div>
          <svg width="48" height="48" version="1.1" viewBox="0 0 12.7 12.7" xmlns="http://www.w3.org/2000/svg">
            <g transform="matrix(1.5 0 0 1.5 -8.3977e-7 .00032166)">
              <g transform="translate(0,-11.25)" stroke-width=".008522">
                <path d="m0.37703 13.483v4.0014h5.1531v-4.0014zm0.10995 0.12076h4.9332v3.7598h-4.9332z" fill="#fff6d5"/>
                <path d="m2.7507 13.417v4.1322h5.3389v-4.1322zm0.17904 0.19664h4.9808v3.7389h-4.9808z" fill="#ffe680"/>
              </g>
            </g>
          </svg>
					<p>Alkitab Kita memperlengkapi Anda memahami Firman Allah — seperti penerjemah Alkitab.</p>
          <div>
            <div>
              <a href="https://karunia.or.id/"><img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/dwi-pranata-atmaja.png"></a>
            </div>
            <div>
              <a href="https://benihyangbaik.com/"><img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/byb.png"></a>
            </div>
          </div>
				</div>

				<div>
					<h5>Tautan-tautan Penting</h5>
					<ul class="footer-links">
            <li><a href="<?php echo esc_attr( 'https://bibledit.org:8083' ); ?>">Alkitab Studi</a></li>
            <li><a href="<?php echo esc_attr( 'https://alkitabkita.info/wiki/petunjuk-penggunaan-bibledit' ); ?>">Petunjuk Penggunaan Bibledit</a></li>
            <li><a href="<?php echo ( !( is_user_logged_in() ) ) ? esc_attr( get_permalink( get_page_by_title( 'Kursus Alkitab Kita' ) ) ) : esc_attr( get_permalink( get_page_by_title( 'Daftar Kursus' ) ) ); ?>">Kursus Alkitab Kita</a></li>
            <li><a href="<?php echo esc_attr( get_permalink( get_page_by_title( 'Artikel Alkitabiah' ) ) ); ?>">Artikel Alkitabiah</a></li>
					</ul>
				</div>
        <div>
          <div onclick="backToTop()" class="back-to-top">Kembali ke atas?</div>
        </div>
        <script>
          function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
			</div>
		</div>
		<div class="container">
			<div id="copyright-and-social">
				<div>
					<p>Hak Cipta &copy; 2022
						<a href="https://albata.info">Yayasan Alkitab BahasaKita</a>
					</p>
				</div>

				<div>
					<ul>
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
