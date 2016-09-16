<div id="sectionreplace">
	<div class="row">
		<div class="col-md-12">
			<div style="cursor:pointer;" class="play" id="<?php the_field('track_source'); ?>">
				<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('medium');
					} else {
						echo '<img style="position:relative;" src="'.get_template_directory_uri().'/images/small.png">';
					}							
				?>
				<div class="overlay-play">
					<i class="fa fa-play"></i>
				</div>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
			if (is_singular('music')) { ?>
				<a style="display:block;" class="play-music" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class=" fa fa-user"></i><?php the_author(); ?></a>
			<?php } else { ?>
				<a class="play-music" href="<?php the_permalink(); ?>">
					<i class="fa fa-user"></i> <?php the_title(); ?>
				</a>
			<?php } ?>		
			<div class="row sharelinks">
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>" href="https://twitter.com/home?status=<?php the_permalink(); ?>%0A"><i class="fa fa-twitter"></i></a>
				</div>
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google"></i></a>
				</div>
				<div class="col-md-6">
					<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
				</div>
			</div>
		</div>
	</div>
</div>


