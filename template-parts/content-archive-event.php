<div class="col-sm-10" id="sectionreplace">
	<div class="row">
		<div class="col-sm-12">
			<h2>Browse Events</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 grenreslist">
			<strong>Browse by category</strong>
			<?php
			$categorys = get_terms('event-category');
			if ( ! empty( $categorys ) && ! is_wp_error( $categorys ) ){
			    echo '<ul>';					    
			    foreach ( $categorys as $category ) {
			        echo '<li class="'.$category->name.'"><a href="'.get_term_link($category).'"><i class="fa fa-chevron-right"></i> ' . $category->name . '</a></li>';
			    }
			    echo '</ul>';
			}
			?>
		</div>
		<div class="col-sm-10 eventGrid">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php 
					$startdate = get_field('event_start_date');
					$enddate = get_field('event_end_date');
					$date1 = date("F j, Y", strtotime($startdate)); 
					$date2 = date("F j, Y", strtotime($enddate)); 
				?>
				<div class="grid-item track event">
					<div class="row">
						<a href="<?php the_permalink(); ?>">
							<div class="col-md-12">								
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('medium');
								} else {
									echo '<img src="'.get_template_directory_uri().'/images/small.png">';
								}							
								?>								
							</div>
						</a>
					</div>
					<div class="row">
							<div class="col-md-12">
								<a class="play-music play-event" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
									<i class="fa fa-calendar"></i> <?php the_field('venue_name'); ?>
								</a>
								<div class="row">
									<div class="col-md-12 event-detail">
										<h4><?php the_title(); ?></h4>
										<p>From: <?php echo $date1; ?></p>
										<p>Until: <?php echo $date2; ?></p>								
									</div>
								</div>
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
									<div class="col-xs-2">
										<a href="https://www.google.co.uk/maps/place/<?php the_field('venue_post_code'); ?>"><i class="fa fa-location-arrow"></i><a/>
									</div>									
								</div>
							</div>
						</div>
					
				</div>

			

			<?php endwhile; else : echo '<p> Sorry, no posts matched your criteria. </p>'; endif; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery('.eventGrid').masonry({
			//options
			itemSelector: '.grid-item',
			columnWidth: 200
		});
	})
</script>