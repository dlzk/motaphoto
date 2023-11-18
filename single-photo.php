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

get_header();

$cats = get_terms(array(
    'taxonomy'   => 'categorie',
    'hide_empty' => false,
) );
$formats = get_terms(array(
    'taxonomy'   => 'format',
    'hide_empty' => false,
) );



/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>
	<section class="margin-space">
		<div class="flex single-info-image">
			<div class="single-info">
				<h2 class="single-title"><?php the_title(); ?></h2>
				<p>RÉFÉRENCE : <span class="single-ref"><?php echo get_field('reference'); ?></span></p>
				<p>CATÉGORIE : <?php foreach ($cats as $cat) {echo $cat->name;} ?></p>
				<p>FORMAT : <?php foreach ($formats as $format) {echo $format->name;} ?></p>
				<p>TYPE : <?php echo get_field('type'); ?></p>
				<p>ANNÉE : <?php echo get_the_time('Y'); ?></p>
			</div>
			<div class="single-image">
				<?php
					if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
						the_post_thumbnail();
					}
				?>
			</div>
		</div>
		<div class="flex single-contact">
			<p>Cette photo vous intéresse ?</p>
			<button class="single-btn single-modal">Contact</button>
		</div>
	</section>
	<section class="margin-space single-photo">
		<p>VOUS AIMEREZ AUSSI</p>
		<button class="single-btn">Toutes les photos</button>
	</section>
<?php endwhile; // End of the loop.

get_footer();