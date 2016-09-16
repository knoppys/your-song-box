<div class="col-sm-10 sectionreplace">
	<div class="row">
		<div class="col-md-12">
			<h2><?php the_title(); ?> by <?php the_author(); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 track-image">
			<?php get_template_part('template-parts/content-home-music'); ?>
			
			<div class="row">				
				<div class="col-md-12">
					<a style="display:block;"class="btn btn-primary"href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">View all my music</a>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<article>
				<?php the_field('track_information'); ?>
			</article>
			<h4>More by <?php the_author(); ?></h4>
			<div class="row">
				<div class="col-md-6">
					<?php
						
	
			  	// WP_Query arguments
				$args = array (
					'author'                 => $post->post_author,
					'post_type' => 'music',
					'numberposts' => 10,
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); ?>		

						<div class="row more-by-item">
							<div class="col-sm-10"><a class="btn btn-primary playbutton" id="<?php the_field('track_source'); ?>" ><i class="fa fa-play"></i></a><?php the_title(); ?></div>														
						</div>					

					<?php } 
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
			?>
				</div>
			</div>
		</div>
	</div>

</div>