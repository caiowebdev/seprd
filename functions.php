<?php

// Incorporando scripts externos ao tema
add_action( 'wp_enqueue_scripts', 'external_scripts' );
function external_scripts(){
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', [], false, true);
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', [], false, true);
    wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/js/fontawesome.min.js', [], false, true);
}

// Incorporando folhas de estilo CSS ao tema
add_action( 'wp_enqueue_scripts', 'external_styles' );
function external_styles(){
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css');
}

//Recuperando logo customizado via painel do wordpress
//Caso não haja, retorna o logo padrão do tema
function recupera_custom_logo(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0] ?? get_template_directory_uri()."/images/escudo-palmeiras.png";
}
