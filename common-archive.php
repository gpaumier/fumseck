	<?php	while ( have_posts() ) {
				the_post();
				$post_type = get_post_type();
				if ( $post_type == 'post' ) {
					get_template_part( 'snippet', get_post_format() );
				} else {
					get_template_part( 'snippet', $post_type );
				};
			}; // end of The Loop. ?>
