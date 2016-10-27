<?php
/**
 * @package ukrops
 */

?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="footer-wrapper">
			<div class="container-fluid">
				<div class="row footer-content">
					<div class="col-md-5 col-lg-4">
						<?php dynamic_sidebar('footer');?>
					</div>
					<div class="col-md-7 col-lg-8 footer-nav">
						<nav class="footer-navigation" role="navigation">
							<?php
								$args = array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' );
		         		switch_to_blog(1);
		         		wp_nav_menu( $args );
		         		restore_current_blog();
							?>
						</nav><!-- footer-nav -->
					</div>
				</div>

				<?php dynamic_sidebar('copyright');?>
			</div>
		</div>
	</footer>
</div><!-- #content -->

<?php wp_footer(); ?>

</body>
</html>
