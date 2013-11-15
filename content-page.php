<article id="post-<?php the_ID(); ?>" <?php post_class('regular page no-sidebar container'); ?>>
	
	<header>
		<h1><?php // Display the title icon if there's one
			if ( $icon = get_field( '_icon', get_the_ID(), true ) ) { echo $icon; }; ?> 
		<?php the_title(); ?></h1>
	</header>
	
<div class="row">
	<?php if ( $post_thumbnail = has_post_thumbnail() ) { ?>
	<figure class="featured-image">
		<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
	<figcaption><?php if ( $custom_caption = get_field( '_featured_image_caption', get_the_ID(), true ) ) {
					echo $custom_caption ;
				} ?> </figcaption>
	</figure>
	<?php } else { ?>
	<figure class="default-image">
		<?php fumseck_default_image( get_post_format() ); ?>
	</figure>
	<?php }; ?>
	
	<div class="summary">
		<?php // Display the summary if there's one
			if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
				echo $summary;
			}; ?>
	</div>
	
	<div class="the-content"><?php the_content(); ?></div>

</div>
</article><!-- #post -->
