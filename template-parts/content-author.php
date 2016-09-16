<div class="col-sm-12" id="sectionreplace">

    <div class="row">
        <div class="col-md-12">
            <?php
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));				
			$user_ID = get_current_user_id();	
           							
			?>
                <h2>This is <?php echo $curauth->nickname; ?>'s page</h2>
                <div class="row">
                    <div class="col-sm-3 user-profile">
                        <?php
					if (get_field('profile_picture', 'user_'.$curauth->ID)) { ?>
                            <img src="<?php the_field('profile_picture', 'user_'.$curauth->ID); ?>">
                            <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/small.png">
                            <?php } ?>
                    </div>
                    <div class="col-sm-9">
                        <h2>Bio</h2>
                        <?php the_field('about_you', 'user_'.$curauth->ID); ?>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-12">
                            <ul id="profiletabs" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                <?php
                                //show additonal profile navigation if current user is on their own author page.
                                if ($user_ID == $curauth->ID) { ?>
                                    <li role="presentation"><a href="#addmusic" aria-controls="addmusic" role="tab" data-toggle="tab">My Music</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                    <li role="presentation"><a href="#profilesettings" aria-controls="messages" role="tab" data-toggle="tab">Profile</a></li>
                                    
                                <?php } ?>                   
                             </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo get_template_part('template-parts/authors/tab-content-home'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                //show additonal profile navigation if current user is on their own author page.
                                if ($user_ID == $curauth->ID) { ?>
                                    <div role="tabpanel" class="tab-pane" id="addmusic">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo get_template_part('template-parts/authors/tab-content-addmusic'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo get_template_part('template-parts/authors/tab-content-messages'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profilesettings" class="profile">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php //echo do_shortcode('[PROFILE_FORM]'); ?>
                                            </div>
                                        </div>
                                    </div>
                                  
                                <?php } ?> 
                                
                            </div>
                        </div>
                    </div>




        </div>
    </div>

</div>