	<?php	$featured_image_exif = wp_get_attachment_metadata( get_post_thumbnail_id() ); 
			if ( $featured_image_exif['height'] >= $featured_image_exif['width'] ) {
				$ratio = 'portrait';
			} else {
				$ratio = 'landscape';
			};
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $ratio) ; ?>>

	<figure>
		<?php the_post_thumbnail(); ?>
		<figcaption><?php the_title(); ?></figcaption>
	</figure>
	
	<header><h1><?php the_title(); ?></h1></header>
	
	<aside class="image-meta">
		<ul>
		
			<?php if ( $featured_image_exif ) {
					if ( $exif_date_taken = $featured_image_exif['image_meta']['created_timestamp'] ) {?>
			<li><span class="label date_taken opt"><?php _e( 'taken on: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( date( 'c', $exif_date_taken ) ); ?>"><?php echo date_i18n( __("F j, Y", 'fumseck'), $exif_date_taken ) ; ?></time></li>
					<?php };?>
			<?php };?>
			
			<?php if ( $batbelt_location = get_the_term_list( get_the_ID(), 'batbelt_locations', '', __( ', ', 'fumseck' ) ) ) {?>
			<li><span class="label location opt"><?php _ex( 'in: ' , 'in location', 'fumseck' ); ?></span><?php printf( $batbelt_location ); ?></li>
			<?php };?>
			
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) {?>
			<li><span class="label event"><?php _e( 'during: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php };?>
			
			<?php if ( $featured_image_exif ) {
				if ( $exif_aperture = $featured_image_exif['image_meta']['aperture'] ) {?>
			<li><span class="label aperture opt"><?php _e( 'aperture: ' , 'fumseck' ); ?></span><?php echo '<i>ƒ</i>/' . sanitize_text_field( $exif_aperture ) ; ?></li>
				<?php };?>
			
				<?php if ( $exif_focal_length = $featured_image_exif['image_meta']['focal_length'] ) {?>
			<li><span class="label focal_length opt"><?php _e( 'focal length: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_focal_length ) . ' mm' ; ?></li>
				<?php };?>
			
				<?php if ( $exif_exposure = $featured_image_exif['image_meta']['shutter_speed'] ) {?>
			<li><span class="label exposure opt"><?php _e( 'exposure time: ' , 'fumseck' ); ?></span><?php echo sanitize_text_field( $exif_exposure ) . ' s' ; ?></li>
				<?php };?>
			<?php }; # end exif?>
		
		</ul>
	</aside>
	
	<div class="image-summary">
		<?php // Display the excerpt unless there's an image summary
			if ( $image_summary = get_field( '_image_summary', get_the_ID(), true ) ) {
				echo $image_summary;
			} else {
				the_excerpt();
			}; ?></div>
	
	<aside class="image-pub-meta">
		<ul>
			<li><span class="label pub_date"><?php _e( 'published on: ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
			
			<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) {?>
			<li><span class="label categories"><?php _ex( 'in: ' , 'in categories', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
			<?php }; ?>
		
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li><span class="label topics"><?php _e( 'topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_people_list = get_the_term_list( get_the_ID(), 'batbelt_people', '', __( ', ', 'fumseck' ) ) ) {?>
			<li><span class="label people"><?php _e( 'people: ' , 'fumseck' ); ?></span><?php echo $batbelt_people_list ; ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) {?>
			<li><span class="label project"><?php _e( 'project: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php } ?>
		</ul>
	</aside>
	
	<?php // TODO add syndication here ?>
	
	<?php // Only display the full content if there's more than the excerpt
	if ( $full_content = get_the_content() ) {
		$full_content = apply_filters('the_content', $full_content);
		$full_content = str_replace(']]>', ']]&gt;', $full_content);?>
	<div class="the-content"><?php echo $full_content; ?></div>
	<?php }; ?>
	
</article><!-- #post -->

