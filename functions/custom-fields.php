<?php
/**
 * Advanced Custom Fields settings & pages
 */
if (class_exists('acf')) {
    /**
     * Add Template settings page from ACF plugin
     */
    if (function_exists('acf_add_options_page')) {

        $option_page = acf_add_options_page([
            'page_title' => __('Additional Settings', 'theme_text_domain'),
            'menu_title' => __('Additional', 'theme_text_domain'),
            'menu_slug' => 'theme-additional-settings',
            'capability' => 'manage_options',
            'redirect' => false,
            'icon_url' => 'dashicons-admin-tools',
        ]);
    }

    /**
     * Google Maps API key for ACF
     */
    function my_acf_google_map_api($api)
    {

        $api['key'] = '';

        return $api;
    }

    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

    /**
     * Disable ACF in admin menu
     */
    // add_filter('acf/settings/show_admin', '__return_false');

}
