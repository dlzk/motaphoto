<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), 1.1, true );
    if(is_singular('photo')) {
        wp_enqueue_script( 'single_photo_script', get_stylesheet_directory_uri() . '/js/single-photo-scripts.js', array( 'jquery' ), 1.1, true );
    }
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
  
	// Vérification de sécurité
  	if( 
		! isset( $_REQUEST['nonce'] ) or 
       	! wp_verify_nonce( $_REQUEST['nonce'], 'capitaine_load_photos' ) 
    ) {
    	wp_send_json_error( "Vous n’avez pas l’autorisation d’effectuer cette action.", 403 );
  	}
    
    // On vérifie que l'identifiant a bien été envoyé
    if( ! isset( $_POST['postid'] ) ) {
    	wp_send_json_error( "L'identifiant de l'article est manquant.", 400 );
  	}

  	// Récupération des données du formulaire
  	$post_id = intval( $_POST['postid'] );
    
	// Vérifier que l'article est publié, et public
	if( get_post_status( $post_id ) !== 'publish' ) {
    	wp_send_json_error( "Vous n'avez pas accès aux photos de cet article.", 403 );
	}

  	// Utilisez sanitize_text_field() pour les chaines de caractères.
  	// exemple : 
    $name = sanitize_text_field( $_POST['name'] );

  	// Requête des photos
  	$args = array ( 'post_type' => 'photo', 'order' => 'ASC', 'orderby' => 'date', 'posts_per_page' => '-1' );
    $photo_list = new WP_Query($args);
    while ( $photo_list->have_posts() ) : $photo_list->the_post();
		if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
			the_post_thumbnail();
            wp_send_json_success( the_post_thumbnail() );
		}
	endwhile;
    wp_reset_postdata();
    wp_die();

  	// Envoyer les données au navigateur
	
}