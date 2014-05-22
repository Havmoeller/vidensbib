<?php 
/***************************************
			BLOCK-POST TEMPLATE
***************************************/
?>

<?php
$categories = get_the_category();
if($categories){
	foreach($categories as $category) {

		$option_name = 'category_custom_color_' . $category->term_id; // Get the color from the specific categori
	}
}
?>
<li>
	<a href="<?php the_permalink(); ?>">
	<div class="box" style="border-color:<?php echo get_option($option_name); ?>">
		<h3><?php the_title(); ?></h3>
		<span id="timestamp"><?php the_time(get_option('date_format')); ?></span>
	</div>
	</a>
</li>