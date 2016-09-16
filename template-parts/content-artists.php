<div class="col-sm-10" id="sectionreplace">
    <div class="row">
        <div class="col-md-12">
            <h2><?php the_title(); ?></h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 userGrid">
            <?php
			// WP_User_Query arguments
				$args = array (
					'role'           => 'artist',
					'fields'         => 'all',
				);

				// The User Query
				$user_query = new WP_User_Query( $args );

				// The User Loop
				if ( ! empty( $user_query->results ) ) {
					foreach ( $user_query->results as $user ) { ?>

                <div class="grid-item track">
                    <div class="user-container">
                        <center>
                            <?php
									if (get_field('profile_picture', $user->ID)) { ?>
                                <img src="<?php the_field('profile_picture', 'user_'.$user->ID); ?>">
                                <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/small.png">
                                <?php } ?>
                                <strong>Name : <?php echo $user->display_name; ?></strong>
                                <a class="btn btn-primary" href="<?php echo get_author_posts_url( $user->ID ); ?> ">View my profile</a>
                                <div class="row sharelinks">
                                    <div class="col-xs-2">
                                        <a title="<?php the_title(); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                                    </div>
                                    <div class="col-xs-2">
                                        <a title="<?php the_title(); ?>" href="https://twitter.com/home?status=<?php the_permalink(); ?>%0A"><i class="fa fa-twitter"></i></a>
                                    </div>
                                    <div class="col-xs-2">
                                        <a title="<?php the_title(); ?>" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
                                    </div>
                                </div>
                        </center>
                    </div>
                </div>

                <?php } 

				} else {
					// no users found
				}
			?>
        </div>

    </div>

</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
            jQuery('.userGrid').masonry({
            //options
            itemSelector: '.grid-item',
            columnWidth: 200
        }); 
    })
</script>