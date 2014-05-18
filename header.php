<?php
/**
 * Page Header
 */
?>
<!DOCTYPE html>
<?php get_template_part( 'inc/frontend-posting' ); ?>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title><?php wp_title(); ?></title>

		<?php wp_head(); ?>
	</head>
<!-- Body -->
<body <?php body_class(); ?>>
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="large-3 columns">
					<?php
					if ( is_user_logged_in() ) { ?>
						<span>
							<a href="#" id="newPostButton">+</a>
						</span>
					<?php } else { ?>
					    <span>
							<a href="<?php echo wp_login_url( get_permalink() ); ?>"  class="button">Login</a>
						</span>
					<?php }
					?>
				</div>
				<div class="large-5 large-pull-4 columns">
					<a href="<?php echo home_url(); ?>"><h1 class="text-center">Vidensbanken</h1></a>
				</div>
			</div>
		</header> <!-- Topbar  -->
		<div id="newPost">
			<span id="hidePostButton" class="close">x</span>
			<?php get_template_part( 'templates/post-form' ); ?>
		</div>
