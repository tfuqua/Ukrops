<?php

/* Template Name: Community */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero hero-dark" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $background[0] ?>');">
	        <div class="hero-text-wrapper">
	          <div>
	            <div class="hero-heading">
	              <?php echo get_field('hero_heading')?>
	            </div>
							<div class="hero-body">
								<?php echo get_field('hero_body')?>
							</div>
	          </div>
	        </div>
	      </div>
	    <?php
			}?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 col-md-push-1">
              <?php
              while ( have_posts() ) : the_post();
                the_content();
              endwhile; // End of the loop.
              ?>
          </div>
        </div>
      </div>

			<div class="full-width-content">
				<?php echo get_field('full_width_content');?>
			</div>

			<div class="community-events">
					<div class="text-center container-fluid">
						<h2>Community Events Sponsored By Ukrop's</h2>
					</div>

				<!-- Featured Content -->
					<?php
					if( have_rows('community_events') ) { ?>
						<div class="featured-content-wrapper">
							<div class="featured-items">
								<?php while ( have_rows('community_events') ) : the_row(); ?>
										<div class="featured-item">
											<?php
												$background = wp_get_attachment_image_src(get_sub_field('image'), 'full', false);
											?>
											<div class="img-wrapper" style="background-image: url('<?php echo $background[0] ?>');">
											</div>
											<div class="featured-section">
												<h3><?php echo the_sub_field('header');?></h3>
												<div class="featured-body">
													<?php echo the_sub_field('body');?>
												</div>
												<div class="featured-button">
													<a href="<?php echo the_sub_field('button_link')?>">
														<?php echo the_sub_field('button_text');?>
													</a>
												</div>
											</div>

										</div>
								<?php endwhile; ?>
							</div>
						</div>
						<?php } ?>
				</div>

			<div class="community-partners">
					<div class="container-fluid">
						<h3 class="text-center">Community Partners</h3>

						<div class="partner-imgs">
							<?php if(have_rows('community_partners')) {
								while ( have_rows('community_partners') ) : the_row();?>
									<div class="partner-img">
										<?php echo wp_get_attachment_image(get_sub_field('image'), 'medium', false, array( 'class' => '')); ?>
									</div>
								<?php
								endwhile;
							} ?>
						</div>
					</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
