<?php

if ( comments_open( get_the_ID() ) ) {
	comment_form();
}

if ( have_comments() ) {?>
<h2 id="comments"><?php comments_number(); ?></h2>

<ol class="commentlist">

<?php	wp_list_comments(
			array (
				'type'  => 'comment',
				'style' => 'ol'
			)
		);?>
</ol>

<?php }; ?>
