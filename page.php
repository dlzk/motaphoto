<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<section class="hero">
	<h1>PHOTOGRAPHE EVENT</h1>
	<?php
	//Create WordPress Query with 'orderby' set to 'rand' (Random)
	$the_query = new WP_Query( array ( 'post_type' => 'photo', 'orderby' => 'rand', 'posts_per_page' => '1' ) );
	//output the random post
	while ( $the_query->have_posts() ) : $the_query->the_post();
		if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
			the_post_thumbnail();
		}
	endwhile;

	//Reset Post Data
	wp_reset_postdata();
	?>
</section>

<?php
$cats = get_terms( array(
    'taxonomy'   => 'categorie',
    'hide_empty' => false,
) );
$formats = get_terms( array(
    'taxonomy'   => 'format',
    'hide_empty' => false,
) );
?>
<section class="filter flex">
	<div class="flex">
		<select class="decorated cat-list_item" name="cats" id="cats" 
			data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" 
			data-action="capitaine_load_photos">
			<option value="" selected="selected">CATÉGORIES</option>
			<?php foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->slug; ?>"
				><?php echo $cat->name; ?></option>
			<?php } ?>
		</select>
		<select class="format-list_item" name="formats" id="formats"
			data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
			data-action="capitaine_load_photos">
			<option value="" selected="selected">FORMATS</option>
			<?php foreach($formats as $format) { ?>
				<option value="<?php echo $format->slug; ?>"><?php echo $format->name; ?></option>
			<?php } ?>
		</select>
	</div>
	<div>
		<select class="date_item" name="dates" id="dates"
			data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" 
			data-action="capitaine_load_photos">
			<option value="" selected="selected" disabled>TRIER PAR</option>
			<option value="desc">DES PLUS RÉCENTS AUX PLUS ANCIENTS</option>
			<option value="asc">DES PLUS ANCIENTS AUX PLUS RÉCENTS</option>
		</select>
	</div>
</section>
<section>
	<?php
		$number_of_photos = 8;
		$args = array('number_of_photos' => $number_of_photos);
		ob_start();
		get_template_part('templates_part/photo_block', null, $args);
		$photo_block_content = ob_get_clean();
		echo $photo_block_content;
    ?>
	<div class="photo-load">
		<button class="single-btn js-load-photos"
    	data-action="capitaine_load_photos"
    	data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
		>Charger plus</button>
	</div>
</section>

<?php get_footer(); ?>