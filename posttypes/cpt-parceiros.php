<?php
//Função para criação de custom post type 'parceiro'
function create_posttype_parceiro()
{
    register_post_type('parceiros',
        // CPT Options
        array(
            'labels' => array(
                'name'                => 'Parceiros',
                'singular_name'       => 'Parceiro',
                'menu_name'           => 'Seção de Parceiros' ,
                'all_items'           => 'Todos os parceiros',
                'view_item'           => 'Ver parceiro',
                'add_new_item'        => 'Novo parceiro',
                'add_new'             => 'Adicionar parceiro',
                'edit_item'           => 'Editar parceiro',
                'update_item'         => 'Atualizar parceiro',
                'search_items'        => 'Buscar parceiro',
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
            'rewrite'       => array('slug' => 'parceiros'),
            'menu_icon'     => 'dashicons-groups',
            'supports'      => array( 'title', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype_parceiro');