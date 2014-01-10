<?php
/*
Template Name: Embed full-width page
*/
?><?php get_header(); ?>

<div id="content" role="main" class="page">

<?php 
		$output = get_field( '_raw_html', $post->ID, true );
		if ( $output ){
			echo $output;
		}
 ?>

</div><!-- #content -->

<?php get_footer(); ?>