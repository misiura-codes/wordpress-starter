<nav role="navigation">
  <?php
    if (has_nav_menu('header_menu-mobile')) {
      $args_mobile_menu = [
        'theme_location' => 'header_menu-mobile',
        'type' => 'text',
        'container' => false,
        'depth' => 1,
        'menu_class' => 'main-header__mobile',
      ];

      wp_nav_menu($args_mobile_menu);
    }
  ?>
</nav>
