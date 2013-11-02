<?php

// Declare WordPress features the theme explicitly supports

add_theme_support( 'post-formats', array( 'image' ) );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

// Modify the WP query to include custom content types to search results
// and archive pages

add_filter( 'pre_get_posts', 'fumseck_add_cpt_search' );

function fumseck_add_cpt_search( $query ) {
	if ( $query->is_search || $query->is_archive && ! is_admin() )
		$query->set( 'post_type', array( 'post', 'batbelt_project', 'batbelt_event' ) );
	return $query;
}

// Return the linked title of a given post object

function fumseck_linked_title( $id ) {
	$post_title = get_the_title( $id );
	echo '<a href="' . esc_url( get_permalink( $id ) ) . '" title="' . esc_attr( $post_title, 'fumseck' ) . '">'. $post_title . '</a>' ;
}

// Display the default image for content without a featured image

function fumseck_default_image( $post_type ) {
	// TODO
}

?>