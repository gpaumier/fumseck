<article id="post-<?php the_ID(); ?>" <?php post_class('regular'); ?>>

	<header>
		<h1><?php the_title(); ?></h1>
		<ul class="byline fa-ul">
			<li class="author"><i class="fa-li fa fa-user"></i> <span class="label"><?php _e( 'By ' , 'fumseck' ); ?></span><?php the_author(); ?></li>
			<li class="pub_date"><i class="fa-li fa fa-calendar"></i> <span class="label"><?php _e( 'Published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
		</ul>
	</header>
	
	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image">
		<?php the_post_thumbnail(); ?>
	<figcaption><?php if ( $custom_caption = get_field( '_featured_image_caption', get_the_ID(), true ) ) {
					echo $custom_caption ;
				} ?> </figcaption>
	</figure>
	<?php } else { ?>
	<aside class="default-image">
		<?php fumseck_default_image( get_post_format() ); ?>
	</aside>
	<?php }; ?>
	

	
	<div class="the-content"><?php the_content(); ?></div>
	
	<aside>
		<ul class="meta2 fa-ul">
			<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) {?>
			<li class="categories"><i class="fa-li fa fa-folder-open"></i> <span class="label"><?php _ex( 'In ' , 'in categories', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
			<?php }; ?>
		
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="topics"><i class="fa-li fa fa-tag"></i> <span class="label"><?php _e( 'Topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) {?>
			<li class="projects"><i class="fa-li fa fa-tasks"></i> <span class="label"><?php _e( 'Project: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) {?>
			<li class="event"><i class="fa-li fa fa-calendar-o"></i> <span class="label"><?php _e( 'Event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php }; ?>
		</ul>
	</aside>
</article><!-- #post -->

