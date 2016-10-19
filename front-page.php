<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ukrops
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <div class="brand-wrapper">

    <!-- Hero Image -->
    <?php if(get_field('hero_image')) { ?>
      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
	     <div class="hero" style="background-image: url('<?php echo $background[0] ?>');">
         <div class="hero-text-wrapper">
           <div>
             <div class="hero-text">
               <?php echo get_field('hero_text')?>
               <?php if(get_field('button_text')) { ?>
               <div class="hero-button">
                 <a href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text')?></a>
               </div>
               <?php } ?>
             </div>
           </div>
         </div>
      </div>
    <?php } ?>

    <!-- Branding -->
    <?php
      if( have_rows('brand') ) { ?>
        <div class="branding">
          <div class="container-fluid">
            <?php while ( have_rows('brand') ) : the_row(); ?>
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
    </div>

    <!-- Featured Content -->
    <?php
      if( have_rows('featured_content') ) { ?>
        <div class="featured-content-wrapper">
          <div class="container-fluid">
            <?php while ( have_rows('featured_content') ) : the_row(); ?>
                <div class="featured-item">
                  <div class="img-wrapper">
                    <?php echo wp_get_attachment_image(get_sub_field('image'), 'medium', false, array( 'class' => 'lazy-load'));?>
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

                  <div class="featured-thumbnail">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium');
                    } else if (get_sub_field('post_image') != '') { ?>
                      <?php echo wp_get_attachment_image(get_sub_field('post_image'), 'medium', false, array( 'class' => 'lazy-load') );?>
                    <?php
                    }?>
                  </div>
                  <div class="featured-post-content">
                    <div class="featured-title">
                      <?php the_title();?>
                    </div>
                    <div class="featured-description">
                      <?php the_excerpt() ?>
                    </div>
                    <div class="featured-button">
                      <a href="#">
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
