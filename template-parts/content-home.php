<div class="col-sm-10" id="sectionreplace">
	<div class="row">
		<div class="col-md-12">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
	<div class="row">

		<div class="grid col-md-12">
			<?php
				// WP_Query arguments
				$postargs = array (
					'post_type'              => array( 'music', 'event', 'post' ),
					'posts_per_page'         => 30,
					'order'                  => 'ASC',
					'orderby'                => 'date',
				);

				// The Query
				$query = new WP_Query( $postargs );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); ?>
						<div class="grid-item track">
							
							<?php
							//get the post type to figure out what content part to get.					
							$posttype = get_post_type();
							switch ($posttype) {
								case 'music': 
									get_template_part('template-parts/content-home-music');
								
									break;						
								case 'event':
									get_template_part('template-parts/content-home-event');
									
									break;
								case 'post':
									get_template_part('template-parts/content-home-post');
									
									break;
							}
							
							?>					
							
							
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
	
	<div class="row">
		<?php //dynamic_sidebar('sidebar-home'); ?>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery('.grid').masonry({
			//options
			itemSelector: '.grid-item',
			columnWidth: 200
		});
	})
</script>