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
    	<div class="hero">
        <img src="<?php echo get_field('hero_image')?>" alt=""/>
        <div class="hero-text">
          <div class="call-to-action"><?php echo get_field('call_to_action')?></div>
          <div class="hero-button">
            <a href="#"><?php echo get_field('button_text')?></a>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- Branding -->
    <?php
      if( have_rows('brand') ) { ?>

        <div class="branding">
          <?php while ( have_rows('brand') ) : the_row(); ?>
              <div class="brand-item">
                <img src="<?php echo the_sub_field('brand_logo');?>" alt="" />
              </div>
          <?php endwhile; ?>
        </div>

    <?php } ?>

    <!-- Featured Content -->
    <?php
      if( have_rows('featured_content') ) { ?>
        <div class="featured-content-wrapper">
          <div class="featured-content">
              <?php while ( have_rows('featured_content') ) : the_row(); ?>
                  <div class="featured-item" style="background:<?php echo the_sub_field('color');?>;">

                    <img src="<?php echo the_sub_field('image');?>" alt="" />
                    <div class="featured-section">
                      <h3><?php echo the_sub_field('heading');?></h3>
                      <div class="featured-body">
                        <?php echo the_sub_field('body');?>
                      </div>
                      <div class="featured-button">
                        <a style="color:<?php echo the_sub_field('color');?>">
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
                    } else { ?>
                      <img src="<?php echo get_sub_field('post_image')?>" alt=""/>
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
