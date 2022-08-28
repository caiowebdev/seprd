<?php
//Função para criação de custom post type 'time'
function create_posttype_time()
{
    register_post_type('times',
        // CPT Options
        array(
            'labels' => array(
                'name'                => 'Times',
                'singular_name'       => 'Time',
                'menu_name'           => 'Classificação' ,
                'all_items'           => 'Todos os times',
                'view_item'           => 'Ver time',
                'add_new_item'        => 'Novo time',
                'add_new'             => 'Adicionar time',
                'edit_item'           => 'Editar time',
                'update_item'         => 'Atualizar time',
                'search_items'        => 'Buscar time',
                'not_found'           => 'Não encontrado',
                'not_found_in_trash'  => 'Não encontrado na lixeira',
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
            'rewrite'       => array('slug' => 'times'),
            'menu_icon'     => 'dashicons-editor-ol',
            'supports'      => array( 'title', 'thumbnail' )
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype_time');