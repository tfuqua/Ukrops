<?php

/* Template Name: Blog Template */

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
                <?php if (get_field('hero_body')){ ?>
                  <div class="hero-body">
    	              <?php echo get_field('hero_body')?>
                  </div>
                <?php
                } ?>
	            </div>
	          </div>
	        </div>
	      </div>
	    <?php
				} else {
					while ( have_posts() ) : the_post(); ?>
						<div class="container-fluid">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div><?php
					endwhile;
			 }?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <?php
            // The Query
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args =  array(
              'post_type'       => 'post',
              'posts_per_page'  => 5,
              'paged'           => $paged
            );
            query_posts($args);

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
            <?php endif;

            // Reset Query
            wp_reset_query(); ?>
          </div>
          <div class="col-md-3 hidden-sm hidden-xs">
            <?php get_sidebar('categories');?>
          </div>
        </div>
				<br /><br />
			</br/>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
