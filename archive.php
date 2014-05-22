<?php 
/*
Template Name: Archives
*/

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
			<ul id="blocks" class="large-block-grid-3 medium-block-grid-3">
			<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					 <?php get_template_part( 'templates/block', 'post' ); ?>
				<?php endwhile; ?>

			<?php else : ?>

				<h2>Ingen posts desværre</h2>
				<p class="lead">Det er sket en fejl. </p>
				
			<?php endif; ?>
         	</ul>
		</div>
	</div>
</section>

        
<?php get_footer(); ?>