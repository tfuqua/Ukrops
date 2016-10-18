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
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/content', get_post_format() );

			endwhile; // End of the loop.
			?>

      <?
      $products = get_terms( array(
        'taxonomy' => 'product',
        'hide_empty' => true,
        'hierarchical' => true,
        'parent'   =>  0
      ));

      if (! empty( $products ) && ! is_wp_error( $products ) ) {
          $markup .= '';
          foreach ( $products as $product) {
              $product_link = get_term_link( $product );
              $markup .= '<div><a href="'. $product_link . '">'. $product->name  . '</a></div>';
          }
          echo $markup;
      }

      ?>

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
