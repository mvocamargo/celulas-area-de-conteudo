<?php
/*
Plugin Name: Células - Áreas de Conteúdo
Plugin URI: https://github.com/mvocamargo/celulas-area-de-conteudo
Description: Criação das áreas de conteúdo para o site das células da Comunidade Católica Colo de Deus
Author: Marcus Camargo 
<<<<<<< HEAD
Version: 1.2.0
=======
Version: 1.0.2
>>>>>>> 62bd9c8abae22fc2bb6985ead8e1d553ad1bca61
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

                acf_add_local_field_group(array(
                    'key' => 'group_5d2b5ed4f384d',
                    'title' => 'Informações da Célula',
                    'fields' => array(
                        array(
                            'key' => 'field_5d2b5f01fe7bd',
                            'label' => 'Cargo',
                            'name' => 'cargo',
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
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5d2b5f9188702',
                            'label' => 'Dia da Célula',
                            'name' => 'dia_da_celula',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'Domingo' => 'Domingo',
                                'Segunda-Feira' => 'Segunda-Feira',
                                'Terça-Feira' => 'Terça-Feira',
                                'Quarta-Feira' => 'Quarta-Feira',
                                'Quinta-Feira' => 'Quinta-Feira',
                                'Sexta-Feira' => 'Sexta-Feira',
                                'Sábado' => 'Sábado',
                            ),
                            'default_value' => array(
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'return_format' => 'label',
                            'ajax' => 0,
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5d2b606888703',
                            'label' => 'Horário da Célula',
                            'name' => 'horario_da_celula',
                            'type' => 'time_picker',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'display_format' => 'H:i',
                            'return_format' => 'H:i',
                        ),
                        array(
                            'key' => 'field_5d2b60d888704',
                            'label' => 'Data de Nascimento',
                            'name' => 'data_de_nascimento',
                            'type' => 'date_picker',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'display_format' => 'd/m/Y',
                            'return_format' => 'd/m/Y',
                            'first_day' => 0,
                        ),
                        array(
                            'key' => 'field_5d2b60f388705',
                            'label' => 'Número do Celular',
                            'name' => 'numero_do_celular',
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
                            'placeholder' => '12 9 8765-4321',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => 14,
                        ),
                        array(
                            'key' => 'field_5d2b65ea88706',
                            'label' => 'Estado',
                            'name' => 'member_estado',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'Acre' => 'Acre',
                                'Alagoas' => 'Alagoas',
                                'Amapá' => 'Amapá',
                                'Amazonas' => 'Amazonas',
                                'Bahia' => 'Bahia',
                                'Ceará' => 'Ceará',
                                'Distrito Federal' => 'Distrito Federal',
                                'Espírito Santo' => 'Espírito Santo',
                                'Goiás' => 'Goiás',
                                'Maranhão' => 'Maranhão',
                                'Mato Grosso' => 'Mato Grosso',
                                'Mato Grosso do Sul' => 'Mato Grosso do Sul',
                                'Minas Gerais' => 'Minas Gerais',
                                'Pará' => 'Pará',
                                'Paraíba' => 'Paraíba',
                                'Paraná' => 'Paraná',
                                'Pernambuco' => 'Pernambuco',
                                'Piauí' => 'Piauí',
                                'Rio de Janeiro' => 'Rio de Janeiro',
                                'Rio Grande do Norte' => 'Rio Grande do Norte',
                                'Rio Grande do Sul' => 'Rio Grande do Sul',
                                'Rondônia' => 'Rondônia',
                                'Roraima' => 'Roraima',
                                'Santa Catarina' => 'Santa Catarina',
                                'São Paulo' => 'São Paulo',
                                'Sergipe' => 'Sergipe',
                                'Tocantins' => 'Tocantins',
                            ),
                            'default_value' => array(
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'return_format' => 'label',
                            'ajax' => 0,
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5d2b664388707',
                            'label' => 'Cidade',
                            'name' => 'member_cidade',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 1,
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
                            'maxlength' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'user_form',
                                'operator' => '==',
                                'value' => 'all',
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
                
                acf_add_local_field_group(array(
                    'key' => 'group_5d2db8ae5a8d4',
                    'title' => 'Posição Fase',
                    'fields' => array(
                        array(
                            'key' => 'field_5d2db8c03686c',
                            'label' => 'Posição',
                            'name' => 'fase_posicao',
                            'type' => 'number',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '25',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => 1,
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => 'º',
                            'min' => 1,
                            'max' => '',
                            'step' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'taxonomy',
                                'operator' => '==',
                                'value' => 'fase_cronograma',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'acf_after_title',
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
