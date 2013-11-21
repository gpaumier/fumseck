<?php

// Declare WordPress features the theme explicitly supports ////////////////////

add_theme_support( 'post-formats', array( 'image' ) );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

// Modify the WP query to include custom content types to search results ///////
// and archive pages

add_filter( 'pre_get_posts', 'fumseck_add_cpt_search' );

function fumseck_add_cpt_search( $query ) {
	if ( $query->is_search || $query->is_archive && ! is_admin() )
		$query->set( 'post_type', array( 'post', 'batbelt_project', 'batbelt_event' ) );
	return $query;
}

// Exclude image posts from the main blog page /////////////////////////////////

function fumseck_exclude_image_posts( $query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$feip_query = array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array(
					'post-format-image'
				),
				'operator' => 'NOT IN',
			)
		);
		$query->set( 'tax_query', $feip_query );
	}
}

add_action( 'pre_get_posts', 'fumseck_exclude_image_posts' );

// Return the linked title of a given post object //////////////////////////////

function fumseck_linked_title( $id ) {
	$post_title = get_the_title( $id );
	echo '<a href="' . esc_url( get_permalink( $id ) ) . '" title="' . esc_attr( $post_title, 'fumseck' ) . '">'. $post_title . '</a>' ;
}

// Display the default image for content without a featured image //////////////

function fumseck_default_image( $post_type ) {
	// TODO
}

// Register Bootstrap's JavaScript /////////////////////////////////////////////

function fumseck_register_bootstrap_js() {
	wp_enqueue_script(
		'bootstrap_js',
		get_stylesheet_directory_uri() . '/3rdparty/bootstrap-3.0.2/dist/js/bootstrap.min.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'fumseck_register_bootstrap_js' );

// Register the widgetized footer //////////////////////////////////////////////

function fumseck_register_footer_sidebar() {
    register_sidebar( array(
        'name' => __( 'Footer', 'fumseck' ),
        'id' => 'footer-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'fumseck_register_footer_sidebar' );

// Output the list of languages for each page //////////////////////////////////

function fumseck_list_languages() {
	$languages = icl_get_languages('skip_missing=0');
	$output = '';
	foreach ($languages as $l){
		if ($l['active']) {
			$output .= '<li role="presentation" class="setting-active" title="'
					. esc_attr( sprintf( __('This page is currently shown in %s', 'fumseck'), $l['translated_name']))
					. '"><span class="no-link-menu-item"><i class="fa fa-chevron-right fa-smaller fa-fw"></i> '
					. $l['native_name']
					. '</span></li>'
					. "\n";
		} elseif ($l['missing']) {
			$output .= '<li role="presentation" class="setting-disabled" title="'
					. esc_attr( sprintf( __('This page is not available in %s', 'fumseck'), $l['translated_name']))
					. '"><span class="no-link-menu-item"><i class="fa fa-ban fa-smaller reveal fa-fw"></i> '
					. $l['native_name']
					. '</span></li>'
					. "\n";
		} else {
			$output .= '<li role="presentation" class="setting-inactive" title="'
					. esc_attr( sprintf( __('Show this page in %s', 'fumseck'), $l['translated_name']))
					. '"><a href="'
					. $l['url']
					. '"><i class="fa fa-chevron-right fa-smaller reveal fa-fw"></i> '
					. $l['native_name']
					. '</a></li>'
					. "\n";
		}
	}
	echo $output;
}

// Temporary workaround so the site name displays correctly ////////////////////

function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );


?>