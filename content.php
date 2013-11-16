<article id="post-<?php the_ID(); ?>" <?php post_class('regular container'); ?>>
	
	<header>
		<h1><?php the_title(); ?></h1>
		<div class="byline">
		<ul class="fa-ul">
			<li class="author"><i class="fa-li fa fa-user"></i> <span class="meta-label details"><?php _e( 'By ' , 'fumseck' ); ?></span><?php the_author(); ?></li>
			<li class="pub_date"><i class="fa-li fa fa-calendar"></i> <span class="meta-label details"><?php _e( 'Published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
		</ul>
		</div>
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
	
	<aside class="post-meta fumseck-top">
		<?php	get_template_part( 'metadata' ); ?>
	</aside>
	
	<div class="summary">
		<?php // Display the summary if there's one
			if ( $summary = get_field( '_summary', get_the_ID(), true ) ) {
				echo $summary;
			}; ?>
	</div>
	
	<div class="the-content"><?php the_content(); ?></div>

	<aside class="post-meta fumseck-bottom">
		<?php get_template_part( 'metadata' ); // TODO: reuse data from metadata above ?>
	</aside>
</div>
		
</article><!-- #post -->

	<div class="container">
		<nav class="nav-links">
			<div class="nav-link previous"><?php previous_post_link('%link', '<i class="fa fa-caret-left"></i> ' . __( 'Previous entry ' , 'fumseck' )) ?></div>
			<div class="nav-link next"><?php next_post_link('%link', __( 'Next entry ' , 'fumseck' ) . '<i class="fa fa-caret-right"></i>') ?></div>
		</nav>
	</div>
