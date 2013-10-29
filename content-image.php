<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
	<?php the_post_thumbnail(); ?>
							
	<h1><?php the_title(); ?></h1>
	
	<aside>
	<ul class="image-meta">
		
		<?php if ( $featured_image_exif = wp_get_attachment_metadata( get_post_thumbnail_id() ) ):
			if ( $exif_date_taken = $featured_image_exif['image_meta']['created_timestamp'] ) :?>
		<li><span class="image-meta-label opt"><?php _e( 'taken on: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( date( 'c', $exif_date_taken ) ); ?>"><?php echo date_i18n( __("F j, Y", 'fumseck'), $exif_date_taken ) ; ?></time></li>
			<?php endif;?>
		<?php endif;?>
				
		<?php if ( $batbelt_location = get_the_term_list( get_the_ID(), 'batbelt_locations', '', __( ', ', 'fumseck' ) ) ) :?>
		<li><span class="image-meta-label opt"><?php _ex( 'in: ' , 'in location', 'fumseck' ); ?></span><?php printf( $batbelt_location ); ?></li>
		<?php endif; ?>
			
		<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) :?>
		<li><span class="image-meta-label"><?php _e( 'during: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
		<?php endif; ?>
			
		<?php if ( $featured_image_exif ):
			if ( $exif_aperture = $featured_image_exif['image_meta']['aperture'] ) :?>
		<li><span class="image-meta-label opt"><?php _e( 'aperture: ' , 'fumseck' ); ?></span><?php echo '<i>ƒ</i>/' . sanitize_text_field( $exif_aperture ) ; ?></li>
			<?php endif; ?>
			
			<?php if ( $exif_focal_length = $featured_image_exif['image_meta']['focal_length'] ) :?>
		<li><span class="image-meta-label opt"><?php _e( 'focal length: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_focal_length ) . ' mm' ; ?></li>
			<?php endif; ?>
				
			<?php if ( $exif_exposure = $featured_image_exif['image_meta']['shutter_speed'] ) :?>
		<li><span class="image-meta-label opt"><?php _e( 'exposure time: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_exposure ) . ' s' ; ?></li>
			<?php endif; 
		endif; # end exif?>

		<li><span class="image-meta-label"><?php _e( 'published on: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>

		<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) :?>
		<li><span class="image-meta-label"><?php _ex( 'in: ' , 'in categories', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
		<?php endif; ?>

		<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) : ?>
		<li><span class="image-meta-label"><?php _e( 'topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
		<?php endif; ?>
			
		<?php if ( $batbelt_people_list = get_the_term_list( get_the_ID(), 'batbelt_people', '', __( ', ', 'fumseck' ) ) ) :?>
		<li><span class="image-meta-label"><?php _e( 'people: ' , 'fumseck' ); ?></span><?php echo $batbelt_people_list ; ?></li>
		<?php endif; ?>
			
		<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) :?>
		<li><span class="image-meta-label"><?php _e( 'project: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
		<?php endif; ?>
	</ul>
	<aside>
	
	<?php the_content(); ?>
</article><!-- #post -->
						
