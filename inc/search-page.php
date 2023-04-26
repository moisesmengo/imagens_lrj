<?php 

add_action('cmb2_admin_init', 'custom_fields_busca');

function custom_fields_busca(){
  $cmbHero = new_cmb2_box([
    'id' => 'home_seach_box',
    'title' => 'Hero',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-search.php'
    ],
  ]);

  $cmbHero->add_field( array(
    'name' => 'Banner',
    'id' => 'banner_hero_search',
    'type' => 'file',
    'options' => [
      'url' => false
    ]
	));
}