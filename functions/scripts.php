<?php
/**
 * Register theme JS files
 */
function theme_scripts()
{
    $assets = get_assets_url();

    wp_enqueue_script('jquery');

    wp_register_script('webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', false, false, true);

    wp_register_script('sweet-alert', '//cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.min.js', false, false, true);

    wp_register_script('main-js', get_template_directory_uri() . $assets['/assets/build/js/main.js'], 'jquery', false, true);

    $scriptsEnq = [
        'webfont',
        'sweet-alert',
        'main-js',
    ];

    wp_enqueue_script($scriptsEnq);
}

add_action('wp_enqueue_scripts', 'theme_scripts');
