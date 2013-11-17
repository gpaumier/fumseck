<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title('—', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'fumseck' ); ?>"><?php _e( 'Skip to content', 'fumseck' ); ?></a>

		<div id="page">
			<header id="site-header">
				<div class="container">
					<nav id="site-navigation" class="navbar" role="navigation">
						<div class="navbar-header"> <!-- Toggle buttons when navigation  -->
							
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-settings">
								<span class="sr-only">Toggle settings</span>
								<i class="fa fa-cog fa-1g"></i> <span class="navbar-toggle-label">Settings <i class="fa fa-caret-down fa-smaller"></i></span>
							</button>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-menu">
								<span class="sr-only">Toggle navigation</span>
								<i class="fa fa-bars fa-1g"></i> <span class="navbar-toggle-label">Menu <i class="fa fa-caret-down fa-smaller"></i></span>
							</button>
								<h1 class="navbar-brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<!-- TODO: style <h2 class="site-tagline"><?php bloginfo( 'description' ); ?></h2> -->
						</div>
						
						<div class="collapse navbar-collapse" id="bs-navbar-collapse-menu">
							<ul id="menu-nav-menu" class="nav navbar-nav navbar-right">
									<li class="visible-xs">
									<?php get_search_form(); ?>
								</li>
								<li role="presentation" class="divider"></li>
								<?php wp_nav_menu(array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '%3$s')); ?>
								<li class="dropdown visible-lg">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Search"><i class="fa fa-search fa-fw"></i><i class="fa fa-caret-down fa-smaller"></i></a>
									<ul class="dropdown-menu" aria-labelledby="bs-navbar-collapse-search-dropdown">
										<li><?php get_search_form(); ?></li>
									</ul>
								</li>
								<li class="dropdown visible-lg">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Settings"><i class="fa fa-cog fa-fw"></i><i class="fa fa-caret-down fa-smaller"></i></a>
									<ul class="dropdown-menu" aria-labelledby="bs-navbar-collapse-settings-dropdown">
										<li role="presentation" class="dropdown-header"><?php _e('Language', 'fumseck'); ?></li>
										<?php fumseck_list_languages(); ?>
									</ul>
								</li>
							</ul>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-navbar-collapse-settings">
							<ul class="nav navbar-nav navbar-right hidden-lg" aria-labelledby="bs-navbar-collapse-settings-collapsed">
								<li role="presentation" class="dropdown-header"><?php _e('Language', 'fumseck'); ?></li>
									<?php fumseck_list_languages(); ?>
							</ul>
						</div>
						

					</nav><!-- #site-navigation -->
				</div>
			</header> <!-- #site-header -->

			<div id="main">
				
				
				

