<?php get_header(); ?>

				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('regular container'); ?>>
	
	<header>
		<h1><?php the_title(); ?></h1>
		<ul class="meta1 fa-ul">
				<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) { ?>
			<li class="categories"><i class="fa-li fa fa-folder-open"></i> <?php echo $categories_list ; ?></li>
			<?php }; ?>
				
			<?php if ( $start_date = get_field( '_start_date', get_the_ID(), true ) ) { ?>
			<li class="start_date"><i class="fa-li fa fa-calendar"></i> <span class="label"><?php _e( 'Started ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $start_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $start_date ) ); ?></time></li>
			<?php }; ?>
		
			<?php if ( $end_date = get_field( '_end_date', get_the_ID(), true ) ) { ?>
			<li class="end_date"><i class="fa-li fa fa-check-square-o"></i> <span class="label"><?php _e( 'Completed: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $end_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $end_date ) ); ?></time></li>
			<?php }elseif ( $status = get_field( '_status', get_the_ID(), true ) ) { ?>
			<li class="status"><i class="fa-li fa fa-"></i> <span class="label"><?php _e( 'Status: ' , 'fumseck' ); ?></span><?php echo $status; ?></time></li>
			<?php }; ?>
			
		</ul>
	</header>
	
	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image">
		<?php the_post_thumbnail(); ?>
	<figcaption><?php if ( $custom_caption = get_field( '_featured-image-caption', get_the_ID(), true ) ) {
					echo $custom_caption ;
				} ?> </figcaption>
	</figure>
	<?php } else { ?>
	<aside>
		<?php fumseck_default_image( 'batbelt_project' ); ?>
	</aside>
	<?php }; ?>
	
	<div class="the-content"><?php the_content(); ?></div>
	
	<aside>
		<ul class="meta2 fa-ul">
				
			<?php if ( $batbelt_roles_list = get_the_term_list( get_the_ID(), 'batbelt_roles', '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="roles"><i class="fa-li fa fa-user"></i> <span class="label"><?php _e( 'Roles: ' , 'fumseck' ); ?></span><?php echo $batbelt_roles_list ; ?></li>
			<?php }; ?>
			
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="topics"><i class="fa-li fa fa-tag"></i> <span class="label"><?php _e( 'Topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) { ?>
			<li class="projects"><i class="fa-li fa fa-tasks"></i> <span class="label"><?php _e( 'Part of: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) { ?>
			<li class="event"><i class="fa-li fa fa-calendar-o"></i> <span class="label"><?php _e( 'Event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php }; ?>
		</ul>
	</aside>
</article><!-- #post -->

					<?php endwhile; // end of The Loop. ?>

				</div><!-- #content -->

<?php get_footer(); ?>
