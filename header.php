<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page">
			<header id="primary">
				<hgroup>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-tagline"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'fumseck' ); ?></h3>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'fumseck' ); ?>"><?php _e( 'Skip to content', 'fumseck' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</header> <!-- #primary -->
			<div id="main">