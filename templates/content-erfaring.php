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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="large-12 columns">	
						<?php
							$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
							
							echo "<a href='$url' id='back' class='button small secondary'><i class='icon-arrow-left'></i><span>Tilbage</span></a>"; 
						?>
					</div>
				</div>
				<div class="row">	
					<div class="large-12 columns">
						<h1><?php the_title(); ?></h1>
						<div id="meta">
							<span id="kategori" class="left"> <i class="icon-paper-clip"></i> <strong>Kategori: </strong><?php the_category(', '); ?></span>
							<span id="tags" class="left"> <i class="icon-tag"></i> <?php the_tags('<strong>Tags: </strong> ', ', ', '<br />'); ?> </span>
							<span id="edit" class="right"> <strong><?php edit_post_link( "Redigér" ); ?> </strong></span>
							<span id="writtenby" class="right">Skrevet af: <?php the_author(); ?> - <?php the_date("j. F Y"); ?></span>
						</div>

					</div>
				</div>
				<div id="content-wrapper">
					<div class="row">
						<div class="large-10 large-centered columns">	
							<div class="panel">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</article>
		<?php comments_template() ?>
</section>