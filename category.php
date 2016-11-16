<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ukrops
 */

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
 					$background =  get_template_directory_uri() . '/images/hero.png';
 					?>
 					 <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
 						<div class="hero-text-wrapper">
 							<div>
 								<div class="hero-text">
									<?php if (have_posts()) :
	  								 echo single_cat_title('', false);
	  							 	endif; ?>
 								</div>
 							</div>
 						</div>
 					</div>
 			<?php
 			 }?>

		<div class="container-fluid">
			<div class="row">
					<div class="col-sm-8 col-md-9">
						<?php
						if ( have_posts() ) : ?>
						<div class="blog-cards">
							<?php
	              while ( have_posts() ) : the_post();
									get_template_part( 'templates/blog-card', get_post_format());
	              endwhile;
	            ?>
						</div>

							<div class="pager text-center">
								<?php previous_posts_link( '&#xab; Newer posts' );?>
								<?php next_posts_link( 'Older Posts &#xbb;');?>
							</div>
            <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
					</div>
          <div class="col-sm-4 col-md-3 hidden-xs">
						<br />
            <?php get_sidebar('categories');?>
					</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
