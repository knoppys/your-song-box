<?php

/***************************
* Load SCP Scripts
****************************/
function scp_front_styles() {        

		wp_register_style( 'bootstrapcss', get_template_directory_uri() .'/css/bootstrap.min.css');
        wp_enqueue_style( 'bootstrapcss' );
        wp_register_style( 'fontawesome', get_template_directory_uri() .'/css/font-awesome.min.css');
        wp_enqueue_style( 'fontawesome' );
        wp_register_style( 'styles', get_stylesheet_uri() );
        wp_enqueue_style( 'styles' );
     
}
add_action( 'wp_enqueue_scripts', 'scp_front_styles' );

function scp_front_scripts() {    
    
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );      
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array('jquery'), '', false );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
    wp_localize_script( 'scripts', 'siteUrlobject', array('siteUrl' => get_bloginfo('url')));
}

add_action( 'wp_enqueue_scripts', 'scp_front_scripts' );



add_filter('show_admin_bar', '__return_false');
/***************************
* Enable post thumbnails
****************************/

add_theme_support( 'post-thumbnails' );  
/***************************
* Load Menus here
****************************/
register_nav_menus( array(
	'primary' => __( 'Primary' ),
) );


/***************************
* Register Sidebars
****************************/
	$args1 = array(
		'name'          => __( 'Blog Sidebar' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	); 
	register_sidebar( $args1 );

/***************************
* Register Sidebars
****************************/
	$args1 = array(
		'name'          => __( 'Home Popularity Row' ),
		'id'            => 'sidebar-home',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-sm-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' 
	); 
	register_sidebar( $args1 );

/***************************
* Register Sidebars
****************************/
	$args1 = array(
		'name'          => __( 'Right Sidebar' ),
		'id'            => 'sidebar-right',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="col-sm-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>' 
	); 
	register_sidebar( $args1 );



/***************************
* Custom Excerpt
****************************/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Register Custom Post Type
function cpt_music() {

	$labels = array(
		'name'                  => _x( 'Tracks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Track', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tracks', 'text_domain' ),
		'name_admin_bar'        => __( 'Track', 'text_domain' ),
		'archives'              => __( 'Track Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Track:', 'text_domain' ),
		'all_items'             => __( 'All Tracks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Track', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Track', 'text_domain' ),
		'edit_item'             => __( 'Edit Track', 'text_domain' ),
		'update_item'           => __( 'Update Track', 'text_domain' ),
		'view_item'             => __( 'View Track', 'text_domain' ),
		'search_items'          => __( 'Search Track', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Tracks list', 'text_domain' ),
		'items_list_navigation' => __( 'Tracks list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Track', 'text_domain' ),
		'description'           => __( 'Music Tracks', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'author', 'thumbnail' ),
		'taxonomies'            => array( 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'music', $args );

}
add_action( 'init', 'cpt_music', 0 );

// Register Custom Taxonomy
function music_tax() {

	$labels = array(
		'name'                       => _x( 'Genre\'s', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Genre', 'text_domain' ),
		'all_items'                  => __( 'All Genre\'s', 'text_domain' ),
		'parent_item'                => __( 'Parent Genre', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'text_domain' ),
		'new_item_name'              => __( 'New Genre Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Genre', 'text_domain' ),
		'edit_item'                  => __( 'Edit Genre', 'text_domain' ),
		'update_item'                => __( 'Update Genre', 'text_domain' ),
		'view_item'                  => __( 'View Genre', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Genre\'s with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Genre\'s', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Genre\'s', 'text_domain' ),
		'search_items'               => __( 'Search Genre\'s', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Genre\'s', 'text_domain' ),
		'items_list'                 => __( 'Genre\'s list', 'text_domain' ),
		'items_list_navigation'      => __( 'Genre\'s list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genre', array( 'music' ), $args );

}
add_action( 'init', 'music_tax', 0 );



// Register Custom Post Type
function cpt_events() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Event:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'search_items'          => __( 'Search Event', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Events list', 'text_domain' ),
		'items_list_navigation' => __( 'Events list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Events', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor','author', 'thumbnail' ),
		'taxonomies'            => array( 'event-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'cpt_events', 0 );

// Register Custom Taxonomy
function event_tax() {

	$labels = array(
		'name'                       => _x( 'Event Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Event Category', 'text_domain' ),
		'all_items'                  => __( 'All Event Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Event Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Event Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Event Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Event Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Event Category', 'text_domain' ),
		'update_item'                => __( 'Update Event Category', 'text_domain' ),
		'view_item'                  => __( 'View Event Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Event Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Event Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Event Categories', 'text_domain' ),
		'search_items'               => __( 'Search Event Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Event Categories', 'text_domain' ),
		'items_list'                 => __( 'Event Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Event Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event-category', array( 'event' ), $args );

}
add_action( 'init', 'event_tax', 0 );


function registration_process_hook() {
	if (isset($_POST['adduser']) && isset($_POST['add-nonce']) && wp_verify_nonce($_POST['add-nonce'], 'add-user')) {
	
		// die if the nonce fails
		if ( !wp_verify_nonce($_POST['add-nonce'],'add-user') ) {
			wp_die('Sorry! That was secure, guess you\'re cheatin huh!');
		} else {
			// auto generate a password
			$user_pass = wp_generate_password();
			// setup new user
			$userdata = array(
				'user_pass' => $user_pass,
				'user_login' => esc_attr( $_POST['user_name'] ),
				'user_email' => esc_attr( $_POST['email'] ),
				'role' => esc_attr( $_POST['role']),
			);
			// setup some error checks
			if ( !$userdata['user_login'] )
				$error = 'A username is required for registration.';
			elseif ( username_exists($userdata['user_login']) )
				$error = 'Sorry, that username already exists!';
			elseif ( !is_email($userdata['user_email'], true) )
				$error = 'You must enter a valid email address.';
			elseif ( email_exists($userdata['user_email']) )
				$error = 'Sorry, that email address is already used!';
			// setup new users and send notification
			else{
				$new_user = wp_insert_user( $userdata );
				wp_new_user_notification($new_user, $user_pass);
			}
		}
	}
	if ( $new_user ) : ?>

	<p class="alert"><!-- create and alert message to show successful registration -->
	<?php
		$user = get_user_by('id',$new_user);
		echo 'Thank you for registering ' . $user->user_login;
		echo '<br/>Please check your email address. That\'s where you\'ll recieve your login password.<br/> (Be sure to check your spam folder)';
	?>
	</p>
	
	<?php else : ?>
	
		<?php if ( $error ) : ?>
			<p class="error"><!-- echo errors if users fails -->
				<?php echo $error; ?>
			</p>
		<?php endif; ?>
	
	<?php endif;

}
add_action('process_customer_registration_form', 'registration_process_hook');


//get the genres page content via ajax
function applyeventajax() {

			
			$userID = ($_POST['userID']);
			$authorID = ($_POST['authorID']);

				$to = get_the_author_meta('user_email', $authorID);
				$subject = 'An artist has applied to attend your event.';
				$message = get_the_author_meta('user_display_name').' has applied to attend your event.';
				$headers .= "Content-type: text/html;charset=utf-8\n";
		        $headers .= "X-Priority: 3\n";
		        $headers .= "X-MSMail-Priority: Normal\n";
		        $headers .= "X-Mailer: php\n";
		        $headers .= "From: YourSongBox <applications@yoursongbox.com>\n";
		        wp_mail( $to, $subject, $message, $headers);

			die();
				
		}

add_action('wp_ajax_applyeventajax', 'applyeventajax');
add_action('wp_ajax_nopriv_applyeventajax', 'applyeventajax');






function wp_delete_post_link($link = 'Delete This', $before = '', $after = '') {
	global $post;
	if ( $post->post_type == 'music' ) {
		if ( !current_user_can( 'edit_page', $post->ID ) )
			return;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ) )
			return;
		}
$link = "<a href='" . wp_nonce_url( get_bloginfo('url') . "/wp-admin/post.php?action=delete&amp;post=" . $post->ID, 'delete-post_' . $post->ID) . "'>".$link."</a>";
echo $before . $link . $after;
}


//Add music voa ajax
function addmusicajax() {

		//$tracktitle = ($_POST['tracktitle']);
		$author = ($_POST['theuserID']);
		$trackinformation = ( $_POST['track_information'] );
		$tracksource = ( $_POST['tracksource'] );
		$trackcover = ( $_POST['trackcover'] );		
		$genre = ( $_POST['genre'] );		

		$newmusic = array(
		  'post_title'  => wp_strip_all_tags( ($_POST['tracktitle']) ),
		  'post_author' => ($_POST['theuserID']),
		  'post_type'	=> 'music',
		  'post_status' => 'publish',
		  'meta_input'	=> array(		  		
				'track_information' => $trackinformation,
				'track_source' => $tracksource,
				'track_image' => $trackcover		
		  	)
		);
		 $pid = wp_insert_post( $newmusic );
       	 wp_set_post_terms($pid, $_POST['genre'], 'genre', true); // inserts genre to the track

		echo 'Succesfully submitted [Knoppys Development Message]';
		die();			
		}

add_action('wp_ajax_addmusicajax', 'addmusicajax');
add_action('wp_ajax_nopriv_addmusicajax', 'addmusicajax');





?>