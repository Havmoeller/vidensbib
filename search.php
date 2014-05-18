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
            <div class="large-8 columns">
                    <h3 class="text-center"><?php echo $wp_query->found_posts; ?> resultater for "<?php echo get_search_query(); ?>"</h3>
                <hr>
				<?php 
					global $wp_query;
					query_posts( 
					    wp_parse_args(
					       $wp_query->query,
					       array( 'posts_per_page' => -1 )
					    )
					);
				 ?>
                 <?php /* Start the Loop */ ?>
                 <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                 <?php endwhile; ?>

                    <div class="row">
                        <div class="large-4 large-centered columns">
                            <ul class="pagination">
                              <li class="arrow unavailable"><a href="">&laquo;</a></li>
                              <li class="current"><a href="">1</a></li>
                              <li class="unavailable"><a href="">&hellip;</a></li>
                              <li><a href="">3</a></li>
                              <li class="arrow"><a href="">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
        <!-- Results done -->
            <div class="large-4 columns">
                <div class="panel">
                    <h4>Kontaktoplysninger</h4>
                    <hr>
                    <ul>
                        <li>Frederiksborgvej 5, 3450 Allerød</li>
                        <li>Tlf: 23 23 00 55</li>
                        <li>E-mail:<a href="mailto:post@jadea.dk?Subject=Hej%20Jadea" target="_blank">post@jadea.dk</a></li>
                        <li>CVR: 25 07 23 91</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>