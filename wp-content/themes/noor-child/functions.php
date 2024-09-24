<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: noor
 *
 * @package noor
 * @link http://codex.wordpress.org/Plugin_API
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function dima_child_enqueue_parent_style() {
	$theme   = wp_get_theme( 'Noor' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'noor-style' ), $version );
}

add_action( 'wp_enqueue_scripts', 'dima_child_enqueue_parent_style' );

/**
 * Load languages.
 *
 * @return void
 */
function noor_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'noor', $lang );
}

add_action( 'after_setup_theme', 'noor_lang_setup' );

//we don't need the portfolio type, so remove it.





/**Custom post type for project */
// Our custom post type function
function create_posttype() {

    register_post_type( 'project',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'projects'),
            'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f5b5031f2efe',
        'title' => 'Project Details',
        'fields' => array(
            array(
                'key' => 'field_5f5b507f06a96',
                'label' => 'Project Location',
                'name' => 'project_location',
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
                'key' => 'field_5f5b506806a95',
                'label' => 'Project Website',
                'name' => 'project_website',
                'type' => 'url',
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
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
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

