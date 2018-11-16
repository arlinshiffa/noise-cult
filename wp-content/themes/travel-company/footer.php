<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Company
 */
?>

<!-- Footer -->
<footer class="footer">
	<!-- Footer Top -->
	<?php get_template_part( 'footer-parts/footer', 'top' );?>
	<!--/ End Footer Top -->
	<!-- Footer Bottom -->
	<?php get_template_part( 'footer-parts/footer', 'bottom' );?>
	<!--/ End Footer Bottom -->
</footer>
<!--/ End footer -->

<?php wp_footer(); ?>
</body>
</html>
