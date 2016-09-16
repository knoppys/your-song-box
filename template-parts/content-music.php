<div class="col-sm-10" id="sectionreplace">
	<div class="row">
		<div class="col-sm-12">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 grenreslist">
			<strong>Browse by genre</strong>
			<?php
			$genres = get_terms('genre');
			if ( ! empty( $genres ) && ! is_wp_error( $genres ) ){
			    echo '<ul>';					    
			    foreach ( $genres as $genre ) {
			        echo '<li class="'.$genre->name.'"><i class="fa fa-chevron-right"></i> ' . $genre->name . '</li>';
			    }
			    echo '</ul>';
			}
			?>
		</div>
		<div class="col-sm-10">
			<?php
			// WP_Query arguments
			$args = array (
				'post_type'              => array( 'music' ),
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
					$terms = get_terms('genre');
					?>

					<div class="col-sm-3 track">
						<a id="playtrack">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('medium');
							} else {
								echo '<img src="'.get_template_directory_uri().'/images/small.png">';
							}							
							?>
						</a>
						<?php the_title(); ?><br>By: <a clas="the-author-link" id="<?php the_author_ID(); ?>"><?php the_author(); ?></a>
						<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
						
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