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
		<article class="flex single-info-image">
			<div class="single-info">
				<h2 class="single-title"><?php the_title(); ?></h2>
				<p>RÉFÉRENCE : <span class="single-ref"><?php echo get_field('reference'); ?></span></p>
				<p>CATÉGORIE : <span class="single-cat"><?php echo strip_tags(get_the_term_list( get_the_ID() , 'categorie')); ?></span></p>
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
				<div class="single-image__overlay">
					<i class="fa-solid fa-expand"></i>
				</div>
			</div>
		</article>
		<div class="flex single-contact">
			<div class="photo-interesse flex">
				<p>Cette photo vous intéresse ?</p>
				<button class="single-btn single-modal">Contact</button>
			</div>
			<div class="nav-post">
				<div class="prev-post">
					<?php
						$last_post = get_posts(array( 'post_type' => 'photo', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => -1));
						$prev_post = get_previous_post();
						if($prev_post) {
							if (!empty($prev_post)) :
								echo get_the_post_thumbnail($prev_post);
							endif;
						}
						else {
							if (!empty($last_post)) :
								echo get_the_post_thumbnail($last_post[0]);
							endif;
						}
					?>
				</div>
				<div class="next-post">
					<?php
						$first_post = get_posts(array( 'post_type' => 'photo', 'order' => 'ASC', 'orderby' => 'date', 'posts_per_page' => -1));
						$next_post = get_next_post();
						if($next_post) {
							if (!empty($next_post)) :
								echo get_the_post_thumbnail($next_post);
							endif;
						}
						else {
							if (!empty($first_post)) :
								echo get_the_post_thumbnail($first_post[0]);
							endif;
						}
					?>
				</div>
				<div class="flex nav-post__arrow">
					<?php if($prev_post) { ?>
						<a href="<?php echo get_permalink( $prev_post ); ?>"><i class="fa-solid fa-arrow-left"></i></a>
					<?php } else { ?>
						<a href="<?php echo get_permalink( $last_post[0] ); ?>"><i class="fa-solid fa-arrow-left"></i></a>
					<?php } ?>
					<?php if($next_post) { ?>
						<a href="<?php echo get_permalink( $next_post ); ?>"><i class="fa-solid fa-arrow-right"></i></a>
					<?php } else { ?>
						<a href="<?php echo get_permalink( $first_post[0] ); ?>"><i class="fa-solid fa-arrow-right"></i></a>
					<?php } ?>
				</div>
			</div>
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
		<div class="all-photo">
			<a href="<?php echo get_home_url(); ?>" class="single-btn">Toutes les photos</a>
		</div>
	</section>
<?php endwhile; // End of the loop.

get_footer();