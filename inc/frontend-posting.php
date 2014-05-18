<?php 
// Validate the inserting 
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
 
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }
 
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['postTitle'] ), // Get the title
        'post_content' => $_POST['postContent'], // Get the content
        'post_type' => 'erfaringer', // Define post-type
        'tax_input' => array( 'category' => $_POST['postCategory'] ),
        'tags_input' => $_POST['postTag'], // Get the tags
        'post_status' => 'publish' // Define post-status
    );
 
    wp_insert_post( $post_information );
 
}
 
// Redirects the user if double-post
$post_id = wp_insert_post( $post_information );
if ( $post_id ) {
    wp_redirect( home_url() );
    exit;
} 
?>