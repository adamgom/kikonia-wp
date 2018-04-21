<?php
  // print_r (the_field('ikona'));
  get_header();
  
  $typyProduktow = new WP_Query(array(
    'post_per_page' => 2,
    'post_type' => 'grupy_produktow'
  ));

  echo '<div class="content">';
    echo "<div>";
      the_title(); 
      echo "</br>";
      pageBanner();
    echo "</div>";
    
    echo the_ID();

    echo '<div class="content__list-group">';
    while ($typyProduktow->have_posts()) {
      $typyProduktow->the_post();
      $image = get_field('ikona');
      echo the_ID();
?>
      <a class="content__list-item-link" href="">
        <div class="content__list-item">
          
          <img class="content__list-item-img" src="<?php echo $image['url']; ?> " alt="">
          <span class="content__list-item-title"><?php the_title();?></span>
          
        </div>
      </a>
<?php
    }
    echo "</div>";
  echo "</div>";
  echo the_ID();
  wp_reset_postdata();
  echo the_ID();
  echo '<div class="select">';
    
    $select  = new WP_Query(array(
      // 'posts_per_page' => 2,
      'post_type' => 'produkty',
      'meta_key' => 'product_group',
      // 'orderby' => 'meta_value_num',
      // 'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'product_group',
          'compare' => 'LIKE',
          'value' => '17'
          // 'value' => '"' . '16' . '"'
          // 'type' => 'char'
        )
      )
    )); 

    echo '<div class="content__list-group">';
    while ($select->have_posts()) {
      $select->the_post();
      // print_r ($select);

      $image2 = get_field('zdj_base');
?>
      <a class="content__list-item-link" href="">
        <div class="content__list-item">
          
          <img class="content__list-item-img" src="<?php echo $image2['url']; ?> " alt="">
          <span class="content__list-item-title"><?php the_title();?></span>
        </div>
      </a>
<?php
    }
    echo "</div>";
  echo "</div>";
  get_footer();
?>