<?php
/**
 * The template for displaying the footer
 * @package WordPress
 * @subpackage Geschaft Business
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<div class="container footer-content">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>

</body>
</html>