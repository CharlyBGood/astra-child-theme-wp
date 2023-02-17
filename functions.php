<?php

/**
 * astra-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package astra-child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define('CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{

	wp_enqueue_style('astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all');
}

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);


// Register Custom Post Type for BLOG type 
function post_blogs()
{

	$labels = array(
		'name'                  => _x('Blog', 'Post Type General Name', 'astra'),
		'singular_name'         => _x('', 'Post Type Singular Name', 'astra'),
		'menu_name'             => __('Blog', 'astra'),
		'name_admin_bar'        => __('Blog', 'astra'),
		'archives'              => __('Item Archives', 'astra'),
		'attributes'            => __('Item Attributes', 'astra'),
		'parent_item_colon'     => __('Parent Item:', 'astra'),
		'all_items'             => __('All Items', 'astra'),
		'add_new_item'          => __('Add New Item', 'astra'),
		'add_new'               => __('Add New', 'astra'),
		'new_item'              => __('New Item', 'astra'),
		'edit_item'             => __('Edit Item', 'astra'),
		'update_item'           => __('Update Item', 'astra'),
		'view_item'             => __('View Item', 'astra'),
		'view_items'            => __('View Items', 'astra'),
		'search_items'          => __('Search Item', 'astra'),
		'not_found'             => __('Not found', 'astra'),
		'not_found_in_trash'    => __('Not found in Trash', 'astra'),
		'featured_image'        => __('Featured Image', 'astra'),
		'set_featured_image'    => __('Set featured image', 'astra'),
		'remove_featured_image' => __('Remove featured image', 'astra'),
		'use_featured_image'    => __('Use as featured image', 'astra'),
		'insert_into_item'      => __('Insert into item', 'astra'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'astra'),
		'items_list'            => __('Items list', 'astra'),
		'items_list_navigation' => __('Items list navigation', 'astra'),
		'filter_items_list'     => __('Filter items list', 'astra'),
	);
	$args = array(
		'label'                 => __('', 'astra'),
		'description'           => __('', 'astra'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => true,
		'capability_type'       => 'page',
	);
	register_post_type('blog', $args);
}
add_action('init', 'post_blogs', 0);

// Register Custom Post Type for PODCAST type 
function post_podcast()
{

	$labels = array(
		'name'                  => _x('Podcast', 'Post Type General Name', 'astra'),
		'singular_name'         => _x('', 'Post Type Singular Name', 'astra'),
		'menu_name'             => __('Podcast', 'astra'),
		'name_admin_bar'        => __('Podcast', 'astra'),
		'archives'              => __('Item Archives', 'astra'),
		'attributes'            => __('Item Attributes', 'astra'),
		'parent_item_colon'     => __('Parent Item:', 'astra'),
		'all_items'             => __('All Items', 'astra'),
		'add_new_item'          => __('Add New Item', 'astra'),
		'add_new'               => __('Add New', 'astra'),
		'new_item'              => __('New Item', 'astra'),
		'edit_item'             => __('Edit Item', 'astra'),
		'update_item'           => __('Update Item', 'astra'),
		'view_item'             => __('View Item', 'astra'),
		'view_items'            => __('View Items', 'astra'),
		'search_items'          => __('Search Item', 'astra'),
		'not_found'             => __('Not found', 'astra'),
		'not_found_in_trash'    => __('Not found in Trash', 'astra'),
		'featured_image'        => __('Featured Image', 'astra'),
		'set_featured_image'    => __('Set featured image', 'astra'),
		'remove_featured_image' => __('Remove featured image', 'astra'),
		'use_featured_image'    => __('Use as featured image', 'astra'),
		'insert_into_item'      => __('Insert into item', 'astra'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'astra'),
		'items_list'            => __('Items list', 'astra'),
		'items_list_navigation' => __('Items list navigation', 'astra'),
		'filter_items_list'     => __('Filter items list', 'astra'),
	);
	$args = array(
		'label'                 => __('', 'astra'),
		'description'           => __('', 'astra'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-audio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => true,
		'capability_type'       => 'page',
	);
	register_post_type('podcast', $args);
}
add_action('init', 'post_podcast', 0);

//  add specific class into the custom post type when created

function custom_post_type_class($classes)
{

	global $post;

	// Comprueba si se trata de una entrada del tipo de entrada personalizada 'podcast'
	if ('podcast' == get_post_type($post->ID)) {

		// Agrega un ID con el valor del ID de la entrada
		$classes[] = 'podcast-' . $post->ID;
	}
	if (has_post_thumbnail()) {
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$post_thumbnail_data = wp_get_attachment_metadata($post_thumbnail_id);

		// Comprueba si el archivo multimedia adjunto es un archivo de audio
		if (strpos($post_thumbnail_data['mime_type'], 'audio') !== false) {
			// Agrega la clase "podcast-audio" si el archivo multimedia es un archivo de audio
			$classes[] = 'podcast-audio';
		}
	}
	return $classes;
}

add_filter('post_class', 'custom_post_type_class');
