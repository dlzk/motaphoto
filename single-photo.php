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

/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>
	<section class="margin-space single-contenu">
		<div class="flex single-info-image">
			<div class="single-info">
				<h2 class="single-title"><?php the_title(); ?></h2>
				<p>RÉFÉRENCE : <span class="single-ref"><?php echo get_field('reference'); ?></span></p>
				<p>CATÉGORIE : <?php echo strip_tags(get_the_term_list( get_the_ID() , 'categorie')); ?></p>
				<p>FORMAT : <?php echo strip_tags(get_the_term_list( get_the_ID() , 'format')); ?></p>
				<p>TYPE : <?php echo get_field('type'); ?></p>
				<p>ANNÉE : <?php echo get_the_time('Y'); ?></p>
			</div>
			<div class="single-image">
				<?php
					if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
						the_post_thumbnail();
					}
				?>
				<div class="overlay">
					<i class="fa-solid fa-expand"></i>
				</div>
			</div>
		</div>
		<div class="flex single-contact">
			<p>Cette photo vous intéresse ?</p>
			<button class="single-btn single-modal">Contact</button>
		</div>
	</section>
	<section class="margin-space single-photo">
		<p>VOUS AIMEREZ AUSSI</p>
		<?php
			$nom_categorie =  array(
				array(
					'taxonomy' => 'categorie',
					'field' => 'slug',
					'terms' => strip_tags(get_the_term_list( get_the_ID() , 'categorie')),
				),
			);
			$args = array('nom_categorie' => $nom_categorie);
			ob_start();
			get_template_part('templates_part/photo_block', null, $args);
			$photo_block_content = ob_get_clean();
			echo $photo_block_content;
		?>
		<div class="photo-load">
			<button class="single-btn">Toutes les photos</button>
		</div>
	</section>
<?php endwhile; // End of the loop.

get_footer();