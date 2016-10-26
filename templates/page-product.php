<?php

/* Template Name: Product Page */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero product-hero" style="background-image: url('<?php echo $background[0] ?>');">
	         <div class="hero-text-wrapper">
	           <div>
	             <div class="hero-text">
								 <h3><?php echo get_field('hero_header')?></h3>
	               <?php echo get_field('hero_text')?>
	               <?php if(get_field('button_text')) { ?>
		               <div class="hero-button">
		                 <a href="#"><?php echo get_field('button_text')?></a>
		               </div>
	               <?php } ?>
	             </div>
	           </div>
	         </div>
	      </div>
	    <?php } ?>


      <div class="container-fluid product-content">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
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

      <!-- Hero Image -->
	    <?php if(get_field('hero_image_2')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image_2'), 'full', false); ?>
		     <div class="hero product-hero-dark" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $background[0] ?>');">
	         <div class="hero-text-wrapper">
	           <div>
	             <div class="hero-text">
                 <div class="quote">
                   <?php echo get_field('hero_text_2')?>
                 </div>
                 <div class="source">
                    <?php echo get_field('source')?>
                 </div>
	             </div>
	           </div>
	         </div>
	      </div>
	    <?php } ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
