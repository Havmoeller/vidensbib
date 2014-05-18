<?php
/**
 * Content Single
 *
 * Loop content in single post template (single.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>


<section class="content hero">
	<div class="row">
		<div class="large-12 columns">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="large-12 columns">	
						<?php
							$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
							
							echo "<a href='$url' class='button small secondary'></i>Tilbage</a>"; 
						?>
					</div>
				</div>
				<div class="row">	
					<div class="large-12 columns">
						<h1><?php the_title(); ?></h1>
						<span><strong>Kategori: </strong><?php the_category(', '); ?></span>
						<span> <?php the_tags('<strong>Tags: </strong> ', ', ', '<br />'); ?> </span>
						<hr>
						<div class="row">
							<div class="large-8 columns">	
								<?php the_content(); ?>
							</div>
							<div class="large-4 columns">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
					</div>
				</div>
			</article>

		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<?php comment_form(); ?>
		</div>
	</div>

</section>