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
	<div class="row">
		<div class="large-12 columns">
			<div class="hero">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
    <div class="row" role="content" class="hero">
    	<h1 class="text-center">Siden du søger findes desværre ikke!<br> Prøv at søg i feltet herover</h1>
    </div>
</section>

<?php get_footer(); ?>