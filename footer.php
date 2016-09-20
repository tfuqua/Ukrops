<?php
/**
 * @package ukrops
 */

?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<?dynamic_sidebar('footer');?>
				</div>
				<div class="col-md-6">
					<nav class="footer-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
					</nav><!-- footer-nav -->
				</div>
			</div>

			<?dynamic_sidebar('copyright');?>

		</div>
	</footer>
</div><!-- #content -->

<?php wp_footer(); ?>

</body>
</html>
