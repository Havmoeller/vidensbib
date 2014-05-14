<?php 
/***************************************
			FRONT-PAGE
***************************************/
get_header(); ?>

<section role="main">
	<div class="row">
		<h2 class="text-center">Spyt lige mine posts ud</h2>
		<div class="large-12 columns">
			<ul class="large-block-grid-3">
			<?php
			$args = array( 'post_type' => 'erfaringer', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<li>
				<div class="panel">
					<h3><?php the_title(); ?></h3>
					<div>
						<?php the_excerpt(); ?>
					</div> 
				</div>
			</li>

			<?php endwhile;
         	?>
         	</ul>
		</div>
	</div>
</section>
        
<?php get_footer(); ?>