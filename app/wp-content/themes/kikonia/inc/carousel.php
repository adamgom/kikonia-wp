<!-- karuzelka -->
<?php 
  $carouselPost = new WP_Query(array(
    'post_per_page' => -1,
    'post_type' => 'carousel'
  ));
  echo '<div class="hero-slider">';
  while ($carouselPost->have_posts()) {
    $carouselPost->the_post();
    $carouselImg = get_field('carousel_image');
?>
  <div  class="hero-slider__slide"
        style="background-image: url(<?php echo $carouselImg['url'] ?> )" >
    <div class="hero-slider__interior">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center"> <?php the_title(); ?></h2>
        <p class="t-center"> <?php the_content(); ?></p>
      </div>
    </div>
  </div>
<?php
  }  
  echo '</div>';
?>
