<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JVTravel
 */

?>
</div><!-- #page -->
<footer id="colophon" class="site-footer">
	<div class="site-footer__inner">
		<div class="site-info">
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('Theme: %1$s by %2$s.', 'jvtravel'), 'JVTravel', 'Julia Vlasova');
			?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>

</html>