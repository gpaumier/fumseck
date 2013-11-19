<?php	if ( $start_date = get_field( '_start_date', get_the_ID(), true ) ) { 
			$start_date_fmtd = '<time datetime="' . esc_attr( $start_date ) . '">' . date_i18n( __('F j, Y', 'fumseck'), strtotime( $start_date ) ) . '</time>';
			$meta_info_fmtd = sprintf( __( ' started on %s' , 'fumseck' ), $start_date_fmtd );
			
			if ( $end_date = get_field( '_end_date', get_the_ID(), true ) ) { 
				$end_date_fmtd = '<time datetime="' . esc_attr( $end_date ) . '">' . date_i18n( __('F j, Y', 'fumseck'), strtotime( $end_date ) ) . '</time>';
				$meta_info_fmtd = $meta_info_fmtd . sprintf( __( ' and completed on %s' , 'fumseck' ), $end_date_fmtd );
			} elseif ( $status = get_field_object('_status') ) {
				$meta_info_fmtd = $meta_info_fmtd . sprintf( __( ' and %s' , 'fumseck' ), $status['choices'][ get_field('_status') ] );
			}
		}; ?>

<?php if ( $post_thumbnail = has_post_thumbnail() ) {  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet snippet-batbelt_project has-picture'); ?>>
	
	<a href="<?php echo esc_url( get_permalink()); ?>">
	
	<header class="before">
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-tasks"></i> <span class="meta-label"><?php _e( 'Project' , 'fumseck' ); echo $meta_info_fmtd ?></span>
		</p>
	</header>
	<figure class="featured-image">
		<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
	</figure>

	<header class="after">
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-tasks"></i> <span class="meta-label"><?php _e( 'Project' , 'fumseck' );  echo $meta_info_fmtd ?></span>
		</p>
	</header>
		
<?php } else { ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('container snippet snippet-batbelt_project no-picture'); ?>>
	
	<a class="snippet" href="<?php echo esc_url( get_permalink()); ?>">
	
	<header>
		<h1><?php the_title(); ?></h1>
		<p class="pub_date">
			<i class="fa fa-tasks"></i> <span class="meta-label"><?php _e( 'Project ' , 'fumseck' );  echo $meta_info_fmtd ?></span>
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



