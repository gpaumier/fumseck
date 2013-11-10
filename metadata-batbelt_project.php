
		<ul class="meta2 fa-ul">
				
			<?php if ( $batbelt_roles_list = get_the_term_list( get_the_ID(), 'batbelt_roles', '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="roles"><i class="fa-li fa fa-user"></i> <span class="label"><?php _e( 'Roles: ' , 'fumseck' ); ?></span><?php echo $batbelt_roles_list ; ?></li>
			<?php }; ?>
			
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="topics"><i class="fa-li fa fa-tag"></i> <span class="label"><?php _e( 'Topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) { ?>
			<li class="projects"><i class="fa-li fa fa-tasks"></i> <span class="label"><?php _e( 'Part of: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_event = get_field( '_event', get_the_ID(), true ) ) { ?>
			<li class="event"><i class="fa-li fa fa-calendar-o"></i> <span class="label"><?php _e( 'Event: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_event ); ?></li>
			<?php }; ?>
		</ul>
