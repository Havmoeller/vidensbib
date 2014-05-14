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
							
							echo "<a href='$url' class='button small secondary'><i class='fi-arrow-left'></i> Back to cases </a>"; 
						?>
					</div>
				</div>
				<div class="row">	
					<div class="large-8 columns">
						<div class="row">
							<div class="large-12 columns">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="large-12 columns">	
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<div class="large-4 columns">
						<div class="row">
						    <div class="large-12 columns">
						        <?php the_post_thumbnail(); ?>
						    </div>
						    <div id="case-list" class="large-12 columns">
						    	<h4> Other cases </h4>
						    	<ul>
						        <?php

						            $args = array( 
						                'posts_per_page' => -1, 
						                'post_type' => 'cases'
						                 );

						            $myposts = get_posts( $args );
						            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

						            <li>
						            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						            </li>
				
						            <?php endforeach; 
						            wp_reset_postdata();?>
						        </ul>
						    </div>
						</div>
					</div>
				</div>
			</article>

		</div>
	</div>

</section>