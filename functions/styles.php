<?php
/**
 * Register theme CSS files
 */
function theme_styles()
{
    $assets = get_assets_url();

    wp_register_style('swal', '//cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.min.css');
    wp_register_style('main', get_template_directory_uri() . $assets['/assets/build/css/bundle.css']);
    wp_register_style('theme', get_stylesheet_uri());

    $stylesEnq = [
        'swal',
        'main',
        'theme',
    ];

    wp_enqueue_style($stylesEnq);
}

add_action('wp_enqueue_scripts', 'theme_styles');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function editor_styles()
{
    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('assets/build/css/bundle.css');
}
// add_action('after_setup_theme', 'editor_styles');
