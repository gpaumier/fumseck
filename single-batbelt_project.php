<?php get_header(); ?>

				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header><h1><?php the_title(); ?></h1></header>
	
	<?php if ( has_post_thumbnail() ) { ?>
	<figure>
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
	
	<aside>
		<ul class="meta">
				<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) :?>
			<li><span class="label"><?php _e( 'category: ', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
			<?php endif; ?>
				
			<?php if ( $start_date = get_field( '_start_date', get_the_ID(), true ) ) :?>
			<li><span class="label"><?php _e( 'started: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $start_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $start_date ) ); ?></time></li>
			<?php endif; ?>
		
			<?php if ( $end_date = get_field( '_end_date', get_the_ID(), true ) ) :?>
			<li><span class="label"><?php _e( 'completed: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( $end_date ) ; ?>"><?php echo date_i18n( __('F j, Y', 'fumseck'), strtotime( $end_date ) ); ?></time></li>
			<?php endif; ?>
						
			<?php if ( $batbelt_roles_list = get_the_term_list( get_the_ID(), 'batbelt_roles', '', __( ', ', 'fumseck' ) ) ) :?>
			<li><span class="label"><?php _e( 'roles: ' , 'fumseck' ); ?></span><?php echo $batbelt_roles_list ; ?></li>
			<?php endif; ?>
				
		</ul>
	</aside>
	
	<?php the_content(); ?>
	
	<aside>
		<ul class="meta">
		
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) : ?>
			<li><span class="label"><?php _e( 'topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php endif; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) :?>
			<li><span class="label"><?php _e( 'part of: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php endif; ?>
		
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) :?>
			<li><span class="label"><?php _e( 'event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php endif; ?>

		</ul>
	</aside>
</article><!-- #post -->

					<?php endwhile; // end of The Loop. ?>

				</div><!-- #content -->

<?php get_footer(); ?>
