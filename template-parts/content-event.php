<div class="col-sm-10" id="sectionreplace">
	<div class="row">
		<div class="col-sm-12">
			<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 grenreslist">
			<strong>Browse by category</strong>
			<?php
			$eventCategories = get_terms('event-category');
			if ( ! empty( $eventCategories ) && ! is_wp_error( $eventCategories ) ){
			    echo '<ul>';					    
			    foreach ( $eventCategories as $eventCategory ) {
			        echo '<li class="'.$eventCategory->name.'"><i class="fa fa-chevron-right"></i> ' . $eventCategory->name . '</li>';
			    }
			    echo '</ul>';
			}
			?>
		</div>
		<div class="col-sm-7">
			<?php
			// WP_Query arguments
			$args = array (
				'post_type'              => array( 'event' ),
				'posts_per_page'         => -1,
				'order'                  => 'ASC',
				'orderby'                => 'date',
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					$terms = get_terms('event-category');
					?>

					<div class="col-md-12 track event">
						<div class="row">
							<div class="col-md-4">
								<a id="playtrack">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail('medium');
									} else {
										echo '<img src="'.get_template_directory_uri().'/images/small.png">';
									}							
									?>
								</a>
							</div>
							<div class="col-md-8">
								<h3><?php the_title(); ?></h3>
								<p>Posted By: <a class="the-author-link" id="<?php the_author_ID(); ?>"><?php the_author(); ?></a></p>
								<p><strong>Event Details</strong></p>
								<?php 
								$startdate = get_field('event_start_date');
								$enddate = get_field('event_end_date');
								$date1 = date("F j, Y", strtotime($startdate)); 
								$date2 = date("F j, Y", strtotime($enddate)); 
								?>
								<p>Event Start Date: <?php echo $date1; ?></p>
								<p>Event End Date: <?php echo $date2; ?></p>
								<p>Venue: <?php the_field('venue_name'); ?></p>
								<p><a class="btn btn-primary" href="<?php the_permalink(); ?>">Find out more<a/></p>
								<p><a class="btn btn-primary" href="https://www.google.co.uk/maps/place/<?php the_field('venue_post_code'); ?>">View on a map<a/></p>								
							</div>
						</div>
						
						
						
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