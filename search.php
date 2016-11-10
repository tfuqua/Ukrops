<?php
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
			$background =  get_template_directory_uri() . '/images/hero.png';
			?>
	     <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
        <div class="hero-text-wrapper">
          <div>
            <div class="hero-text">
            	Search Results
            </div>
          </div>
        </div>
      </div>


		<div class="container-fluid">
			<?php
			if ( have_posts() ) : ?>
					<div class="search-term">
						Displaying results for " <?php echo esc_html( get_search_query( false ) ); ?>"
					</div>

				<?php
				while ( have_posts() ) : the_post();
						get_template_part('templates/search-result', get_post_format());
				endwhile; ?>

				<div class="paginate">
					<?php
					global $wp_query;
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' 		=> '?paged=%#%',
						'current' 	=> max( 1, get_query_var('paged') ),
						'prev_text'	=> __('Previous'),
						'next_text'	=> __('Next'),
						'total' 		=> $wp_query->max_num_pages
					));?>
				</div>

			<?php
			else : ?>
				<div class="search-term">
					No Results to show for " <?php echo esc_html( get_search_query( false ) ); ?>"
				</div>
			<?php
			endif; ?>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
