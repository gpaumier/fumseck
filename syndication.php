			<li class="syndication"><i class="fa-li fa fa-share"></i> 
				<?php printf( __('You can share this post on %s, %s or %s.', 'fumseck'),
					'<a class="twitter" href="https://twitter.com/intent/tweet?url=' . get_permalink() . '&text=' . get_the_title() . '&via=gpaumier">twitter</a>',
					'<a class="facebook" href="https://facebook.com/sharer.php?u=' . get_permalink() . '">facebook</a>',
					'<a class="googleplus" href="https://plus.google.com/share?url=' . get_permalink() . '">Google+</a>' );
				?>
			</li>

	