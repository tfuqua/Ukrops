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

		<?php
		$queried_object = get_queried_object();
		$taxonomy = $queried_object->taxonomy;
		$term_id = $queried_object->term_id;
		$image= get_field('hero_image', $taxonomy . '_' . $term_id);
		?>

		<!-- Hero Image -->
    <?php if($image) { ?>
      <?php $background = wp_get_attachment_image_src($image, 'full', false); ?>
	     <div class="hero products-hero" style="background-image: url('<?php echo $background[0] ?>');">
         <div class="hero-text-wrapper">
           <div>
             <div class="hero-text">
							 <?php if ( have_posts() ) :
								 echo single_cat_title('', false);
							 endif; ?>
             </div>
           </div>
         </div>
      </div>
    <?php } ?>

		<div class="container-fluid">
			<div class="product-list">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

						get_template_part( 'templates/content-product', get_post_format());

					endwhile;
				endif; ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
