<?php
/* Template Name: Food Team */

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
				} else {
					$background =  get_template_directory_uri() . '/images/hero.png';
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


				<?php
				while ( have_posts() ) : the_post();
        $pageID = get_the_ID(); ?>

		      <div class="container-fluid">
		        <div class="flex-row">
		          <div class="content">
        				<?php the_content();?>

								<div class="team-list">
		              <?php
		               $args = array(
		              	'sort_order' => 'asc',
		              	'sort_column' => 'ID',
		              	'parent' => $pageID,
		              	'post_type' => 'page',
		              );

		              $pages = get_pages($args);

		              foreach ($pages as $page){
		                $post = $page;
		                setup_postdata( $post );
		                get_template_part( '/templates/cook-card', get_post_format());

		                wp_reset_postdata();
		              }
		              ?>
		            </div>
		          </div>
							<div class="aside">
		            <?php
								$showChildren = true;
		            get_sidebar('cooks');
		            ?>
		          </div>
						<?php
    				endwhile; // End of the loop.
    				?>
        </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
