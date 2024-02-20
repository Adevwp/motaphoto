<?php 

// TO DO Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// TO DO Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function mototheme_enqueue_styles() {
    wp_enqueue_style('style-css', get_template_directory_uri() . 'assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'mototheme_enqueue_styles');
