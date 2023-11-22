<div class="catalogue-photo">
<?php
	$number_of_photos = isset($args['number_of_photos']) ? $args['number_of_photos'] : 2;
	$args = array ( 'post_type' => 'photo', 'orderby' => 'date', 'posts_per_page' => $number_of_photos );
	$photo_list = new WP_Query($args);
	while ( $photo_list->have_posts() ) : $photo_list->the_post();
		if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
			the_post_thumbnail();
		}
	endwhile;

	//Reset Post Data
	wp_reset_postdata();
?>
</div>