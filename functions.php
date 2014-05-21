	<?php

	/**
	 * Functions
	 *
	 * Core functionality and initial theme setup
	 *
	 * @package WordPress
	 * @subpackage Foundation, for WordPress
	 * @since Foundation, for WordPress 4.0
	 */

	/**
	 * Enqueue Scripts and Styles for Front-End
	 */

	if ( ! function_exists( 'assets' ) ) :

	function assets() {

		if (!is_admin()) {

			// * 
			//  * Deregister jQuery in favour of ZeptoJS
			//  * jQuery will be used as a fallback if ZeptoJS is not compatible
			//  * @see foundation_compatibility & http://foundation.zurb.com/docs/javascript.html
			 
			wp_deregister_script('jquery');

			// Load JavaScripts
			wp_enqueue_script( 'jquery', get_template_directory_uri().'/assets/js/jquery.js');
			wp_enqueue_script( 'tineMCE', "//tinymce.cachefly.net/4.0/tinymce.min.js");
			wp_enqueue_script( 'modernizr', get_template_directory_uri().'/assets/js/modernizr.js');

			// if ( is_singular() ) wp_enqueue_script( "comment-reply" );

			// Load Stylesheets
			wp_enqueue_style( 'style', get_stylesheet_uri() );
		}

	}

	add_action( 'wp_enqueue_scripts', 'assets' );

	endif;

	/**
	 * Enqueue Scripts in footer
	 */

	if ( ! function_exists( 'footer_scripts' ) ) :

	function footer_scripts () {
	    // Load JavaScripts
	    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/js/foundation.js');
	    wp_enqueue_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');
	    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js');
	}

	add_action('wp_footer', 'footer_scripts');

	endif;


	/**
	 * Register Navigation Menus
	 */

	if ( ! function_exists( 'menus' ) ) :

	// Register wp_nav_menus
	function menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Hovedmenu', '' )
			)
		);
	}

	add_action( 'init', 'menus' );

	endif;


	/**
	 * Register Sidebars
	 */

	if ( ! function_exists( 'widgets' ) ) :

	function widgets() {

		// Sidebar Oplevelse
		register_sidebar( array(
				'id' => 'footer_widget',
				'name' => __( 'Footer', '' ),
				'description' => __( 'This widget is located in the footer', '' ),
				'before_widget' => '<footer id="footer"> <div class="row">',
				'after_widget' => '</div></footer>',
				'before_title' => '<h1 class="text-center">',
				'after_title' => '</h1>',
			) );
		}

	add_action( 'widgets_init', 'widgets' );

	endif;



	/**
	 * Custom Post Excerpt
	 */

	if ( ! function_exists( 'custom_excerpt' ) ) :

	function custom_excerpt($text) {
	        global $post;
	        if ( '' == $text ) {
	                $text = get_the_content('');
	                $text = apply_filters('the_content', $text);
	                $text = str_replace('\]\]\>', ']]&gt;', $text);
	                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
	                $text = strip_tags($text, '<p>');
	                $excerpt_length = 25;
	                $words = explode(' ', $text, $excerpt_length + 1);
	                if (count($words)> $excerpt_length) {
	                        array_pop($words);
	                        array_push($words, '<br><br><a href="'.get_permalink($post->ID) .'" class="button secondary small expand"> Se mere.. </a>');
	                        $text = implode(' ', $words);
	                }
	        }
	        return $text;
	}

	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'custom_excerpt');

	endif;

	/** 
	 * Comments Template
	 */
 
	if ( ! function_exists( 'foundation_comment' ) ) :

	function foundation_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Redigere)', 'foundation' ), '<span>', '</span>' ); ?></p>
		<?php
			break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="header">
					<span class="author"> <?php echo get_avatar( $comment, 80 ); ?> </span>
					<span class="timestamp"><?php echo get_comment_date("j. F Y", $comment_ID ); ?></span>
				</header>
				<section class="text">
					<?php comment_text(); ?>
				</section><!-- .comment-content -->

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Svar', 'foundation' ), 'after' => ' &darr; <br>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

				</div>
			</article>
		<?php
			break;
		endswitch;
	}
	endif;



	/***************************************
			CUSTOM ADMIN ICONS
	***************************************/
	function admin_icon()
	{
		echo '
			<style> 
				#adminmenu #menu-posts-clients div.wp-menu-image:before { content: "\f319"; }
				#adminmenu #menu-posts-partner div.wp-menu-image:before { content: "\f307"; }
				#adminmenu #menu-posts-service div.wp-menu-image:before { content: "\f155"; }
				#adminmenu #menu-posts-belief div.wp-menu-image:before { content: "\f130"; }
				#adminmenu #menu-posts-testimonials div.wp-menu-image:before { content: "\f122"; }
				#adminmenu #menu-posts-slides div.wp-menu-image:before { content: "\f128"; }
				#adminmenu #menu-posts-cases div.wp-menu-image:before { content: "\f133"; }
			</style>
		';	
	}
	add_action( 'admin_head', 'admin_icon' );

	require('inc/cpt.php');
	?>
