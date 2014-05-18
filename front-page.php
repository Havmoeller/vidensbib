<?php 
get_template_part( 'inc/frontend-posting' );
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
		<div class="large-12 columns">
			<ul id="snippets" class="large-block-grid-4 medium-block-grid-3">
			<?php
			$args = array( 'post_type' => 'erfaringer', 'posts_per_page' => 12 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<li>
				<div class="panel">
					<h3><?php the_title(); ?></h3>
					<em>Skrevet af: <?php $author = get_the_author(); ?></em>
					<div>
						<?php the_excerpt(); ?>
					</div> 
				</div>
			</li>

			<?php endwhile;
         	?>
         	</ul>
         	 <?php 
 			$terms = get_categories();
 			if ( !empty( $terms ) && !is_wp_error( $terms ) ){
 			    echo "<ul>";
 			    foreach ( $terms as $term ) {
 			      echo "<li>" . $term->name . "</li>";
 			       
 			    }
 			    echo "</ul>";
 			} ?>
		</div>
	</div>
</section>

        
<?php get_footer(); ?>