<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), 1.1, true );
    wp_enqueue_script( 'lightbox-script', get_stylesheet_directory_uri() . '/js/lightbox-scripts.js', array( 'jquery' ), date("h:i:s"), true );
    if(is_singular('photo')) {
        wp_enqueue_script( 'single_photo_script', get_stylesheet_directory_uri() . '/js/single-photo-scripts.js', array( 'jquery' ), 1.1, true );
    }

     // Localize the script with new data
     $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'script', 'blog', $script_data_array );
 
    // Enqueued script with localized data.
    wp_enqueue_script( 'script' );
}

function register_my_menu() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Menu principal', 'text-domain' ),
            'footer-menu' => __( 'Menu footer', 'text-domain' )
        )
    );
}
add_action( 'after_setup_theme', 'register_my_menu' );


function montheme_menu_class($classes) { //ajoute la class 'nav-item' sur les <li>
    $classes[] = 'nav-item';
    return $classes;
}
function montheme_link_class($attrs) { //ajoute la class 'nav-link' sur les <a>
    $attrs['class'] = 'nav-link';
    return $attrs;
}
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_link_class');

function new_item_menu( $items, $args ) {
    if( $args->theme_location == 'main-menu' ) {
	    $items .= '<li class="menu-item"><p class="modal-btn">CONTACT</p></li>';
    }
    if( $args->theme_location == 'footer-menu' ) {
	    $items .= '<li class="menu-item"><p>TOUS DROITS RÉSERVÉS</p></li>';
    }
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_item_menu', 10, 2 );

include('menus.php');


add_action( 'wp_ajax_capitaine_load_photos', 'capitaine_load_photos' );
add_action( 'wp_ajax_nopriv_capitaine_load_photos', 'capitaine_load_photos' );
function capitaine_load_photos() {
    check_ajax_referer('load_more_posts', 'security');
    $category = $_POST['category'];
    $format = $_POST['format'];
    $order = $_POST['order'];
    $page = $_POST['page'];
    if ($category != '' && $format != '') {
        $args = array(
            'post_type' => 'photo',
            'order' => $order,
            'orderby' => 'date',
            'posts_per_page' => $page,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $category,
                ),
                array(
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => $format,
                ),
            ),
        );
    }
    elseif ($category != '' && $format == '') {
        $args = array(
            'post_type' => 'photo',
            'order' => $order,
            'orderby' => 'date',
            'posts_per_page' => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $category,
                ),
            ),
        );
    }
    elseif ($category == '' && $format != '') {
        $args = array(
            'post_type' => 'photo',
            'order' => $order,
            'orderby' => 'date',
            'posts_per_page' => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => $format,
                ),
            ),
        );
    }
    else {
        $args = array(
            'post_type' => 'photo',
            'order' => $order,
            'orderby' => 'date',
            'posts_per_page' => $page,
        );
    }
    $blog_posts = new WP_Query( $args );
    
 
    if ($blog_posts->have_posts() ):
        while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
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
    endif;

    wp_reset_postdata();
    wp_die();
}