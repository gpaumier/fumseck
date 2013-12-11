<?php get_header(); ?>

				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('regular container'); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
		<div class="project-meta1">
		<ul class="fa-ul">
				<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) { ?>
			<li class="categories"><i class="fa-li fa fa-folder-open"></i> <?php echo $categories_list ; ?></li>
			<?php }; ?>
				
			<?php if ( $start_date = get_field( '_start_date', get_the_ID(), true ) ) { ?>
			<li class="start_date"><i class="fa-li fa fa-calendar"></i> <span class="meta-label details"><?php _e( 'Started on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $start_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $start_date ) ); ?></time></li>
			<?php }; ?>
		
			<?php if ( $end_date = get_field( '_end_date', get_the_ID(), true ) ) { ?>
			<li class="end_date"><i class="fa-li fa fa-check-square-o"></i> <span class="meta-label details"><?php _e( 'Completed on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $end_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $end_date ) ); ?></time></li>
			<?php }elseif ( $status = get_field_object('_status') ) { ?>
			<li class="status"><i class="fa-li fa fa-"></i> <span class="meta-label details"><?php _e( 'Status: ' , 'fumseck' ); ?></span><?php echo ucfirst($status['choices'][ get_field('_status') ]); ?></time></li>
			<?php }; ?>
		</ul>
		</div>
	</header>
	
<div class="row">
	<?php if ( $post_thumbnail = has_post_thumbnail() ) { ?>
	<figure class="featured-image">
		<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
	<figcaption><?php if ( $custom_caption = get_field( '_featured-image-caption', get_the_ID(), true ) ) {
					echo $custom_caption ;
				} ?> </figcaption>
	</figure>
	<?php } else { ?>
	<aside>
		<?php fumseck_default_image( 'batbelt_project' ); ?>
	</aside>
	<?php }; ?>
		
	<aside class="project-meta2 fumseck-top">
		<?php	get_template_part( 'metadata', 'batbelt_project' );	?>
	</aside>
	
	<div class="summary">
		<?php // Display the summary if there's one
			if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
				echo $summary;
			}; ?>
	</div>
	
	<div class="the-content"><?php the_content(); ?></div>
	
	<?php if ( $copyright_info = get_field( '_copyright_info', get_the_ID(), true ) ) {?>
	<div class="copyright-info">
		<div class="copyright-info-inner">
			<i class="fa fa-paperclip"></i> <span class="copyright-info-label"><?php _e( 'Copyright information:' , 'fumseck' ); ?></span>
			<div class="copyright-info-content"> <?php echo $copyright_info ; ?></div>
		</div>
	</div>
	<?php }; ?>
	
	<aside class="project-meta2 fumseck-bottom">
		<?php get_template_part( 'metadata', 'batbelt_project' ); // TODO: reuse data from metadata above ?>
	</aside>

</div>	
</article><!-- #post -->

	<div class="container">
		<nav class="nav-links">
			<div class="nav-link previous"><?php previous_post_link('%link', '<i class="fa fa-caret-left"></i> ' . __( 'Previous project ' , 'fumseck' )) ?></div>
			<div class="nav-link next"><?php next_post_link('%link', __( 'Next project ' , 'fumseck' ) . '<i class="fa fa-caret-right"></i>') ?></div>
		</nav>
	</div>

					<?php endwhile; // end of The Loop. ?>

				</div><!-- #content -->

<?php get_footer(); ?>
