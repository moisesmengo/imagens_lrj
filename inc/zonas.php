<?php 

add_action('cmb2_admin_init', 'custom_fields_zonas');

function custom_fields_zonas(){
  $cmbHero = new_cmb2_box([
    'id' => 'home_zona_box',
    'title' => 'Hero',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-zonas.php'
    ],
  ]);

  $cmbHero->add_field( array(
    'name' => 'Banner',
    'id' => 'banner_hero_zona',
    'type' => 'file',
    'options' => [
      'url' => false
    ]
	));
}