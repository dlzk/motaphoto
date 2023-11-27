<div class="catalogue-photo">
<?php
	$number_of_photos = isset($args['number_of_photos']) ? $args['number_of_photos'] : 2;
	$nom_categorie = isset($args['nom_categorie']) ? $args['nom_categorie'] : '';
	$args = array ( 'post__not_in' => [get_the_ID()], 'post_type' => 'photo', 'order' => 'ASC', 'orderby' => 'date', 'posts_per_page' => $number_of_photos, 'tax_query' => $nom_categorie, 'paged' => 1,);
	$photo_list = new WP_Query($args);
	while ( $photo_list->have_posts() ) : $photo_list->the_post(); ?>
		<div class="catalogue-photo__image">
			<?php if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
				the_post_thumbnail();
			} ?>
			<div class="overlay">
				<i class="fa-solid fa-expand"></i>
				<a href="<?php echo get_post_permalink(); ?>"><i class="fa-solid fa-eye"></i></a>
				<p class="overlay__ref"><?php echo get_field('reference'); ?></p>
				<p class="overlay__cat"><?php echo strip_tags(get_the_term_list( get_the_ID() , 'categorie')); ?></p>
			</div>
		</div>
	<?php endwhile;

	//Reset Post Data
	wp_reset_postdata();
?>
</div>