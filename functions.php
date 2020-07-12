<?php

  $func_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Error');
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p>";
    if (!is_admin()) {
      wp_die(wp_kses_post($message), wp_kses_post($title));
    }
  };

  $includes = [
    'setup',
    'utils',
    'menus',
    'styles',
    'scripts',
    'custom-fields',
    'acf-blocks',
    'forms',
  ];
  array_map(function ($file) use ($func_error) {
    $file = "functions/{$file}.php";
    if (!locate_template($file, true, true)) {
      $func_error(sprintf(__('Error locating <code>%s</code> for inclusion.'), $file), 'File not found');
    }
  }, $includes);
