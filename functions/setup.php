<?php
/**
 * Register theme assets
 */
function theme_assets()
{
    // Remove comments
    function remove_menus()
    {
        remove_menu_page('edit-comments.php');
    }
    // add_action('admin_menu', 'remove_menus');

    // Remove junk from head
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

    // Close publication from xmlrpc.php
    add_filter('xmlrpc_enabled', '__return_false');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Enable woocommerce support
    // add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'theme_assets');

/**
 * Set JS ajax variable for scripts
 */
function ajax_front()
{
    wp_localize_script(
        'main-js',
        'theme',
        [
            'theme' => get_template_directory_uri(),
            'ajax' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('rAnDoMnOnce#@'),
            'endpoint' => esc_url_raw(rest_url('wp/v2')),
            'rtl' => (is_rtl()) ? 'true' : 'false',
        ]
    );
}

add_action('wp_enqueue_scripts', 'ajax_front', 99);

/**
 * Removes a message about a new version of WordPress for all users except the administrator
 */
if (is_admin() && !current_user_can('manage_options')) {
    add_action('init', function () {
        remove_action('init', 'wp_version_check');
    }, 2);
    add_filter('pre_option_update_core', '__return_null');
}

/**
 * Cancel the display of the selected term at the top in the checkbox list of terms
 */
function set_checked_ontop_default($args)
{

    if (!isset($args['checked_ontop'])) {
        $args['checked_ontop'] = false;
    }

    return $args;
}

add_filter('wp_terms_checklist_args', 'set_checked_ontop_default', 10);

/**
 * Remove files "license.txt" and "readme.html"
 */
if (is_admin() && !defined('DOING_AJAX')) {
    $license_file = ABSPATH . '/license.txt';
    $readme_file = ABSPATH . '/readme.html';

    if (file_exists($license_file) && current_user_can('manage_options')) {
        $deleted = unlink($license_file) && unlink($readme_file);

        if (!$deleted) {
            $GLOBALS['readmedel'] = sprintf(__('Failed to delete files: license.txt and readme.html from the %s folder. Remove them manually!', 'theme-text-domain'), ABSPATH);
        } else {
            $GLOBALS['readmedel'] = sprintf(__('Files: license.txt and readme.html Removed from the %s folder', 'theme-text-domain'), ABSPATH);
        }

        add_action('admin_notices', function () {
            echo '<div class="error is-dismissible"><p>' . $GLOBALS['readmedel'] . '</p></div>';
        });
    }
}

/**
 * Remove wordpress version from scripts
 */
function remove_wp_version_from_src($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('script_loader_src', 'remove_wp_version_from_src');
add_filter('style_loader_src', 'remove_wp_version_from_src');

/**
 * Disable error output on the authorization page
 */
function login_obscure_func()
{
    return __('Error: You entered an incorrect username or password.', 'theme-text-domain');
}

add_filter('login_errors', 'login_obscure_func');

/**
 * Show Yoast metabox as low as we can
 */
add_filter('wpseo_metabox_prio', function () {
    return 'low';
});
