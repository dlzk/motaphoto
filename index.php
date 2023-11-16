<?php get_header(); ?>
<main>
<?php
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