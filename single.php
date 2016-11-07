<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <?php
    				while ( have_posts() ) : the_post();

    					get_template_part( 'templates/content', 'page' );

    					// If comments are open or we have at least one comment, load up the comment template.
    					if ( comments_open() || get_comments_number() ) :
    						comments_template();
    					endif;

    				endwhile; // End of the loop.
    				?>
          </div>
          <div class="col-md-3">
            <?php get_sidebar('categories'); ?>
          </div>
        </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
