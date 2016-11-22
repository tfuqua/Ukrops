
<div id="post-<?php the_ID(); ?>" class="cook-card">
		<div class="cook-img">
			<?php if ( has_post_thumbnail() ) : ?>
	      <?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</div>

		<div class="cook-blurb">
			<h3><?php the_title(); ?></h3>
			<?php if (get_field('position')) { ?>
				<h4>
					<?php echo get_field('position') ?>
				</h4>
			<?php
			}?>

			<div class="blurb">
				<?php echo excerpt('45'); ?>
			</div>
		</div>

		<div class="buttons">
        <a class="button" href="<?php echo get_permalink();?>">Read Full Bio</a>
		</div>
</div>
