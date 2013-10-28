<?php

# Modify the WP query to include custom content types to search results
# and archive pages

add_filter( 'pre_get_posts', 'fumseck_add_cpt_search' );

function fumseck_add_cpt_search( $query ) {
	if ( $query->is_search || $query->is_archive )
		$query->set( 'post_type', array( 'post', 'batbelt_project', 'batbelt_event' ) );
	return $query;
}

# Return the linked title of a given post object

function fumseck_linked_title( $id ) {
	$post_title = get_the_title( $id );
	echo '<a href="' . esc_url( get_permalink( $id ) ) . '" title="' . esc_attr( $post_title, 'fumseck' ) . '">'. $post_title . '</a>' ;
}

?>
