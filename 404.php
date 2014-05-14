<?php
/**
 * 404.php Page
 *
 * Loop content in page template (page.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
get_header(); ?>
<section id="error-page">
    <div class="row" role="content">
    	<h1 class="text-center">Sorry, we couldn't find what you were looking for.</h1>
    </div>
    <div class="row">
    	<div class="large-6 large-centered medium-6 medium-centered columns">
    		<a id='goback' class='button small secondary expand'href="<?php echo esc_url( home_url( '/' ) ); ?>"> Go back to the frontpage </a>
    	</div>
    </div>
</section> <!-- strategies -->
<?php get_footer(); ?>