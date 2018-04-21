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
    wp_enqueue_style('styles', get_stylesheet_uri('/style.css'), NULL, microtime());
    wp_enqueue_script( 'js', get_theme_file_uri('/scripts.js'), NULL, microtime());
  }

  add_action('wp_enqueue_scripts', 'kikonia_files');

  function kikonia_features () {
    add_theme_support( 'title-tag' );
    add_image_size( 'productBasic', 400, 300, false );
    add_image_size( 'productSmall', 200, 150, true );
  }

  add_action( 'after_setup_theme', 'kikonia_features' );

  // add_filter('manage_produkty_posts_columns', 'custom_table_header');
  
  // function custom_table_header($columns) {
  //     $columns['product_group']  = 'Grupa';
  //     $columns['zdj_base']    = 'Zdjęcie';
  //     return $columns;
  // }

  // add_action( 'manage_produkty_posts_custom_column', 'custom_table_content', 10, 2 );

  // function custom_table_content( $column, $post_id ) {
  //     if ($column == 'product_group') {
  //       $grupa = get_post_meta( $post_id, '_grupa', true );
  //       echo $grupa;
  //     }
  //     if ($column == 'zdj_base') {
  //       $zdj = get_post_meta( $post_id, '_zdj', true );
  //       echo $zdj;
  //     }
  // }

  // function custom_table_content( $column_name, $post_id ) {
  //   if ($column_name == 'event_date') {
  //   $event_date = get_post_meta( $post_id, '_bs_meta_event_date', true );
  //     echo  date( _x( 'F d, Y', 'Event date format', 'textdomain' ), strtotime( $event_date ) );
  //   }
  //   if ($column_name == 'ticket_status') {
  //   $status = get_post_meta( $post_id, '_bs_meta_event_ticket_status', true );
  //   echo $status;
  //   }

  //   if ($column_name == 'venue') {
  //   echo get_post_meta( $post_id, '_bs_meta_event_venue', true );
  //   }
  // }

?>