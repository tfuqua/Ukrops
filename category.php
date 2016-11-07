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
		<div class="container-fluid">
			<div class="row">
					<div class="col-md-9">
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
					<div class="col-md-3">
						<br />
            <?php get_sidebar('categories');?>
					</div>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
