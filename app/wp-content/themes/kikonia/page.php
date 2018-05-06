<?php get_header(); ?>
  <?php
    echo "Formatka stron";
    while (have_posts()) {
      the_post();
  ?>
      <h1> <a href=" <?php the_permalink(); ?> "><?php the_title(); ?> </a></h1>
      <h3> <?php the_content(); ?> </h3>
  <?php
    }
  ?>
  <?php get_footer(); ?>
