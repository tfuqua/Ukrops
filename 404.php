<?php
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
			$background =  get_template_directory_uri() . '/images/404.jpg';
			?>
	     <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
        <div class="hero-text-wrapper">
          <div>
            <div class="hero-text">
            	404 Page Not Found
            </div>
          </div>
        </div>
      </div>


		<div class="container-fluid not-found">
			<h2>
				We’re sorry, the page you were looking for could not be found.
			</h2>
			<div>
				Please visit the homepage to try again. <br /><br />
				<a class="link" href="<?php echo site_url() ?>">
					&#xab; Return Home
				</a>
			</div>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
