<?php

/*
 * Template Name: Default Page Template
 */

get_header(); ?>

    <!-- Main Content -->
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'default' ); ?>
        <?php endwhile; ?>
        
    <?php endif; ?>
    <!-- End Main Content -->

<?php get_footer(); ?>