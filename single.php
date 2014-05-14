<?php
/**
 * Single
 *
 * Loop container for single post content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'templates/content', 'single' ); ?>
		<?php endwhile; ?>
		
	<?php endif; ?>

<?php get_footer(); ?>