<?php get_header(); ?>

<div id="content" role="main" class="page page-archive container">

<?php	if ( have_posts() ) {
			the_post(); ?>

	<div class="intro-archive">
	<article id="page-<?php the_ID(); ?>" <?php post_class('page-archive-content'); ?>>
	
		<header>
			<h1><i class="fa fa-camera-retro"></i> <?php the_title(); ?></h1>
		</header>
	
		<div class="summary">
		<?php	if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
					echo $summary;
				}; ?>
		</div>
	
		<div class="the-content"><?php the_content(); ?></div>

	</article><!-- #post -->
	</div>
<?php	}; // else we don't have content to display and we have a problem ?>
	
<?php	// Display image posts
		$args = array (
			'post_type' => 'post',
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-image' )
				)
			),
			'post_status' => 'publish',
			'paged' => $paged,
			'posts_per_page' => 10,
			'ignore_sticky_posts'=> 1
		);
		$main_query_backup = $wp_query;
		$wp_query = new WP_Query($args); 
		if ( $wp_query->have_posts() ) { ?>
	
	<div class="list-archive">
		
<?php		while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				get_template_part( 'snippet', 'image' );
			}; ?>
	</div>
	
		<nav class="nav-links nav-full-width">
			<div class="nav-link previous"><?php previous_posts_link('<i class="fa fa-caret-left"></i> ' . __( ' Previous photos' , 'fumseck' )) ?></div>
			<div class="nav-link next"><?php next_posts_link(__( 'Next photos ' , 'fumseck' ) . '<i class="fa fa-caret-right"></i>') ?></div>
		</nav>
	
<?php		$wp_query = $main_query_backup;
		}; ?>

</div><!-- #content -->

<?php get_footer(); ?>