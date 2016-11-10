<?php

/* Template Name: Ukrop's Story */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero hero-dark our-story" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $background[0] ?>');">
	        <div class="container-fluid">
								<div class="hero-heading">
									<?php echo get_field('hero_heading')?>
								</div>
								<div class="hero-body">
									<?php echo get_field('hero_body')?>
								</div>
								<div class="hero-button">
									<a href="#" id="video-toggle" class="button">Watch The Video</a>
								</div>
	        </div>
	      </div>
	    <?php
			}?>

			<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" id="video-close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">The Ukrop's Story</h4>
						</div>
						<div class="modal-body">
							<div>
								<iframe width="100%" src="<?php echo get_field('video_url')?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-push-2">
              <?php
              while ( have_posts() ) : the_post();

                the_content();

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ukrops' ),
                  'after'  => '</div>',
                ));

              endwhile; // End of the loop.
              ?>
          </div>
        </div>
      </div>

			<div class="ukrops-family">
					<h2 class="text-center">
							<span>The Ukrop's Family</span>
					</h2>

					<!-- Branding -->
          <div class="container-fluid">
			    	<?php
			      if( have_rows('brands')) { ?>
			        <div class="brands">
			            <?php while (have_rows('brands')) : the_row(); ?>
			                <div class="brand-item">
													<div class="brand-img">
														<?php if (get_sub_field('image') != '') {
														echo wp_get_attachment_image(get_sub_field('image'), 'full', false, array( 'class' => '') );
														}?>
													</div>
													<div class="brand-content">
															<?php echo get_sub_field('brand_content');?>
													</div>
													<div>
														<a href="<?php echo get_sub_field('brand_link');?>">Continue Reading &#xbb;</a>
													</div>
											</div>
			            <?php endwhile; ?>
			        </div>
							<?php }?>
	          </div>

						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6">
									<?php echo wp_get_attachment_image(get_field('image'), 'full', false, array( 'class' => 'img-responsive') );?>
								</div>
								<div class="col-md-6">
									<h3><?php echo get_field('heading');?></h3>
									<div class="">
										<?php echo get_field('body');?>
									</div>
									<a class="button" href="<?php echo get_field('button_link') ?>">
										<?php echo get_field('button_text');?>
									</a>
								</div>
							</div>
						</div>
			</div>


			<!-- Hero Image 2 -->
	    <?php if(get_field('hero_image_2')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image_2'), 'full', false); ?>
		     <div class="hero hero-dark bottom" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $background[0] ?>');">
	        <div class="hero-text-wrapper">
	          <div>
							<div class="hero-body">
								<?php echo get_field('hero_body')?>
							</div>
							<div class="hero-button">
								<a class="button" href="<?php echo get_field('hero_button_link') ?>">
									<?php echo get_field('hero_button_text');?>
								</a>
							</div>
	          </div>
	        </div>
	      </div>
	    <?php
			}?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
