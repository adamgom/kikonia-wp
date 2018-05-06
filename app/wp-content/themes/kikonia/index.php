<?php
  get_header();
  echo '<div class="content">';
?>
formatka strony - strona główna</br>
=========================</br></br>
<?php 
  the_title();
  echo "</br>";
  pageBanner(array(
    'title' => 'Tytuł w ramach array - Home Page',
    'subtitle' => 'podtytuł w ramach array - Home Page'
  ));

  while (have_posts()) {
    the_post();
?>
    <h1 class="main"> <a href=" <?php the_permalink(); ?> "><?php the_title(); ?> </a></h1>
    <h3> <?php the_content(); ?> </h3>
<?php  
  }
  echo '</div>';
get_footer();
?>