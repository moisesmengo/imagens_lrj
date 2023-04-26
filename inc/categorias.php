<?php 

add_action('cmb2_admin_init', 'custom_fields_categotias');

function custom_fields_categotias(){
  $cmbHero = new_cmb2_box([
    'id' => 'home_categorias_box',
    'title' => 'Hero',
    'object_types' => ['page'],
    'show_on' => [
        'key' => 'page-template',
        'value' => 'page-categorias.php'
    ],
  ]);

  $cmbHero->add_field( array(
    'name' => 'Banner',
    'id' => 'banner_hero_cate',
    'type' => 'file',
    'options' => [
      'url' => false
    ]
	));
}