<?php 
// Custom post-type Erfaring
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
			'supports' => array('title','author', 'editor', 'comments')
		)
	);
}

// Add Custom Field To Category Form
add_action( 'category_add_form_fields', 'category_form_custom_field_add', 10 );
add_action( 'category_edit_form_fields', 'category_form_custom_field_edit', 10, 2 );

function category_form_custom_field_add( $taxonomy ) {
?>
<div class="form-field">
  <label for="category_custom_color">Kategori farve</label>
  <input name="category_custom_color" id="category_custom_color" type="text" value="" size="40" aria-required="true" />
  <p class="description">Angiv en farve til kategorien eks. "#808080".</p>
</div>
<?php
}

function category_form_custom_field_edit( $tag, $taxonomy ) {

	$option_name = 'category_custom_color_' . $tag->term_id;
	$category_custom_color = get_option( $option_name );

?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_custom_color">Custom color</label></th>
  <td>
    <input type="text" name="category_custom_color" id="category_custom_color" value="<?php echo esc_attr( $category_custom_color ) ? esc_attr( $category_custom_color ) : ''; ?>" size="40" aria-required="true" />
    <p class="description">Angiv en farve til kategorien eks. "#808080".</p>
  </td>
</tr>
<?php
}

/** Save Custom Field Of Category Form */
add_action( 'created_category', 'category_form_custom_field_save', 10, 2 );	
add_action( 'edited_category', 'category_form_custom_field_save', 10, 2 );

function category_form_custom_field_save( $term_id, $tt_id ) {

	if ( isset( $_POST['category_custom_color'] ) ) {			
		$option_name = 'category_custom_color_' . $term_id;
		update_option( $option_name, $_POST['category_custom_color'] );
	}
}
?>