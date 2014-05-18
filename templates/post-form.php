<?php 
/***************************************
		FRONT-END CONTENT-FORM
***************************************/ ?>
<form action="" id="primaryPostForm" method="POST">
 
        <label for="postTitle">Skriv en titel</label>
        <input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>"/>
 
 		<label for="postTitle">Skriv en category</label>
 		<select type="text" name="postCategory" id="postCategory" class="required" value="<?php if ( isset( $_POST['postCategory'] ) ) echo $_POST['postCategory']; ?>"/>
 			<?php
 			$args = array(
 			  'hide_empty' => 0,
 			  );
 			$categories = get_categories($args);
 			  foreach($categories as $category) {
 			  	echo '<option value='. $category->cat_ID .'> '. $category->name . '</option>';
 			 } 
 			?>
 		</select>


        <label for="postContent">Lav en beskrivelse af din erfaring</label>
        <textarea name="postContent" id="postContent" rows="8" cols="30" class="required" <?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } } ?>></textarea>
 
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <button type="submit" class="expand">Opret din erfaring</button>
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>

        
    <?php if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
	<?php } ?>

</form>


