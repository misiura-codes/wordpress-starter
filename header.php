<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('after_body_open') ?>

<?php get_template_part('template-parts/header/menu'); ?>
<?php get_template_part('template-parts/header/mobile-menu'); ?>
