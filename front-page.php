<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ukrops
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <!-- Hero Image -->
    <?php if(get_field('hero_image')) { ?>
      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
	     <div class="hero" style="background-image: url('<?php echo $background[0] ?>');">
         <div class="hero-text-wrapper">
           <div>
             <div class="hero-text">
               <div class="hero-header">
                 <?php echo get_field('hero_heading')?>
               </div>
               <div class="hero-body">
                 <?php echo get_field('hero_body')?>
               </div>
               <?php if(get_field('button_text')) { ?>
               <div class="hero-button">
                 <a class="button" href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text')?></a>
               </div>
               <?php } ?>
             </div>
           </div>
         </div>
      </div>
    <?php } ?>

    <!-- Branding -->
    <?php
      if( have_rows('brands') ) { ?>
        <div class="branding">
          <div class="brand-container">
            <?php while ( have_rows('brands') ) : the_row(); ?>
              <div class="brand-item">
                  <a href="<?php echo get_sub_field('brand_link')?>">
                    <?php if (get_sub_field('brand_logo') != '') {
                      echo wp_get_attachment_image(get_sub_field('brand_logo'), 'full', false, array( 'class' => '') );
                    } ?>
                  </a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
    <?php } ?>

    <!-- Featured Content -->
    <?php
      if( have_rows('featured_content') ) { ?>
        <div class="featured-content-wrapper">
          <div class="featured-items">
            <?php while ( have_rows('featured_content') ) : the_row(); ?>
                <div class="featured-item">
                  <?php
                    $background = wp_get_attachment_image_src(get_sub_field('image'), 'full', false);
                  ?>
                  <div class="img-wrapper" style="background-image: url('<?php echo $background[0] ?>');">
                  </div>
                  <div class="featured-section">
                    <h3><?php echo the_sub_field('heading');?></h3>
                    <div class="featured-body">
                      <?php echo the_sub_field('body');?>
                    </div>
                    <div class="featured-button">
                      <a href="<?php echo the_sub_field('button_link')?>">
                        <?php echo the_sub_field('button_text');?>
                      </a>
                    </div>
                  </div>

                </div>
            <?php endwhile; ?>
          </div>
        </div>
    <?php } ?>

    <!-- Featured Posts -->
    <?php

      if( have_rows('featured_posts') ) { ?>
        <div class="featured-posts-wrapper">
          <div class="featured-posts">
            <?php while (have_rows('featured_posts') ) : the_row(); ?>
              <div class="featured-post">
                <?php $post_object = get_sub_field('featured_post');
                if( $post_object ):
                  $post = $post_object;
                  setup_postdata( $post ); ?>

                  <?php
              			$background = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
              		?>
              		<div class="featured-thumbnail" style="background-image: url('<?php echo $background[0] ?>');">
              		</div>

                  <div class="featured-post-content">
                    <div class="featured-title">
                      <?php the_title();?>
                    </div>
                    <div class="featured-description">
                      <?php excerpt('30') ?>
                    </div>
                    <div class="featured-button">
                      <a class="button" href="<?php echo get_permalink(); ?>">
                        <?php echo the_sub_field('button_text') ?>
                      </a>
                    </div>
                  </div>
                  <?php wp_reset_postdata();
                  endif; ?>
              </div>
          <?php endwhile; ?>
          </div>
        </div>
    <?php } ?>


  </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
