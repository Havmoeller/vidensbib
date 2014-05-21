	<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comment-wrapper">
<div class="row">
	<div class="large-12 columns">
		<?php if ( have_comments() ) : ?>
			<h4 class="comments-title">
				<span>Kommentarer til "<?php echo get_the_title(); ?>"</span>
			</h4>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'foundation_comment', 'style' => 'ol' ) ); ?>
			</ol><!-- .commentlist -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="navigation" role="navigation">
				<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
			</nav>
			<?php endif; // check for comment navigation ?>

			<?php
			/* If there are no comments and comments are closed, let's leave a note.
			 * But we only want the note on posts and pages that had comments in the first place.
			 */
			if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
			<?php endif; ?>

		<?php endif; // have_comments() ?>

		<?php if ( comments_open() ) : ?>

			<div id="respond" class="row">
				<div class="large-12 columns">
					<h3 class="reply-title"><?php comment_form_title( 'Skriv en kommentar' ); ?></h3>

					<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
						<p>Du skal være<a href="<?php echo wp_login_url( get_permalink() ); ?>">logget ind</a> for at kommentere.</p>
					<?php else : ?>
					
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

						<?php if ( is_user_logged_in() ) : ?>

							<p>Logget ind som <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>

						<?php endif; ?>

						<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
						<textarea placeholder="Skriv en kommentar til indlægget" name="comment" id="commentarea"></textarea>
						<input class="button secondary right" name="submit" type="submit" id="submit" tabindex="5" value="Send kommentar" />
						<?php comment_id_fields(); ?>
			
						
						<?php do_action('comment_form', $post->ID); ?>

					</form>

					<?php endif; // If registration required and not logged in ?>
				</div>	
			</div>

		<?php endif; ?>
	</div>
</div>

</div><!-- #comments .comments-area -->