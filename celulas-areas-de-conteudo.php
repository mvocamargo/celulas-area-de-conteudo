<?php
/*
Plugin Name: Células - Áreas de Conteúdo
Plugin URI: https://github.com/mvocamargo/celulas-area-de-conteudo
Description: Criação das áreas de conteúdo para o site das células da Comunidade Católica Colo de Deus
Author: Marcus Camargo 
Version: 1.0.2
Author URI: https://marcuscamargo.com.br/
Text Domain: celulas-areas-de-conteudo
License: GPL-2.0+
*/

if ( ! defined( 'ABSPATH' ) ) exit;

class Areas_Conteudo{
    public function __construct()
    {
        add_action( 'init', array( $this, 'cptui_register_my_cpts' ) );
        add_action( 'init', array( $this, 'cptui_register_my_taxes' ) );
        add_action( 'init', array( $this, 'custom_fields' ), 99 );
    }

    function cptui_register_my_cpts() {

        /**
         * Post Type: Cronograma.
         */
    
        $labels = array(
            "name" => __( "Cronograma" ),
            "singular_name" => __( "Cronograma" ),
            "menu_name" => __( "Cronograma" ),
            "all_items" => __( "Todos os itens" ),
            "add_new" => __( "Adicionar item" ),
            "add_new_item" => __( "Adicionar novo item" ),
            "edit_item" => __( "Editar item" ),
            "new_item" => __( "Novo item" ),
            "view_item" => __( "Ver item" ),
            "view_items" => __( "Ver itens" ),
            "search_items" => __( "Procurar item" ),
            "not_found" => __( "Nenhum intem encontrado" ),
            "not_found_in_trash" => __( "Nenhum item na lixeira" ),
            "parent_item_colon" => __( "Item pai" ),
            "parent_item_colon" => __( "Item pai" ),
        );
    
        $args = array(
            "label" => __( "Cronograma" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "cronograma", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "revisions", "author" ),
        );
    
        register_post_type( "cronograma", $args );
    
    
        /**
         * Post Type: Recursos de Apoio.
         */
    
        $labels = array(
            "name" => __( "Recursos de Apoio" ),
            "singular_name" => __( "Recurso" ),
        );
    
        $args = array(
            "label" => __( "Recursos de Apoio" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "recursos", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail", "excerpt", "revisions", "author" ),
        );
    
        register_post_type( "recursos", $args );
    }
    
    function cptui_register_my_taxes() {

        /**
         * Taxonomy: Fases.
         */
    
        $labels = array(
            "name" => __( "Fases" ),
            "singular_name" => __( "Fase" ),
        );
    
        $args = array(
            "label" => __( "Fases" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'cronograma', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "fase_cronograma",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
            );
        register_taxonomy( "fase_cronograma", array( "cronograma" ), $args );

    }

    function custom_fields(){
        if( class_exists('ACF') ):
            if( function_exists('acf_add_local_field_group') ):
                acf_add_local_field_group(array(
                    'key' => 'group_5d20a7a7f2214',
                    'title' => 'Cronograma - Material',
                    'fields' => array(
                        array(
                            'key' => 'field_5d20a7b61c3c8',
                            'label' => 'Material',
                            'name' => 'material',
                            'type' => 'file',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'library' => 'all',
                            'min_size' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'cronograma',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                ));
                
            endif;
        endif;        
    }
    
}

new Areas_Conteudo;
