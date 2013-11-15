
<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet has-picture'); ?>>
	
	<a href="<?php echo esc_url( get_permalink()); ?>">

	<figure class="featured-image">
		<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
	</figure>
		
<?php	$featured_image_exif = wp_get_attachment_metadata( get_post_thumbnail_id() ); 
		$exif_date_taken = $featured_image_exif['image_meta']['created_timestamp']
?>
		
	<header>
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-camera-retro"></i> <span class="meta-label"><?php _e( 'Photo taken on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( date( 'c', $exif_date_taken ) ); ?>"><?php echo date_i18n( __("F j, Y", 'fumseck'), $exif_date_taken ) ; ?></time>
		</p>
	</header>
		
	<div class="summary">
		<?php // Display the excerpt unless there's a summary
			if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
				echo $summary;
			} else {
				the_excerpt();
			}; ?>
	</div>
	
	</a>

</article><!-- #post -->


