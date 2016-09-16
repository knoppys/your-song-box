<div class="col-sm-10" id="sectionreplace">
	<h2><?php the_title(); ?></h2>
	<div>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">My Content</a></li>
			<li role="presentation"><a href="#editprofile" aria-controls="editprofile" role="tab" data-toggle="tab">Edit Profile</a></li>
		
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="content">
				<table cellpadding="0" cellspacing="0" border-collapse="collapse" style="" class="">
				    <tbody>		       				            
				       
							<?php
							// WP_Query arguments
							$ID = get_current_user_id();
							$args = array (
								'post_type' => array( 'music' ),
								'author'=>	$ID,
							);
					
							// The Query
							$query = new WP_Query( $args );
							
							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post(); ?>

									<div class="col-md-12 track-row" id="<?php echo get_the_ID();?>">
										<div class="row">
											<div class="col-sm-2">												
												<?php
												if (has_post_thumbnail()) {
													the_post_thumbnail('medium');
												} else {
													echo '<img src="'.get_template_directory_uri().'/images/small.png">';
												}							
												?>
												<span class="btn btn-primary" style="display:block;">Edit Track</span>
												<span class="edit-click btn btn-primary" style="display:block;">Delete Track</span>
											</div>											
											<div class="col-sm-10">
												<h3><strong>Track Title : 
												<?php the_title(); ?></strong></h3>
												<p><strong>Track Information</strong>
												<?php the_field('track_information'); ?></p>
											</div>
										</div>
										<div class="edit-form edit-form-<?php echo get_the_ID(); ?>">
											<div class="row">
												<div class="col-md-12">
													<form>
														<p>edit form to go in here</p>
														<span class="btn btn-success">Update Track</span>
													</form>
												</div>
											</div>
										</div>
									</div>										            			

								<?php }
							} 		
							// Restore original Post Data
							wp_reset_postdata();
							?>				 		
				    </tbody>
				</table> 
			</div>
			<div role="tabpanel" class="tab-pane" id="editprofile">
				 <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
            		<?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <p class="form-username">
                        <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                        <input class="text-input form-control" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-username">
                        <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                        <input class="text-input form-control" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                    </p><!-- .form-username -->
                    <p class="form-email">
                        <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                        <input class="text-input form-control" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                    </p><!-- .form-email -->
                    <p class="form-url">
                        <label for="url"><?php _e('Website', 'profile'); ?></label>
                        <input class="text-input form-control" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                    </p><!-- .form-url -->
                    <p class="form-password">
                        <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                        <input class="text-input form-control" name="pass1" type="password" id="pass1" />
                    </p><!-- .form-password -->
                    <p class="form-password">
                        <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input class="text-input form-control" name="pass2" type="password" id="pass2" />
                    </p><!-- .form-password -->
                    <p class="form-textarea">
                        <label for="description"><?php _e('User Bio *', 'profile') ?></label>
                        <textarea class="form-control"name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                    </p><!-- .form-textarea -->

                    <?php 
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user); 
                    ?>
                    <p class="form-submit">
                        <?php echo $referer; ?>
                        <input name="updateuser" type="submit" id="updateuser" class="btn btn-primary" value="<?php _e('Update', 'profile'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
            <?php endif; ?>
			</div>			
		</div>

	</div>





</div>