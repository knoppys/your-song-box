<?php

function cpt_music_add_meta_box() {

    $screens = array( 'cpt_music' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'cpt_music_sectionid',
            __( 'Add Music', 'cpt_music_textdomain' ),
            'cpt_music_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'cpt_music_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function cpt_music_meta_box_callback( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'cpt_music_meta_box', 'cpt_music_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing values
     * from the database and use the value for the form.
     */

    //track details
    $tracktitle = get_post_meta( $post->ID, 'track_title', true );
    $trackindo = get_post_meta( $post->ID, 'track_info', true );
    $tracksource = get_post_meta( $post->ID, 'track_source', true );
    $trackimage = get_post_meta( $post->ID, 'track_image', true );

    //Editor Settings
    $settings = array(
      'textarea_rows' => '20',
      )
?>
 
 <?php    

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function cpt_music_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['cpt_music_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['cpt_music_meta_box_nonce'], 'cpt_music_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['music'] ) && 'page' == $_POST['music'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( ! isset( $_POST['track_title'] ) ) {
        return;
    }

    // Update the meta field in the database.
    update_post_meta( $post_id, 'track_title', $_POST['track_title'] );
    update_post_meta( $post_id, 'track_info', $_POST['track_info'] );
    update_post_meta( $post_id, 'track_source', $_POST['track_source'] );
    update_post_meta( $post_id, 'track_image', $_POST['track_image'] );
   }
add_action( 'save_post', 'cpt_music_save_meta_box_data' );


?>
