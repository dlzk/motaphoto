<?php get_header(); ?>
<main>

<?php
//Create WordPress Query with 'orderby' set to 'rand' (Random)
$the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
//output the random post
while ( $the_query->have_posts() ) : $the_query->the_post();
    echo '<li>';
    the_title();
    echo '</li>';
endwhile;

//Reset Post Data
wp_reset_postdata();


$terms = get_terms( array(
    'taxonomy'   => 'categorie',
    'hide_empty' => false,
) );
?>

<select name="tags" id="tags">
    <?php foreach($terms as $term) { ?>
        <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
    <?php } ?>
</select>
</main>

<?php get_footer(); ?>