<?php

  function kikonia_post_types() {
    register_post_type('grupy_produktow', array(
      'rewrite' => array(
        'slug' => 'grupy-produktowe'
      ),
      'public' => true,
      'labels' => array(
        'name' => 'Grupy produktów',
        'add_new_item' => 'Dodaj nową grupę produktową'
      ),
      'menu_icon' => 'dashicons-feedback',
      'show_in_rest' => true
    ));

    register_post_type( 'rodzaje_materialow', array(
      'public' => true,
      'labels' => array(
        'name' => 'Rodzaje materiałów',
        'add_new_item' => 'Dodaj nowy materiał'
      ),
      'menu_icon' => 'dashicons-images-alt2'
    ));

    register_post_type( 'produkty', array(
      'public' => true,
      'post_per_page' => -1,
      'labels' => array(
        'name' => 'Produkty',
        'add_new_item' => 'Dodaj nowy produkt'
      ),
      'menu_icon' => 'dashicons-format-image',
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'supports' => array(
        'post-formats', 'title'
      ),
      'show_in_rest' => true
    ));

    register_post_type( 'carousel', array(
      'public' => true,
      'post_per_page' => -1,
      'labels' => array(
        'name' => 'Karuzelka',
        'add_new_item' => 'Dodaj nowy slajd'
      ),
      'menu_icon' => 'dashicons-images-alt'
    ));

    // remove_post_type_support('produkty', 'title');
    // remove_post_type_support('produkty', 'editor');

  }

  add_action( 'init', 'kikonia_post_types' );