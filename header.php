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
	<script>
	        tinymce.init({selector:'#postContent'});
	</script>
<!-- Body -->
<body <?php body_class(); ?>>
	<div id="page">
		<header id="header">
			<div class="row">
				<div class="large-4 columns">
					<?php
					if ( is_user_logged_in() ) { ?>
						<span>
							<a href="#" id="newPostButton">+</a>
						</span>
					<?php } else { ?>
					<?php }
					?>
				</div>
				<div class="large-4 columns">
					<a href="<?php echo home_url(); ?>"><h1 class="text-center">Vidensbanken</h1></a>
				</div>
				<div class="large-4 columns">
					<?php
					if ( is_user_logged_in() ) { ?>
							<a href="<?php echo site_url(); ?>/wp-admin" class="small secondary button right">Admin</a>
							<a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="small secondary button right">Logud</a>	
					<?php } else { ?>
							<a href="<?php echo wp_login_url( get_permalink() ); ?>" class="small secondary button right">Login</a>
						</span>
					<?php }
					?>
				</div>
			</div>
		</header> <!-- Topbar  -->
		<div id="newPost">
			<?php get_template_part( 'templates/post-form' ); ?>
		</div>
