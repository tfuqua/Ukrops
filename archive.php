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
			<?php
			if ( have_posts() ) : ?>
				<div class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div><!-- .page-header -->
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'templates/content', get_post_format() );
				endwhile;

				the_posts_navigation();

			else :
				get_template_part( 'templates/content', 'none' );
			endif; ?>

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
