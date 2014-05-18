<?php 
add_action( 'init', 'create_post_type' );
	function create_post_type() {
	register_post_type( 'erfaringer',
		array(
			'labels' => array(
			'name' => __( 'Erfaringer' ),
			'singular_name' => __( 'Erfaring' )
			),
			'public' => true,
			'rewrite' => true,
			'show_ui' => true, // UI in admin panel
			'taxonomies' => array('category', 'post_tag'),
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','author', 'editor')
		)
	);
}
?>