<?php
  // print_r (the_field('ikona'));
  get_header();
  
  echo '<div class="content wrapper">';
    the_title(); 
    echo "</br>";
    pageBanner();
  echo "</div>";
  echo "<!-- typy produktów -->";
  echo '<div class="content wrapper content__type_group">';
// menu typów produktów
//---------------------
    $typyProduktow = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'grupy_produktow'
    ));

    while ($typyProduktow->have_posts()) {
      $typyProduktow->the_post();
      $image = get_field('ikona');
      // the_ID();
?>
      <div class="content__type_item" onclick="selektor(<?php the_ID(); ?>)">
        <img class="content__type_item--img" src="<?php echo $image['url']; ?> " alt="">
        <span class="content__type_item--title"><?php the_title();?></span>
      </div>
<?php
      
    }
  echo "</div>";
  wp_reset_postdata();
?>

<!-- galeria produktów JS -->
  <div id="showProducts" class="content wrapper content__type_group"></div>



<?php
  get_footer();
?>