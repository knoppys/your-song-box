<div class="col-sm-10 sectionreplace">
	<div class="row">
		<div class="col-md-12">
			<h2><?php the_title(); ?> : by <?php the_author(); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 track-image">
			<?php get_template_part('template-parts/content-home-event'); ?>		
			
		</div>
		<div class="col-sm-8">
			<article>
				<?php
				$startdate = get_field('event_start_date', false, false);
				$startdateformat = new DateTime($startdate);				
				?>
				<div class="row">
					<div class="col-md-5">						
						<p><strong>Event Start Date: <?php echo $startdateformat->format('j M Y'); ?></strong></p>
						<?php
							if (get_field('event_end_date')) {
							$enddate = get_field('event_end_date', false, false);
							$enddateformat = new DateTime($enddate);
							echo '<strong><p>Event End Date: '. $enddateformat->format('j M Y').'</strong></p>';
							} 				
						?>
						<p><strong>Event Start Time: <?php the_field('event_start_time'); ?></strong></p>
						<p><strong>Venue Name: <?php the_field('venue_name'); ?></strong></p>
						<p><a target="_blank"class="btn btn-primary"href="http://www.google.co.uk/maps/search/<?php the_field('venue_post_code'); ?>">View on a map</a></p>						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><strong>Event Description</strong></p>
						<?php the_field('event_description'); ?>
					</div>
				</div>
			</article>
			<h4>More by <?php the_author(); ?></h4>
			<div class="row">
				<div class="col-md-6">
					<?php					
	
					  	// WP_Query arguments
						$args = array (
							'author'                 => $post->post_author,
							'post_type' => 'events',
							'numberposts' => 10,
						);

						// The Query
						$query = new WP_Query( $args );

						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post(); ?>		

								<div class="row more-by-item">
									<div class="col-sm-10"><a href="<?php the_permalink(); ?>"class="btn btn-primary playbutton">Read More</a></div>														
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