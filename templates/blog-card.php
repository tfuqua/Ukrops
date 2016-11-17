
<div class="blog-card">
	<div class="blog-img">
		<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full' );?>
		<div class="img-div" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
	</div>
	<div class="blog-info">
		<div class="blog-info-wrapper">
			<h3><?php the_title(); ?></h3>
			<div class="blog-excerpt">
				<?php echo excerpt('25');?>
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
