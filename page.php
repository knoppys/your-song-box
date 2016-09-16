<?php
/*
Template Name: Default
*/


get_header();  ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<section class="content-area">				
		<?php
		if (is_user_logged_in()) { 
			echo '<div class="sidebar-wrapper">';
				get_template_part('template-parts/content-left');
			echo '</div>';
			echo '<div class="content-wrapper"><div class="container-fluid">';
				get_template_part('template-parts/content-page'); 
				get_template_part('template-parts/sidebar-home'); 
			echo '</div></div>';
		} else {
			get_template_part('template-parts/login'); 
		}					
		?>					
	</section>
				
<?php endwhile; else : echo '<p> Sorry, no posts matched your criteria. </p>'; endif; ?>

<?php get_footer(); ?>
