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
							
							echo "<a href='$url' class='button small secondary'><i class='fi-arrow-left'></i> Tilbage</a>"; 
						?>
					</div>
				</div>
				<div class="row">	
					<div class="large-12 columns">
						<div class="row">
							<div class="large-12 columns">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="large-12 columns">	
								<?php the_content(); ?>
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