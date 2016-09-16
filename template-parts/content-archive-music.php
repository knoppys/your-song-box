<div class="col-sm-10" id="sectionreplace">
	<div class="row">
		<div class="col-sm-12">
			<h2>Browse Music</h2>
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
			        echo '<li class="'.$genre->name.'"><a href="'.get_term_link($genre).'"><i class="fa fa-chevron-right"></i> ' . $genre->name . '</a></li>';
			    }
			    echo '</ul>';
			}
			?>
		</div>
		<div class="col-sm-10 grid">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="grid-item track">
					<?php get_template_part('template-parts/content-home-music'); ?>			
				</div>
			<?php endwhile; else : echo '<p> Sorry, no posts matched your criteria. </p>'; endif; ?>
		</div>
	</div>
</div>