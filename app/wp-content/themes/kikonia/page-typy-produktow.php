<?php
  // print_r (the_field('ikona'));
  get_header();
  
  echo '<div class="content">';
    echo "<div>";
      the_title(); 
      echo "</br>";
      pageBanner();
    echo "</div>";

// menu typów produktów
//---------------------
    $typyProduktow = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'grupy_produktow'
    ));

    echo '<div class="content__list-group">';
    
    while ($typyProduktow->have_posts()) {
      $typyProduktow->the_post();
      $image = get_field('ikona');
      // the_ID();
?>
      <div class="content__list-item" onclick="selektor(<?php the_ID(); ?>)">
        <img class="content__list-item-img" src="<?php echo $image['url']; ?> " alt="">
        <span class="content__list-item-title"><?php the_title();?></span>
      </div>
<?php
      
    }
    echo "</div>";
  echo "</div>";
  wp_reset_postdata();

// galeria produktów JS

echo '<div class="content pokaz"></div>';

  get_footer();
?>