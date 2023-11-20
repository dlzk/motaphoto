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

<div class="hero">
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
</div>

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
<section>
	<div>
		<label for="cat-select">CATÉGORIE</label>
		<select name="cats" id="cats">
			<?php foreach($cats as $cat) { ?>
				<option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
			<?php } ?>
		</select>
	</div>
	<div>
		<label for="-select">FORMAT</label>
		<select name="formats" id="formats">
			<?php foreach($formats as $format) { ?>
				<option value="<?php echo $format->term_id; ?>"><?php echo $format->name; ?></option>
			<?php } ?>
		</select>
	</div>
</section>
<section class="catalogue-photo">
	<?php get_template_part( 'templates_part/photo_block' ); ?>
</section>

<?php get_footer(); ?>