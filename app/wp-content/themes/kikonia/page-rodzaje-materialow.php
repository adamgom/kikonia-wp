<?php get_header(); ?>
  <div class="content">
    <?php
      echo "Page temlpate";
      while (have_posts()) {
        the_post();
    ?>
        <h1> <a href=" <?php the_permalink(); ?> "><?php the_title(); ?> </a></h1>
        <h3> <?php the_content(); ?> </h3>
    <?php  
      }
    ?>
  </div>    
  <?php get_footer(); ?>