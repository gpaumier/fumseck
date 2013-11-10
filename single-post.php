<?php get_header(); ?>

				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

					<aside class="comments container">
							<?php comments_template( '', true ); ?>
					</aside>
					
					<?php endwhile; // end of The Loop. ?>

				</div><!-- #content -->

<?php get_footer(); ?>
