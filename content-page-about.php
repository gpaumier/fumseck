<div class="page has-sidebar container">

	<div class="row">
		
		<nav class="about-menu" role="navigation">
			<?php wp_nav_menu(array(
					'theme_location' => 'fumseck_about_menu',
					'container' => false,)); ?>
		</nav>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
	
			<?php if ( $post_thumbnail = has_post_thumbnail() ) { ?>
			<figure class="featured-image">
				<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
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

		</article><!-- #post -->
		
	</div>

</div>