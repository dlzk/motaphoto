<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/scripts.js', array( 'jquery' ), 1.1, true );
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

include('menus.php');