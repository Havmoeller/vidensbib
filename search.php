<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>
    <section id="searchresult" class="hero">
            <div class="row">
                <div class="large-12 columns">
                    <div class="hero">
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <hr>
            </div>
            <h3 class="text-center"><?php echo $wp_query->found_posts; ?> resultater for "<?php echo get_search_query(); ?>"</h3>
				<?php 
					global $wp_query;
					query_posts( 
					    wp_parse_args(
					       $wp_query->query,
					       array( 'posts_per_page' => -1 )
					    )
					);
				 ?>

                    <section role="main">
                        <div class="row">
                            <div class="large-12 columns">
                                <ul id="snippets" class="large-block-grid-3 medium-block-grid-3">
                                <?php
                                $args = array( 'post_type' => 'erfaringer', 'posts_per_page' => 12 );
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <li style="border-color: <?php echo category_description(); ?>">
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
            </div>

        </div>
    </section>
</div>

<?php get_footer(); ?>