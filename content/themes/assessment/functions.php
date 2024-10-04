<?php
/**
 * Theme functions.
 */

/**
 * Enqueue scripts/styles.
 *
 * @return void
 */
function headless_scripts() {
    wp_enqueue_style( 'headless-style', get_template_directory_uri() . '/style.css', array(), rand() );

    $asset_uri   = trailingslashit(get_template_directory_uri()) . 'assets/build/';
    $asset_root  = trailingslashit(get_template_directory()) . 'assets/build/';
    $asset_files = glob($asset_root . '*.asset.php');

    // Enqueue webpack loader.js, if it exists.
    if (true === is_readable($asset_root . 'loader.js')) {
        wp_enqueue_script(
            'assessment/runtime',
            $asset_uri . 'loader.js',
            array(),
            filemtime($asset_root . 'loader.js')
        );
    }

    foreach ($asset_files as $asset_file) {
        $asset_script = require($asset_file);

        $asset_filename = basename($asset_file);

        $asset_slug_parts = explode('.asset.php', $asset_filename);
        $asset_slug       = array_shift($asset_slug_parts);

        $asset_handle = sprintf('assessment/%s', $asset_slug);

        $stylesheet_path = $asset_root . $asset_slug . '.css';
        $stylesheet_uri  = $asset_uri . $asset_slug . '.css';

        $javascript_path = $asset_root . $asset_slug . '.js';
        $javascript_uri  = $asset_uri . $asset_slug . '.js';

        if (true === is_readable($stylesheet_path)) {
            $style_dependencies = [];

            wp_enqueue_style(
                $asset_handle,
                $stylesheet_uri,
                array(),
                $asset_script['version']
            );
        }

        if (true === is_readable($javascript_path)) {
            wp_enqueue_script(
                $asset_handle,
                $javascript_uri,
                $asset_script['dependencies'],
                $asset_script['version']
            );
        }
    }
}

add_action( 'wp_enqueue_scripts', 'headless_scripts' );


function add_custom_theme_support() {
	add_theme_support('post-thumbnails');
};

add_action('after_setup_theme', 'add_custom_theme_support');

/** Create custom post types 
 * 
 * @function create_custom_post_types
 */
function create_custom_post_type() {
	$labels = array(
		'name'               => __( 'Movies', 'Movies' ),
		'singular_name'      => __( 'Movie', 'Movie' ),
		'menu_name'          => __( 'Movies', 'admin menu' ),
		'name_admin_bar'     => __( 'Movie', 'add new on admin bar' ),
		'add_new'            => __( 'Add New', 'Movie' ),
		'add_new_item'       => __( 'Add New Movie' ),
		'new_item'           => __( 'New Movie' ),
		'edit_item'          => __( 'Edit Movie' ),
		'view_item'          => __( 'View Movie' ),
		'all_items'          => __( 'All Movies' ),
		'search_items'       => __( 'Search Movies' ),
		'not_found'          => __( 'No Movies found.' ),
		'not_found_in_trash' => __( 'No Movies found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'movies' ), 
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5, 
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'movies', $args );
}

add_action( 'init', 'create_custom_post_type' );


/** Create custom post types 
 * 
 * @function create_custom_taxonomy
 */
function create_custom_taxonomy() {
	$labels = array(
		'name'              => __( 'Movie Genres', 'Movie Genres' ),
		'singular_name'     => __( 'Movie Genre', 'Movie Genre' ),
		'search_items'      => __( 'Search Movie Genres' ),
		'all_items'         => __( 'All Movie Genres' ),
		'parent_item'       => __( 'Parent Movie Genre' ),
		'parent_item_colon' => __( 'Parent Movie Genre:' ),
		'edit_item'         => __( 'Edit Movie Genre' ),
		'update_item'       => __( 'Update Movie Genre' ),
		'add_new_item'      => __( 'Add New Movie Genre' ),
		'new_item_name'     => __( 'New Movie Genre Name' ),
		'menu_name'         => __( 'Movie Genres' ),
	);

	$args = array(
		'hierarchical'      => true, 
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'movie-genre' ),
	);

	register_taxonomy( 'movie-genre', array( 'movies' ), $args );
}

add_action( 'init', 'create_custom_taxonomy', 0 );
