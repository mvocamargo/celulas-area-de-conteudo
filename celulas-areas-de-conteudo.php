<?php
/*
Plugin Name: Células - Áreas de Conteúdo
Description: Criação das áreas de conteúdo para o site das células da Comunidade Católica Colo de Deus
Author: Marcus Camargo 
Version: 1.0.0
Author URI: https://webdevstudios.com/
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
            "publicly_queryable" => false,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
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
            "has_archive" => false,
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

        /**
         * Post Type: Localização Células.
         */
    
        $labels = array(
            "name" => __( "Localização das Células" ),
            "singular_name" => __( "Local" ),
        );
    
        $args = array(
            "label" => __( "Localização das Células" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "yeshiva" ),
            "query_var" => true,
            "supports" => array( 'title', 'thumbnail', 'excerpt', 'revisions' ),
            'menu_icon' => 'dashicons-location-alt',
        );
    
        register_post_type( "celula", $args );
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

        /**
         * Taxonomy: Estados.
         */
    
        $labels = array(
            "name" => __( "Estados" ),
            "singular_name" => __( "Estado" ),
        );
    
        $args = array(
            "label" => __( "Estados" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'estado', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "estado",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
            );
        register_taxonomy( "estado", array( "celula" ), $args );
    }

    function custom_fields(){
        if( class_exists('ACF') ):
            if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_5d1767d0e71e0',
                    'title' => 'Células',
                    'fields' => array(
                        array(
                            'key' => 'field_593c40b828c87',
                            'label' => 'Líder',
                            'name' => 'celula_lider',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'none',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c46913a1b1',
                            'label' => 'Contato líder',
                            'name' => 'celula_contato_lider',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '(XX) XXXXX-XXXX',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c412e28c88',
                            'label' => 'Pré-líder',
                            'name' => 'celula_pre_lider',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c47363a1b2',
                            'label' => 'Contato pré-líder',
                            'name' => 'contato_pre_lider',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '(XX) XXXXX-XXXX',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c45f23a1af',
                            'label' => 'Dia da célula',
                            'name' => 'celula_dia',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c414828c89',
                            'label' => 'Endereço',
                            'name' => 'celula_endereço',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_593c46573a1b0',
                            'label' => 'Ponto de Referência',
                            'name' => 'celula_ponto_de_referencia',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'none',
                            'maxlength' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'celula',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'acf_after_title',
                    'style' => 'seamless',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => array(
                    ),
                    'active' => true,
                    'description' => '',
                ));
                
                acf_add_local_field_group(array(
                    'key' => 'group_5d1767d112b96',
                    'title' => 'Células - Estados',
                    'fields' => array(
                        array(
                            'key' => 'field_5962b59505690',
                            'label' => 'Imagem - Estado',
                            'name' => 'imagem_estado',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'preview_size' => 'medium',
                            'library' => 'all',
                            'return_format' => 'array',
                            'min_width' => 0,
                            'min_height' => 0,
                            'min_size' => 0,
                            'max_width' => 0,
                            'max_height' => 0,
                            'max_size' => 0,
                            'mime_types' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'taxonomy',
                                'operator' => '==',
                                'value' => 'estado',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'seamless',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => array(
                    ),
                    'active' => true,
                    'description' => '',
                ));
                
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

        if( defined( 'RWMB_VER' ) ):
            // 1st meta box
            // echo '<script>alert(\'opa\')</script>';
            $meta_boxes[] = array(
                'id'       => 'mapa_local',
                'title'    => 'Mapa do Local',
                'pages'    => array( 'celula' ),
                'context'  => 'normal',
                'priority' => 'low',
    
                'fields' => array(
                    array(
                        'id'            => 'loc',
                        'name'          => 'Locallização',
                        'type'          => 'map',
                        'std'           => '-23.5332809,-46.6055171',     // 'latitude,longitude[,zoom]' (zoom is optional)
                        'style'         => 'width: 100%; height: 300px',
                        'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
                    ),
                    array(
                        'id'            => 'address',
                        'name'          => 'Endereço',
                        'type'          => 'text',
                        'std'           => 'São Paulo, SP, Brasil',
                    ),
                    array(
                        'id'            => 'cep',
                        'name'          => 'CEP',
                        'type'          => 'text',
                        'std'           => '',
                    ),
                ),
            );
    
            return $meta_boxes;
        endif;
    }
    
}

new Areas_Conteudo;