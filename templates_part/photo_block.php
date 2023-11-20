<?php
	$photo_list = new WP_Query( array ( 'post_type' => 'photo', 'orderby' => 'date', 'posts_per_page' => '2' ) );
	while ( $photo_list->have_posts() ) : $photo_list->the_post();
		if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
			the_post_thumbnail();
		}
	endwhile;

	//Reset Post Data
	wp_reset_postdata();
?>