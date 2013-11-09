<article id="post-<?php the_ID(); ?>" <?php post_class('regular container'); ?>>
<div class="row">
	<header class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-12 col-lg-pull-1">
		<h1><?php the_title(); ?></h1>
		<ul class="byline fa-ul">
			<li class="author"><i class="fa-li fa fa-user"></i> <span class="label"><?php _e( 'By ' , 'fumseck' ); ?></span><?php the_author(); ?></li>
			<li class="pub_date"><i class="fa-li fa fa-calendar"></i> <span class="label"><?php _e( 'Published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
		</ul>
	</header>
</div>
<div class="row">
	<?php if ( $post_thumbnail = has_post_thumbnail() ) { ?>
	<figure class="featured-image col-xs-12 col-sm-12 col-md-10 col-lg-8">
		<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
	<figcaption><?php if ( $custom_caption = get_field( '_featured_image_caption', get_the_ID(), true ) ) {
					echo $custom_caption ;
				} ?> </figcaption>
	</figure>
	<?php } else { ?>
	<aside class="default-image">
		<?php fumseck_default_image( get_post_format() ); ?>
	</aside>
	<?php }; ?>
	
	<aside class="col-lg-4 visible-lg">
		<?php	get_template_part( 'metadata' );
				if ( $post_thumbnail ) {
					get_template_part( 'syndication' );
				}
		?>
	</aside>
	
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 the-content"><?php the_content(); ?></div>

	
	<aside class="col-xs-12 col-sm-12 col-md-10 hidden-lg">
		<?php get_template_part( 'metadata' ); ?>
	</aside>
	
	<?php	if ( ! $post_thumbnail ) { ?>
	<aside class="col-xs-12 col-sm-12 col-md-10 col-lg-4">
			<?php get_template_part( 'syndication' );} ?>
	</aside>
						
	
	
</div>
</article><!-- #post -->

