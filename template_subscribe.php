<?php
/*
Template Name: Subscribe
*/

get_header();  ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="content-area">				
			<?php
			
				echo '<div class="sidebar-wrapper">';
					get_template_part('template-parts/content-left');
				echo '</div>';
				echo '<div class="content-wrapper"><div class="container-fluid">';
					get_template_part('template-parts/content-subscribe'); 
					get_template_part('template-parts/sidebar-home'); 
				echo '</div></div>';
							
			?>					
		</section>
			
	<?php endwhile; else : echo '<p> Sorry, no posts matched your criteria. </p>'; endif; ?>

<?php get_footer(); ?>

