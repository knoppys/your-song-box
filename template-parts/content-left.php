<aside>
	<div class="sidebar-left">
		<div class="sidebar-left-content">
			<div class="row">
				<div class="col-md-12">

					<?php
			$args = array(
				'menu' => 'primary',
				);
			wp_nav_menu();
			?>
				</div>
			</div>
			
			<div class="row footer-login">
				<?php 
				if (is_user_logged_in()) { 
				$userID = 'user_'.get_current_user_id();							
				$pictureurl = get_field('profile_picture', $userID);	
				$user = wp_get_current_user();						
				if ($user->roles[0] == 'artist') {
					$linktext = 'My Song Box';
				} elseif ($user->roles[0] == 'organiser') {
					$linktext = 'My Events';
				} else {
					$linktext = 'My Profile';
				}
				?>							
					<center>
						<div class="col-sm-12">
							<img src="<?php echo $pictureurl; ?>">
							<a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
							<a href="<?php echo get_site_url().'/?author='.$user->ID ?>" id="profile"><?php echo $linktext; ?></a>
							
						</div>
					</center>

				<?php } else { ?>
					<center>
						<?php wp_login_form(); ?>
					</center>							
				<?php } ?>
			</div>
		</div>
	</div>
</aside>