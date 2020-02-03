<?php get_header();?>
  <?php while (have_posts()): ?>

    <?php the_post();?>

    <?php the_title();?>

    <!-- Show 404 page content here -->

  <?php endwhile;?>
<?php get_footer();?>