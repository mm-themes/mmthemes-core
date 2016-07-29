<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MMTheme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-content section-block text-center" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mmtheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'mmtheme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mmtheme' ), 'mmtheme', '<a href="https://kkthemes.com/" rel="designer">Kanishk Kunal</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
