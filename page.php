<?php

 get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main padded" role="main">

 			<!-- Hero Image -->
 	    <?php if(get_field('hero_image')) { ?>
 	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
 		     <div class="hero mini-hero" style="background-image: url('<?php echo $background[0] ?>');">

					<?php if (get_field('hero_heading')) { ?>
 	        <div class="hero-text-wrapper">
 	          <div>
 	            <div class="hero-text">
 								<div class="hero-header">
 	              	<?php echo get_field('hero_heading')?>
 								</div>
                <?php if(get_field('hero_body')){ ?>
 								<div class="hero-body">
 		              <?php echo get_field('hero_body')?>
 								</div>
                <?php
                }
                if(get_field('button_text')){ ?>
                <div class="hero-buttons">
                  <a class="button" href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text'); ?></a>
                </div>
                <?php
                }?>
 	            </div>
 	          </div>
 	        </div>
			 		<?php } ?>

 	      </div>
 	    <?php
 				} else {
 					$background =  get_template_directory_uri() . '/images/hero.png';
 					?>
 					 <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
 						<div class="hero-text-wrapper">
 							<div>
 								<div class="hero-text">
 									<?php
                  if (get_field('hero_heading')){ ?>
                    <div class="hero-header">
     	              	<?php echo get_field('hero_heading')?>
     								</div>
                    <?php if(get_field('hero_body')){ ?>
     								<div class="hero-body">
     		              <?php echo get_field('hero_body')?>
     								</div>
                    <?php
                    }
    							  if(get_field('button_text')){ ?>
     								<div class="hero-buttons">
     									<a class="button" href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text'); ?></a>
     								</div>
                    <?php
                    }
                  } else {
                    while ( have_posts() ) : the_post();
   										the_title();
   									endwhile;
                  }
 									?>
 								</div>
 							</div>
 						</div>
 					</div>
 			<?php
 			 }?>

 			<div class="container-fluid">
 				<div class="row">
 					<div class="col-md-8 col-md-push-2">
 						<?php
 						while ( have_posts() ) : the_post();
 							the_content();
 						endwhile; // End of the loop.
 						?>
 					</div>
 				</div>
 			</div>
 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer();
