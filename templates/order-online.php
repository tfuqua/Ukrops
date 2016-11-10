<?php

/* Template Name: Order Online */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero mini-hero" style="background-image: url('<?php echo $background[0] ?>');">
	        <div class="hero-text-wrapper">
	          <div>
	            <div class="hero-text">
	              <?php echo get_field('hero_heading')?>
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

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ukrops' ),
                  'after'  => '</div>',
                ));

              endwhile; // End of the loop.
              ?>
          </div>
        </div>
      </div>

      <div class="container-fluid">
  			<div class="product-list">
          <?php if(have_rows('promoted_cards')) {
            while ( have_rows('promoted_cards') ) : the_row(); ?>
              <div class="product-card-wrapper">
              	<div class="product-card">
              		<div class="product-img">
                    <?php echo wp_get_attachment_image(get_sub_field('image'), 'medium', false, array( 'class' => '')); ?>
              		</div>
              		<div class="product-section">
              			<h3><?php echo get_sub_field('heading') ?></h3>
              			<div class="blurb">
              				<?php echo get_sub_field('body') ?>
              			</div>
              		</div>
              		<div class="product-button">
                    <a class="button" href="<?php echo the_sub_field('button_link')?>">
                      <?php echo the_sub_field('button_text');?>
                    </a>
              		</div>
              	</div>
              </div>

            <?php
            endwhile;
            } ?>
        </div>
      </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
