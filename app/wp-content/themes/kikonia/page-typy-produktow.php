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

    echo '<div class="content__type-group">';
    
    while ($typyProduktow->have_posts()) {
      $typyProduktow->the_post();
      $image = get_field('ikona');
      // the_ID();
?>
      <div class="content__type-item" onclick="selektor(<?php the_ID(); ?>)">
        <img class="content__type-item-img" src="<?php echo $image['url']; ?> " alt="">
        <span class="content__type-item-title"><?php the_title();?></span>
      </div>
<?php
      
    }
    echo "</div>";
  echo "</div>";
  wp_reset_postdata();
?>

<!-- galeria produktów JS -->
  <div class="content showProducts"></div>

<!-- wybrany produkt -->
  <div class="search-overlay openProductDetails">
    <div class="row">
      <div class="col__11 showProductDetails">
      </div>
      <div class="col__1">
        <i onclick="closeProductDetails()" class="fa fa-window-close fa-2x search-overlay__close" aria-hidden="true"></i>
      </div>
    </div>
    <!-- <div class="container">
      <div id="search-overlay__results"></div>
    </div> -->
  </div>

<?php
  get_footer();
?>