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
      'post_per_page' => 2,
      'post_type' => 'grupy_produktow'
    ));

    echo '<div class="content__list-group">';
    $i = 0;
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
      $i += 1;
    }
    echo "</div>";
  echo "</div>";
  wp_reset_postdata();

// lista wybranych produktów
//---------------------


// lista wybranych produktów - alterantywny kod
//---------------------

echo '<div class="content pokaz"></div>';

  get_footer();
?>