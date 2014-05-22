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

	/***************************************
			ENQUEUE SCRIPTS AND STYLES
	***************************************/

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

	/***************************************
			ENQUEUE SCRIPTS IN FOOTER
	***************************************/

	if ( ! function_exists( 'footer_scripts' ) ) :

	function footer_scripts () {
	    // Load JavaScripts
	    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/js/foundation.js');
	    wp_enqueue_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');
	    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js');
	}

	add_action('wp_footer', 'footer_scripts');

	endif;

	/***************************************
			MAKE ARCHIVE PAGE FOR CPT
	***************************************/
	
	function custom_archieve( $query ) {
	  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	    $query->set( 'post_type', array(
	     'post', 'erfaringer'
			));
		  return $query;
		}
	}
	add_filter( 'pre_get_posts', 'custom_archive' );


	/***************************************
				SEARCH ALL
	***************************************/
	// Define what post types to search
	function searchAll( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', array( 'post','erfaringer'));
		}
		return $query;
	}

	// The hook needed to search ALL content
	add_filter( 'the_search_query', 'searchAll' );

	/***************************************
				COMMENTS TEMPLATE
	***************************************/
 
	if ( ! function_exists( 'foundation_comment' ) ) :

	function foundation_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Redigér)', 'foundation' ), '<span>', '</span>' ); ?></p>
		<?php
			break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<div class="panel">
					<header class="header">
						<span class="author"> <?php echo get_avatar( $comment, 80 ); ?> </span>
						<span class="authorname"><?php comment_author(); ?> </span>
						<span class="timestamp"><?php echo get_comment_date("j. F Y", $comment_ID ); ?></span>
					</header>
					<hr>
					<section class="text">
						<?php comment_text(); ?>
					</section><!-- .comment-content -->

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Kommentér dette indlæg'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

					</div>
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

	/***************************************
			ADDITIONAL INCLUDES
	***************************************/
	require('inc/cpt.php'); 
	?>
