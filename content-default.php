<?php
/**
 * Content Default
 *
 * Loop content in single post template (single.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<!-- Case start -->
<article <?php post_class('default'); ?>>
     <div class="row">
        <div class="large-4">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div class="large-8">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_content(); ?>
        </div> 
    </div>
</article>
<!-- Case end -->
