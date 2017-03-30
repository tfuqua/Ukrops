<?php

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
 								<div class="hero-header">
 	              	<?php echo get_field('hero_header')?>
 								</div>
 								<div class="hero-body">
 		              <?php echo get_field('hero_body')?>
 								</div>
 								<div class="hero-buttons">
 									<a class="button" href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text'); ?></a>
 								</div>
 	            </div>
 	          </div>
 	        </div>
 	      </div>
 	    <?php
 				} else {
 					if (get_theme_mod('blog_image')) {
						 $background = get_theme_mod('blog_image');
					 } else {
						 $background = '/images/blog-hero.jpg';
					 }
 					?>
 					 <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
 						<div class="hero-text-wrapper">
 							<div>
 								<div class="hero-text">
 									<?php
 									while ( have_posts() ) : the_post();
 										the_title();
 									endwhile;
 									?>
 								</div>
 							</div>
 						</div>
 					</div>
 			<?php
 			 }?>

			<div class="container-fluid">
				<div class="flex-row">
					<div class="content">
            <?php
    				while ( have_posts() ) : the_post();

    					get_template_part( 'templates/content', 'page' );

    					// If comments are open or we have at least one comment, load up the comment template.
    					/*if ( comments_open() || get_comments_number() ) :
    						comments_template();
    					endif;*/

    				endwhile; // End of the loop.
    				?>
          </div>
          <div class="aside">
            <?php get_sidebar('categories'); ?>
          </div>
        </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
