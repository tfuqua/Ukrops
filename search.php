<?php
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ukrops' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/content', 'search' );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'templates/content', 'none' );
		endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
