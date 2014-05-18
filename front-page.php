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
		<div class="large-12 columns">
			<ul id="snippets" class="large-block-grid-3 medium-block-grid-3">
			<?php
			$args = array( 'post_type' => 'erfaringer', 'posts_per_page' => 12 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<li>
				<a href="<?php the_permalink(); ?>">
				<div class="panel">
					<h3><?php the_title(); ?></h3>
					<div>
						<?php the_excerpt(); ?>
					</div> 
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