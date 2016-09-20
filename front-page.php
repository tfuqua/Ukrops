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
    <?php if(get_field('image')) { ?>
    	<div class="hero">
        <img src="<?php echo get_field('image')?>" alt=""/>
      </div>
    <?php } ?>

    <!-- Branding -->
    <?php
      if( have_rows('brand') ) { ?>

        <div class="branding">
          <?php while ( have_rows('brand') ) : the_row(); ?>
              <div class="brand-item">
                <img src="<?php echo the_sub_field('image');?>" alt="" />
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

    <!-- Featured Pages -->
    <?php
      if( have_rows('posts')):
        $rows = get_field('posts');
      echo '<ul>';

        foreach( $rows as $post):?>
          <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span>Post Object Custom Field: <?php the_field('content'); ?></span>
          </li>
      <?php endforeach; ?>
      </ul>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
