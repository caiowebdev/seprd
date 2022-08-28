<?php
//Função para criação de custom post type 'partida'
function create_posttype_partida()
{
    register_post_type('partidas',
        // CPT Options
        array(
            'labels' => array(
                'name'                => 'Partidas',
                'singular_name'       => 'Partida',
                'menu_name'           => 'Partidas' ,
                'all_items'           => 'Todas as Partidas',
                'view_item'           => 'Ver Partida',
                'add_new_item'        => 'Nova Partida',
                'add_new'             => 'Adicionar Partida',
                'edit_item'           => 'Editar Partida',
                'update_item'         => 'Atualizar Partida',
                'search_items'        => 'Buscar Partida',
                'not_found'           => 'Não encontrada',
                'not_found_in_trash'  => 'Não encontrada na lixeira',
            ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'rewrite'       => array('slug' => 'partidas'),
            'menu_icon'     => 'dashicons-calendar-alt',
            'supports'      => array( 'title', 'thumbnail' ),
            'taxonomies'    => array( 'campeonatos' ),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype_partida');