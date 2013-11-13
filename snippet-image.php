
<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet has-picture'); ?>>
	
	<a href="<?php echo esc_url( get_permalink()); ?>">

	<figure class="featured-image">
		<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
	</figure>

	<header class="after">
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-calendar"></i> <span class="meta-label details"><?php _e( 'Published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time>
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
</div>
</article><!-- #post -->
