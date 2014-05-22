<?php 
/***************************************
			FRONT-PAGE
***************************************/

get_header(); ?>

<section role="main">
	<div class="row">
		<div class="large-12 columns">
			<div class="hero">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<?php
		$postnumber = 3 // the number of posts ?>
		<div class="large-12 columns">
			<hr>
			<h3 class="text-center"> De <?php echo $postnumber ?> nyeste erfaringer </h3>
			<ul id="blocks" class="large-block-grid-3 medium-block-grid-3">
			<?php $args = array( 'post_type' => 'erfaringer', 'posts_per_page' => $postnumber );
			$loop = new WP_Query( $args ); 
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
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
				</div>
				</a>
			</li>

			<?php endwhile;
         	?>
         	</ul>
		</div>
	</div>
</section>

        
<?php get_footer(); ?>