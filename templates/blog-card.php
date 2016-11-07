
<div class="blog-card">
	<div class="blog-img">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
	</div>
	<div class="blog-info">
		<div class="blog-info-wrapper">
			<h3><?php the_title(); ?></h3>
			<div class="blog-excerpt">
				<?php the_excerpt();?>
			</div>
			<div class="buttons">
				<a href="<?php echo get_permalink(); ?>">Read More</a>
			</div>
			<div class="categories">
				<?php
				$categories = get_the_terms(get_the_ID(), 'category' );
				$i = 1;
				foreach($categories as $category){
					echo $category->name;
					if(sizeof($categories) != $i) {
						echo ', ';
					}
					$i++;
				}
				?>
			</div>
		</div>
	</div>
</div>
