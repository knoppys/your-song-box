<div id="sectionreplace">
	<div class="row">
		<div class="col-md-12">
			<div style="cursor:pointer;">
				<a href="<?php the_permalink(); ?>">
					<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('medium');
						} else {
							echo '<img src="'.get_template_directory_uri().'/images/small.png">';
						}							
						?>
				</a>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="play-music play-event" href="<?php the_permalink(); ?>">
				<i class="fa fa-newspaper-o"></i> <?php the_title(); ?>
			</a>
			<div class="row sharelinks">
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>"href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>"href="https://twitter.com/home?status=<?php the_permalink(); ?>%0A"><i class="fa fa-twitter"></i></a>
				</div>
				<div class="col-xs-2">
					<a title="<?php the_title(); ?>"href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google"></i></a>
				</div>	
						
							
			</div>
		</div>
	</div>
</div>

