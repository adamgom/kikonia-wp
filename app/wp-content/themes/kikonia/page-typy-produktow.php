<?php
  get_header();
?>
  <div class="content">
  <?php  
    the_title(); 
    echo "</br>";
    pageBanner();
    $typyProduktow = new WP_Query(array(
      'post_per_page' => 2,
      'post_type' => 'grupy_produktow'
    ));

    echo "<ul>";

    while ($typyProduktow->have_posts()) {
      $typyProduktow->the_post();
      $image = get_field('ikona');
  ?>
      <li class="content__list-item">
        <div>
          <?php the_title();?>
          <img src="<?php echo $image['url']; ?> " alt="">
        </div>
      </li>
      
  <?php
    // print_r (the_field('ikona'));
    }
    echo "</ul>";
  ?>
  </div>
<?php 
  get_footer();
?>