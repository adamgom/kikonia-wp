<?php
  function pageBanner($args = NULL) {
    if (!$args['title']) {
      $args['title'] = "Standardowy tytół";
    }

    if (!$args['subtitle']) {
      $args['subtitle'] = "Standardowy podtytół";
    }

    echo "Page Banner: " . $args['title'];
    echo "</br>";
    echo "Subtitle: " . $args['subtitle'];
  }
?>