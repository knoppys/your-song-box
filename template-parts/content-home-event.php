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
			<?php
			if (is_singular('event')) { ?>
				<a style="display:block;"class="play-music play-event" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class=" fa fa-user"></i><?php the_author(); ?></a>
			<?php } else { ?>
				<a class="play-music play-event event" href="<?php the_permalink(); ?>">
					<i class="fa fa-calendar-o"></i> <?php the_title(); ?>
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
				<?php
				if(is_user_logged_in()) : 
					$user = wp_get_current_user();
						if($user->roles[0] == 'administrator') : ?>
						<div class="col-md-6 apply-now">
							<form id="applynowform">	
								<input type="hidden" name="authorID" value="<?php echo get_the_author_meta( 'ID' ); ?>">
								<input type="hidden" name="userID" value="<?php echo $user->ID;?>">
								<a class="applynowsubmit btn btn-primary">Apply Now</a>
							</form>
							
						</div>	

						<?php endif;
					endif;

				?>				
			</div>
		</div>
	</div>


</div>