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

  function kikonia_files() {
    // wp_enqueue_style('styles', get_theme_file_uri('/styles/styles.css'), NULL, '1.0', true);
    wp_enqueue_style('styles', get_stylesheet_uri(), NULL, microtime());
  }

  add_action('wp_enqueue_scripts', 'kikonia_files');

  function kikonia_features () {
    add_theme_support( 'title-tag' );
    add_image_size( 'productBasic', 400, 300, false );
    add_image_size( 'productSmall', 200, 150, true );
  }

  add_action( 'after_setup_theme', 'kikonia_features' );



?>