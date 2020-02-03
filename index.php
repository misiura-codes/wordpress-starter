<?php get_header();?>
  <?php while (have_posts()): ?>

    <?php the_post();?>

    <?php the_title();?>

    <?php the_content();?>

    <div class="container">
      <div class="row">
        <div class="col-xl-1">1if</div>
        <div class="col-xl-1">2i</div>
        <div class="col-xl-1">3i</div>
        <div class="col-xl-1">4i</div>
        <div class="col-xl-1">5i</div>
        <div class="col-xl-1">6i</div>
        <div class="col-xl-1">7i</div>
        <div class="col-xl-1">8i</div>
        <div class="col-xl-1">9i</div>
        <div class="col-xl-1">10i</div>
        <div class="col-xl-1">11i</div>
        <div class="col-xl-1">12i</div>
      </div>
    </div>

  <?php endwhile;?>
<?php get_footer();?>