<?php

/* Template Name: Products Template */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero products-hero" style="background-image: url('<?php echo $background[0] ?>');">
	         <div class="hero-text-wrapper">
	           <div>
	             <div class="hero-text">
								 <?php
								 		while ( have_posts() ) : the_post();
											the_title();?>

											<div class="hero-body">
											<?php
											the_content();?>
										</div><?php
					 					endwhile; // End of the loop.
									?>
	             </div>
	           </div>
	         </div>
	      </div>
	    <?php } ?>
		<div>

      <?php
      $products = get_terms( array(
        'taxonomy' => 'product',
        'hide_empty' => true,
        'hierarchical' => true,
        'parent'   =>  0
      ));

      if (!empty( $products ) && ! is_wp_error( $products )){
          foreach ( $products as $product) {

							$id = $product->term_id;
							$markup = '';
							$m = '';

              $markup = '<div>'.$product->name.'</div>';

							$children = get_terms( array(
								'taxonomy' => 'product',
								'hide_empty' => true,
								'hierarchical' => true,
								'parent'   =>  $id
							));

							$m = '<ul>';
							foreach ( $children as $child) {
								$child_link = get_term_link( $child );

								$m .= '<li><a href="'. $child_link . '">'. $child->name . '</a></li>';
							}

							$m .= '</ul>';
							?>

							<div class="product-category">
								<div class="category-header">
									<div class="container-fluid">
										<?php echo $markup;?>
									</div>
								</div>
								<div class="category-list">
										<?php echo $m;?>
								</div>
							</div>
					<?php
          }
      	}
      ?>
			<br /> <br />
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();