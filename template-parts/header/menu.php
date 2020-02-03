<nav role="navigation">
<?php
if (has_nav_menu('header_menu-main')) {
    $args_main_menu = [
        'theme_location' => 'header_menu-main',
        'type' => 'text',
        'container' => false,
        'depth' => 1,
    ];

    wp_nav_menu($args_main_menu);
}
?>
</nav>
