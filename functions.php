<?php

# Modify the WP query to include custom content types to search results
# and archive pages

add_filter( 'pre_get_posts', 'fumseck_add_cpt_search' );

function fumseck_add_cpt_search( $query ) {
	if ( $query->is_search || $query->is_archive )
		$query->set( 'post_type', array( 'post', 'batbelt_project', 'batbelt_event' ) );
	return $query;
}

?>
