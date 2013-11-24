<?php
/*
Template Name: About page set
*/
?>

<?php get_header(); ?>

<div id="content" role="main" class="page page-about-set">

<?php	if ( have_posts() ) {
			the_post();
			get_template_part( 'content', 'page-about' ); // the loop is in there

		}; // else we don't have content to display and we should probably do something about it (TODO) ?>
			
</div><!-- #content -->

<?php get_footer(); ?>
