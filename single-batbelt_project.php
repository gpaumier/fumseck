<?php get_header(); ?>

				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('regular'); ?>>
	
	<header>
		<h1><?php the_title(); ?></h1>
		<ul class="meta1">
				<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) { ?>
			<li><span class="label category"><?php _e( 'Category: ', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
			<?php }; ?>
				
			<?php if ( $start_date = get_field( '_start_date', get_the_ID(), true ) ) { ?>
			<li><span class="label start_date"><?php _e( 'Started: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $start_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $start_date ) ); ?></time></li>
			<?php }; ?>
		
			<?php if ( $end_date = get_field( '_end_date', get_the_ID(), true ) ) { ?>
			<li><span class="label end_date"><?php _e( 'Completed: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $end_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $end_date ) ); ?></time></li>
			<?php }elseif ( $status = get_field( '_status', get_the_ID(), true ) ) { ?>
			<li><span class="label status"><?php _e( 'Status: ' , 'fumseck' ); ?></span><?php echo $status; ?></time></li>
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
	
	<aside class="meta2">
		<ul>
				
			<?php if ( $batbelt_roles_list = get_the_term_list( get_the_ID(), 'batbelt_roles', '', __( ', ', 'fumseck' ) ) ) { ?>
			<li><span class="label roles"><?php _e( 'Roles: ' , 'fumseck' ); ?></span><?php echo $batbelt_roles_list ; ?></li>
			<?php }; ?>
			
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li><span class="label topics"><?php _e( 'Topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) { ?>
			<li><span class="label project"><?php _e( 'Part of: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) { ?>
			<li><span class="label event"><?php _e( 'Event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php }; ?>
		</ul>
	</aside>
</article><!-- #post -->

					<?php endwhile; // end of The Loop. ?>

				</div><!-- #content -->

<?php get_footer(); ?>
