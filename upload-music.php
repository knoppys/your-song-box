<?php
/**
* Template Name: My Custom Form Page 
**/
?>

<?php
if(isset($_POST['my_form'])):
// do something with the data
    $post = array();
    $post['post_title']         = $_POST['user_title'];
    $post['post_content']       = $_POST['user_content']);
    $post['post_type']      = 'my_custom_post_type';
    $postID                 = wp_insert_post($post);
endif;
// continue to template with form
?>