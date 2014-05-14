<?php
/**
 * Page Header
 */
?>
<!DOCTYPE html>
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

		<header id="topbar">
			<div class="row">
				<!-- Desktop-menu -->
				<div class="large-9 columns show-for-large-up">
						<?php wp_nav_menu( array(
							'menu' => 'Hovedmenu',
							'container' => '',
							'container_class' 	=> '',
							'container_id'    	=> '',
							'menu_class'      	=> 'right ',
							'menu_id'			=> 'desktop-menu',
							'depth'           	=> 0
						)); ?>
				</div>
			</div> <!-- row -->

				<!-- Mobile menu -->
			<div class="show-for-medium-down">
				<?php wp_nav_menu( array(
					'menu' => 'Hovedmenu',
					'container' => '',
					'container_class' 	=> '',
					'container_id'    	=> '',
					'menu_class'      	=> '',
					'menu_id'			=> 'mobile-menu',
					'depth'           	=> 0,
				)); ?>
			</div>
				<!-- Header end -->
		</header> <!-- Topbar  -->
