	

			</div> <!-- #main -->
			
			<div class="footer-area">
				<aside class="footer container">
					<?php	if( defined('ICL_LANGUAGE_CODE') ) {
								dynamic_sidebar( 'footer-sidebar-' . ICL_LANGUAGE_CODE ); 
							} else {
								dynamic_sidebar( 'footer-sidebar-en' );
							}; ?>
				</aside>
			</div>
			
		</div> <!-- #page -->
		<?php wp_footer(); ?>	
	</body>
</html>
