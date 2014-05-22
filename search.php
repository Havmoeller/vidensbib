<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>
    <section id="searchresult">
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
                <div class="row">
                    <div class="large-12 columns">
                        <ul id="blocks" class="large-block-grid-3 medium-block-grid-3">
                        <?php
                        while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
                        <?php
                        $categories = get_the_category();
                        if($categories){
                            foreach($categories as $category) {

                                $option_name = 'category_custom_color_' . $category->term_id; // Get the color from the specific categori
                            }
                        }
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                            <div class="box" style="border-color:<?php echo get_option($option_name); ?>">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            </a>
                        </li>

                        <?php endwhile;
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>