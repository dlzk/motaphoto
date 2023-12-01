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
	<div class="flex filter__select">
		<div class="drop-down cat-drop-down">
			<p class="cat-first_item first_item">CATÉGORIES<i class="fa-solid fa-chevron-down"></i></p>
			<ul class="cat-list_item drop-down_item" name="cats" id="cats">
				<li value="" class="blank" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"></li>
				<?php foreach($cats as $cat) { ?>
					<li value="<?php echo $cat->slug; ?>"
					data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
					data-action="capitaine_load_photos"
					><?php echo $cat->name; ?></li>
				<?php } ?>
			</ul>
		</div>
		<div class="drop-down">
			<p class="format-first_item first_item">FORMATS<i class="fa-solid fa-chevron-down"></i></p>
			<ul class="format-list_item drop-down_item" name="formats" id="formats">
				<li value="" class="blank" data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"></li>
				<?php foreach($formats as $format) { ?>
					<li value="<?php echo $format->slug; ?>"
					data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
					data-action="capitaine_load_photos"
					><?php echo $format->name; ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="filter__select">
		<div class="drop-down">
			<p class="date-first_item first_item">TRIER PAR<i class="fa-solid fa-chevron-down"></i></p>
			<ul class="date-list_item drop-down_item" name="dates" id="dates">
				<li value="desc"
				data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
				data-action="capitaine_load_photos"
				>DES PLUS RÉCENTS AUX PLUS ANCIENTS</li>
				<li value="asc"
				data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
				data-action="capitaine_load_photos"
				>DES PLUS ANCIENTS AUX PLUS RÉCENTS</li>
			</ul>
		</div>
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