	<?php	while ( have_posts() ) {
				the_post();
				$post_type = get_post_type();
				if ( $post_type == 'post' ) {
					get_template_part( 'snippet', get_post_format() );
				} else {
					get_template_part( 'snippet', $post_type );
				};
			}; // end of The Loop. ?>

	<div class="container">
		<nav class="nav-links nav-full-width">
			<div class="nav-link previous"><?php previous_posts_link('<i class="fa fa-caret-left"></i> ' . __( ' Previous entries' , 'fumseck' )) ?></div>
			<div class="nav-link next"><?php next_posts_link(__( 'Next entries ' , 'fumseck' ) . '<i class="fa fa-caret-right"></i>') ?></div>
		</nav>
	</div>
