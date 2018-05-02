<?php

  add_action( 'rest_api_init', 'api_register');

  function api_register() {
    register_rest_route( 'kikonia', 'produkty', array(
      'methods' => WP_REST_SERVER::READABLE,
      'callback' => 'api_results'
    ));
  }

  function api_results($data) {
    $grupa_produktowa = get_field('product_group');
    // $klucz = $grupa_produktowa[0]->ID;
    // 's' => sanitize_text_field($data['term'])

    $produkty = new WP_Query( array(
      'post_type' => 'produkty',
      'posts_per_page' => -1
      // 'meta_query' => array(
      //   array(
      //     'key' => $klucz,
      //     'compare' => 'LIKE',
      //     'value' => $data
      //   )
      // )
    ));

    $produktyWyszukanie = array();

    while($produkty->have_posts()) {
      $produkty->the_post();
      $grupa_produktowa = get_field('product_group');
      $image = get_field('zdj_base');
      array_push($produktyWyszukanie, array(
        'tytul' => get_the_title(),
        'link' => get_the_permalink(),
        'id_produktu' => get_the_id(),
        'grupa_produktowa_ID' => $grupa_produktowa[0]->ID,
        'grupa_produktowa_nazwa' => $grupa_produktowa[0]->post_name,
        'img' => $image['sizes']['productSmall']
        // 'img_sizes' => $image['sizes']
        // 'img_total' => $image
        // 'grupa_produktowa-total' => $grupa_produktowa[0]
      ));
    }

    return $produktyWyszukanie;
  }

?>