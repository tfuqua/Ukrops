<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="container-fluid">

			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) : ?>
					<div>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</div>
				<?php
				endif;
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

	<div class="container-fluid">
		<?php
		get_sidebar();
		get_footer();	?>
	</div>
