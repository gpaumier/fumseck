	<?php	$featured_image_exif = wp_get_attachment_metadata( get_post_thumbnail_id() ); 
			if ( $featured_image_exif['height'] >= $featured_image_exif['width'] ) {
				$ratio = 'portrait';
			} else {
				$ratio = 'landscape';
			};
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $ratio ); ?>>

<div class="container">
	
<div class="image-post-intro">
	<figure>
		<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
		<figcaption><?php the_title(); ?></figcaption>
	</figure>

	<header><h1><?php the_title(); ?></h1></header>

	<aside class="image-meta">
		<ul class="fa-ul">
		
			<?php if ( $featured_image_exif ) {
					if ( $exif_date_taken = $featured_image_exif['image_meta']['created_timestamp'] ) {?>
			<li class="date_taken"><i class="fa-li fa fa-calendar"></i> <span class="meta-label details"><?php _e( 'Taken on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( date( 'c', $exif_date_taken ) ); ?>"><?php echo date_i18n( __("F j, Y", 'fumseck'), $exif_date_taken ) ; ?></time></li>
					<?php };?>
			<?php };?>
			
			<?php if ( $batbelt_location = get_the_term_list( get_the_ID(), 'batbelt_locations', '', __( ', ', 'fumseck' ) ) ) {?>
			<li class="location"><i class="fa-li fa fa-globe"></i> <span class="meta-label details"><?php _ex( 'in ' , 'in location', 'fumseck' ); ?></span><?php printf( $batbelt_location ); ?>
				<?php 	if ( $featured_image_exif ) { fumseck_display_exif_geocoord( $featured_image_exif ); } ?>
			
			</li>
			<?php };?>
			
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) {?>
			<li class="event"><i class="fa-li fa fa-calendar-o"></i> <span class="meta-label"><?php _e( 'during ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php };?>
			
			<?php if ( $featured_image_exif ) {
				if ( $exif_aperture = $featured_image_exif['image_meta']['aperture'] ) {?>
			<li class="aperture"><i class="fa-li fa fa-dot-circle-o"></i> <span class="meta-label details"><?php _e( 'Aperture: ' , 'fumseck' ); ?></span><?php echo '<i>ƒ</i>/' . sanitize_text_field( $exif_aperture ) ; ?></li>
				<?php };?>
			
				<?php if ( $exif_focal_length = $featured_image_exif['image_meta']['focal_length'] ) {?>
			<li class="focal_length"><i class="fa-li fa fa-arrows-h"></i> <span class="meta-label details"><?php _e( 'Focal length: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_focal_length ) . ' mm' ; ?></li>
				<?php };?>
			
				<?php if ( $exif_exposure = $featured_image_exif['image_meta']['shutter_speed'] ) {?>
			<li class="exposure"><i class="fa-li fa fa-clock-o"></i> <span class="meta-label details"><?php _e( 'Exposure time: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_exposure ) . ' s' ; ?></li>
				<?php };?>
			<?php }; # end exif?>
		
		</ul>
	</aside>

	<div class="summary">
		<?php // Display the summary if there's one
			if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
				echo $summary;
			}; ?>
	</div>
	
</div>	
<div class="image-post-content">
	<div class="the-content"><?php the_content(); ?></div>
	
	<aside class="image-pub-meta">
			<?php get_template_part( 'metadata', 'image' ); ?>
	</aside>
	
</div>
</div>

	<div class="container">
		<nav class="nav-links">
			<div class="nav-link previous"><?php previous_post_link('%link', '<i class="fa fa-caret-left"></i> ' . __( 'Previous entry ' , 'fumseck' )) ?></div>
			<div class="nav-link next"><?php next_post_link('%link', __( 'Next entry ' , 'fumseck' ) . '<i class="fa fa-caret-right"></i>') ?></div>
		</nav>
	</div>
	
</article><!-- #post -->

