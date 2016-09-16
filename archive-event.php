<?php get_header();  ?>

	<section class="content-area">				
		<?php
		if (is_user_logged_in()) { 
			echo '<div class="sidebar-wrapper">';
				get_template_part('template-parts/content-left');
			echo '</div>';
			echo '<div class="content-wrapper"><div class="container-fluid">';
				get_template_part('template-parts/content-archive-event'); 
				get_template_part('template-parts/sidebar-home'); 
			echo '</div></div>';
		} else {
			get_template_part('template-parts/login'); 
		}					
		?>					
	</section>	


<?php get_footer(); ?>