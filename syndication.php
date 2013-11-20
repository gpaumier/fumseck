			<li class="syndication"><i class="fa-li fa fa-share"></i> 
				<?php 
					$permalink = get_permalink();
					printf( __('You can share this post on %s, %s, %s or elsewhere with the <a href="%s">permalink</a>.', 'fumseck'),
					'<a class="twitter" href="https://twitter.com/intent/tweet?url=' . $permalink . '&text=' . get_the_title() . '&via=gpaumier">twitter</a>',
					'<a class="facebook" href="https://facebook.com/sharer.php?u=' . $permalink . '">facebook</a>',
					'<a class="googleplus" href="https://plus.google.com/share?url=' . $permalink . '">Google+</a>',
					$permalink );
				?>
			</li>
