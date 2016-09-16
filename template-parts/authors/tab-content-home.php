<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	if ($curauth->roles[0] == 'artist') {
		// WP_Query arguments
			$args = array (
				'post_type'              => array( 'music', 'post'),
				'post_count'			=> -1,
				'author'				=> $curauth->ID
			);
	
			// The Query
			$query = new WP_Query( $args );
	
			// The Loop
			if ( $query->have_posts() ) { ?>						
				<?php while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<div class="row track-row">
						<div class="col-sm-3">
						<?php get_template_part('template-parts/content-home-music'); ?>
						</div>
						<div class="col-sm-9">
							<h3><?php the_title(); ?></h3>
							<?php the_field('track_information'); ?>
						</div>
					</div>
					
			<?php } } wp_reset_postdata();
	
	} elseif ($curauth->roles[0] == 'organiser') {

	$args = array (
			'post_type'              => array( 'music', 'post'),
			'post_count'			=> -1,
			'author'				=> $curauth->ID
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			echo '<h2>My Events</h2>';
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
				<div class="row">
				<div class="col-sm-3 track-image">
					<?php 
					if (has_post_thumbnail()) {
						the_post_thumbnail('medium');
					} else {
						echo '<img src="'.get_template_directory_uri().'/images/small.png">';
					}
					
					?>
				</div>
				<div class="col-sm-9">
					<h3><?php the_title(); ?></h3>
					<?php the_field('track_information'); ?>
				</div>
			</div>
			<div class="row track-controls">
				<div class="col-md-1">
					<a class="btn btn-primary playbutton" id="<?php the_field('track_source'); ?>" ><i class="fa fa-play"></i></a>
				</div>
				<div class="col-md-1">
					<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
				</div>
			</div>
		<?php } } wp_reset_postdata();
}

?>