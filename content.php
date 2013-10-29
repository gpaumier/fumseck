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
		<?php fumseck_default_image( get_post_format() ); ?>
	</aside>
	<?php }; ?>
	
	<aside>
		<ul class="meta byline">
			<li><span class="label"><?php _e( 'published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
			<li><span class="label"><?php _e( 'by ' , 'fumseck' ); ?></span><?php the_author(); ?></li>
		</ul>
	</aside>
	
	<?php the_content(); ?>
	
	<aside>
	<ul class="meta">
		
		<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) :?>
		<li><span class="label"><?php _ex( 'in ' , 'in categories', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
		<?php endif; ?>
		
		<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) : ?>
		<li><span class="label"><?php _e( 'topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
		<?php endif; ?>
		
		<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) :?>
		<li><span class="label"><?php _e( 'project: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
		<?php endif; ?>
		
		<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) :?>
		<li><span class="label"><?php _e( 'event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
		<?php endif; ?>

	</ul>
	</aside>
</article><!-- #post -->

