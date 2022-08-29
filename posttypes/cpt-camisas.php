<?php
//Função para criação de custom post type 'camisa'
function create_posttype_camisa()
{
    register_post_type('camisas',
        // CPT Options
        array(
            'labels' => array(
                'name'                => 'Camisas',
                'singular_name'       => 'Camisa',
                'menu_name'           => 'Seção da Loja' ,
                'all_items'           => 'Todas as camisas',
                'view_item'           => 'Ver camisa',
                'add_new_item'        => 'Nova camisa',
                'add_new'             => 'Adicionar camisa',
                'edit_item'           => 'Editar camisa',
                'update_item'         => 'Atualizar camisa',
                'search_items'        => 'Buscar camisa',
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
            'rewrite'       => array('slug' => 'camisas'),
            'menu_icon'     => 'dashicons-cart',
            'supports'      => array( 'title', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype_camisa');