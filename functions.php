<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), 1.1, true );
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

include('menus.php');