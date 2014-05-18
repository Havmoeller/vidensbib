<?php 
/***************************************
		FRONT-END CONTENT-FORM
***************************************/ ?>
<h3>Opret en ny erfaring</h3>
<form action="" id="primaryPostForm" method="POST">
 
        <label for="postTitle">Skriv en titel</label>
        <input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>"/>
 
 		<label for="postTitle">Vælg en kategori</label>
 		<select type="text" name="postCategory" id="postCategory" class="required" value="<?php if ( isset( $_POST['postCategory'] ) ) echo $_POST['postCategory']; ?>"/>
 			<?php
 			$args = array(
 			  'hide_empty' => 0, // Show also the unused categories
 			  );
 			$categories = get_categories($args);
 			  foreach($categories as $category) {
 			  	echo '<option value='. $category->cat_ID .'> '. $category->name . '</option>';
 			 } 
 			?>
 		</select>


        <label for="postContent">Lav en beskrivelse af din erfaring</label>
        <textarea name="postContent" id="postContent" class="required" <?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } } ?>></textarea>
 		
 		<label for="postTag">Indsæt tags (afskil med komma) </label>
 		<input type="text" name="postTag" id="postTag" class="required" value="<?php if ( isset( $_POST['postTag'] ) ) echo $_POST['postTag']; ?>"/>
       
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <button type="submit" class="expand">Opret din erfaring</button>
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>

        
    <?php if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
	<?php } ?>

</form>


