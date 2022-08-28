<?php
//Classe estendida da classe Walker_Nav_menu para integrar os menus do wordpress com o navbar do Bootstrap 5
require_once dirname(__FILE__)."/classes/BootstrapNavMenuWalker.php";

//Incluindo arquivo com 'requires' dos Custom Post Types
require_once dirname(__FILE__)."/posttypes/cpts.php";

//Incluindo arquivo com 'requires' das Taxonomias
require_once dirname(__FILE__)."/taxonomies/taxonomies.php";

//Incluindo arquivo com 'requires' das Metaboxes
require_once dirname(__FILE__)."/metaboxes/metaboxes.php";

//Certifica que os arquivos JavaScript e CSS surtam efeito somente no frontend do tema
if(!is_admin()){
    add_action( 'wp_enqueue_scripts', 'external_scripts' );
    // Incorporando scripts externos ao tema
    function external_scripts(){
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', [], false, true);
        //wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', [], false, true);
        wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', [], false, true);
    }

    // Incorporando folhas de estilo CSS ao tema

    add_action( 'wp_enqueue_scripts', 'external_styles' );
    function external_styles(){
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    }
}

//Recuperando logo customizado via painel do wordpress
//Caso não haja, retorna o logo padrão do tema
function recupera_custom_logo(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0] ?? get_template_directory_uri()."/images/escudo-palmeiras.png";
}

//Adicionando suporte a Menus e Imagens Destaque no template
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'register_sep_menus' );

function register_sep_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'secondary-menu' => __( 'Secondary Menu' )
        )
    );
}

//Formatação de data para exibição das partidas no header (Próximas Partidas)
function formatDateNextMatch($data){
    return date("d/m", strtotime($data));
}

//Formatação de hora para exibição das partidas no header (Próximas Partidas)
function formatTimeNextMatch($data){
    return date("H\Hi", strtotime($data));
}