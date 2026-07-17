<?php
/**
 * Plugin Name:       Gestor de Productos
 * Description:       Plugin para registrar el Custom Post Type Productos con soporte para el editor de bloques.
 * Version:           1.0.0
 * Author:            Guillermo Lázaro Alsina
 * Text Domain:       gestor-productos
 * Domain Path:       /languages
 */

// Si se intenta acceder directamente al archivo, abortamos la ejecución.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra el Custom Post Type "Productos".
 *
 * @since 1.0.0
 * @return void
 */
function gpt_register_productos_cpt() {

    $labels = array(
        'name'                  => _x( 'Productos', 'Tipo de contenido general', 'gestor-productos' ),
        'singular_name'         => _x( 'Producto', 'Tipo de contenido singular', 'gestor-productos' ),
        'menu_name'             => __( 'Productos', 'gestor-productos' ),
        'name_admin_bar'        => __( 'Producto', 'gestor-productos' ),
        'add_new'               => __( 'Añadir nuevo', 'gestor-productos' ),
        'add_new_item'          => __( 'Añadir nuevo Producto', 'gestor-productos' ),
        'new_item'              => __( 'Nuevo Producto', 'gestor-productos' ),
        'edit_item'             => __( 'Editar Producto', 'gestor-productos' ),
        'view_item'             => __( 'Ver Producto', 'gestor-productos' ),
        'all_items'             => __( 'Todos los Productos', 'gestor-productos' ),
        'search_items'          => __( 'Buscar Productos', 'gestor-productos' ),
        'not_found'             => __( 'No se han encontrado productos.', 'gestor-productos' ),
        'not_found_in_trash'    => __( 'No se han encontrado productos en la papelera.', 'gestor-productos' ),
        'featured_image'        => __( 'Imagen destacada del producto', 'gestor-productos' ),
        'set_featured_image'    => __( 'Establecer imagen destacada', 'gestor-productos' ),
        'remove_featured_image' => __( 'Eliminar imagen destacada', 'gestor-productos' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'gestor-productos' ),
    );

    $args = array(
        'label'                 => __( 'Producto', 'gestor-productos' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ), // Requisito: Título, Descripción e Imagen Destacada
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Para habilitar el editor de bloques (Gutenberg)
    );

    register_post_type( 'producto', $args );
}
add_action( 'init', 'gpt_register_productos_cpt', 0 );