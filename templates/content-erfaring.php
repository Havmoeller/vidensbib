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

						<span id="kategori" class="meta left"><strong>Kategori: </strong><?php the_category(', '); ?></span>
						<span id="tags" class="meta left"> <?php the_tags('<strong>Tags: </strong> ', ', ', '<br />'); ?> </span>
						<span id="writtenby" class="meta right">Skrevet af: <?php the_author(); ?> - <?php the_date(); ?></span>
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

	<?php comments_template() ?>


</section>