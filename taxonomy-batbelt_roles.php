<?php get_header(); ?>

<div id="content" role="main" class="archive batbelt-roles">

<?php if ( have_posts() ) { ?>
	<header class="archive-header container">
		<h1 class="archive-title"><i class="fa fa-user"></i> <?php printf( _e( 'Role: ' , 'fumseck' ) . '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
	</header><!-- .archive-header -->
	
	<?php get_template_part( 'common', 'archive' ); // the loop is in there ?>

<?php }; // else we don't have content to display and we should probably do something about it (TODO) ?>
			
</div><!-- #content -->

<?php get_footer(); ?>
