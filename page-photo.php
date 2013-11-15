<?php get_header(); ?>

<div id="content" role="main" class="page page-photo container">

<?php	if ( have_posts() ) {
			the_post(); ?>

	<div class="intro-photo">
	<article id="page-<?php the_ID(); ?>" <?php post_class('page-photo-content'); ?>>
	
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

	<div class="list-photo">
	
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
			'posts_per_page' => 12,
			'ignore_sticky_posts'=> 1
		);
		$main_query_backup = $wp_query;
		$wp_query = new WP_Query($args); 
		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				get_template_part( 'snippet', 'image' );
			};
			$wp_query = $main_query_backup;
		}; ?>

	</div>
</div><!-- #content -->

<?php get_footer(); ?>