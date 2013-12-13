		<ul class="fa-ul">
			<li class="pub_date"><i class="fa-li fa fa-calendar"></i> <span class="meta-label"><?php _ex( 'Published on ' , 'image published on', 'fumseck' ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ) ; ?>" pubdate><?php echo date_i18n( __('F j, Y', 'fumseck'), get_the_date('U') ) ; ?></time></li>
			
			<?php if ( $categories_list = get_the_category_list( __( ', ', 'fumseck' ) ) ) {?>
			<li class="categories"><i class="fa-li fa fa-folder-open"></i> <span class="meta-label"><?php _ex( 'in ' , 'image in categories', 'fumseck' ); ?></span><?php echo $categories_list ; ?></li>
			<?php }; ?>
		
			<?php if ( $tags_list = get_the_tag_list( '', __( ', ', 'fumseck' ) ) ) { ?>
			<li class="topics"><i class="fa-li fa fa-tag"></i> <span class="meta-label"><?php _e( 'Topics: ' , 'fumseck' ); ?></span><?php echo $tags_list ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_people_list = get_the_term_list( get_the_ID(), 'batbelt_people', '', __( ', ', 'fumseck' ) ) ) {?>
			<li class="people"><i class="fa-li fa fa-user"></i> <span class="meta-label"><?php _e( 'People: ' , 'fumseck' ); ?></span><?php echo $batbelt_people_list ; ?></li>
			<?php }; ?>
		
			<?php if ( $batbelt_project = get_field( '_project', get_the_ID(), true ) ) {?>
			<li class="projects"><i class="fa-li fa fa-tasks"></i> <span class="meta-label"><?php _e( 'Project: ' , 'fumseck' ); ?></span><?php fumseck_linked_title( $batbelt_project ); ?></li>
			<?php } ?>
			
			<li class="fullsize">
				<i class="fa-li fa fa-download"></i> 
				
			<?php	if ( $fullres = get_field( '_full_res', get_the_ID(), true ) ) { ?>
				
				<a title="<?php echo esc_attr( _e( 'Download full-size version' , 'fumseck' ) ); ?>"
					href="<?php echo esc_url($fullres);?>">
					<?php _e( 'Download full size version' , 'fumseck' ); ?></a>
			</li>
				
			<?php	} else { 
						$local_fullres = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
				
				<a title="<?php echo esc_attr( _e( 'Download full-size version' , 'fumseck' ) ); ?>"
					href="<?php echo esc_url($local_fullres[0]);?>">
					<?php _e( 'Download full-size version' , 'fumseck' ); ?></a> <?php echo '(' . $local_fullres[1] . '×' . $local_fullres[2] . ')'?>
			</li>
			
			<?php	} ?>
			
			<?php get_template_part( 'syndication' ); ?>
		</ul>
