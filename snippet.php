<?php if ( $post_thumbnail = has_post_thumbnail() ) {  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet has-picture'); ?>>
	
	<a href="<?php echo esc_url( get_permalink()); ?>">
	
	<header class="before">
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-pencil-square-o"></i> <span class="meta-label"><?php _e( 'Article published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time>
		</p>
	</header>
	<figure class="featured-image">
		<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
	</figure>

	<header class="after">
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-pencil-square-o"></i> <span class="meta-label"><?php _e( 'Article published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time>
		</p>
	</header>
		
<?php } else { ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet no-picture'); ?>>
	
	<a class="snippet" href="<?php echo esc_url( get_permalink()); ?>">
	
	<header>
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-pencil-square-o"></i> <span class="meta-label"><?php _e( 'Article published on ' , 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time>
		</p>
	</header>
		
<?php }; ?>
		
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
