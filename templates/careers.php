<?php

/* Template Name: Careers Template */

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
					while ( have_posts() ) : the_post(); ?>
						<div class="container-fluid">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div><?php
					endwhile;
			 }?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="content">
              <?php
              while ( have_posts() ) : the_post();

                the_content();

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ukrops' ),
                  'after'  => '</div>',
                ));

              endwhile; // End of the loop.
              ?>

              <script type="text/javascript" src="//app.jazz.co/widgets/basic/create/ukropshomestylefoods" charset="utf-8"></script>
            </div>
          </div>
          <div class="col-md-2 col-md-push-1 hidden-sm hidden-xs">
            
          </div>
        </div>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
