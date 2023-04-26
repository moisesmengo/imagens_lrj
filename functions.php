<?php
 function get_field($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0) {
  echo get_field($key, $page_id);
}

function __construct( $plugin_name, $version ) {

      // Register the custom post type
      add_action( 'init', array( $this, 'notici_register_cpt' ) );

      // Add notici categories
      add_action( 'init', array( $this, 'notici_register_category_taxonomy' ), 0 );

  }
    


//carregar estilos e scripts
function wp_lrj_scripts(){
  wp_enqueue_style('wp_lrj_style', get_stylesheet_uri(), array(), '1.0', 'all');
  wp_enqueue_style('google-fonts',  'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap' , array(), '1.0', 'all');
  wp_enqueue_style('slide', 'https://unpkg.com/swiper/swiper-bundle.min.css' , array(), '1.0', 'all');

  wp_enqueue_script('wp_lrj_scripts', get_template_directory_uri() . '/assets/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'wp_lrj_scripts');

//configurações do tema
function wp_lrj_config(){
  //registrar menus
  register_nav_menus( array(
    'wp_lrj_principal' => 'Menu Principal',
    'wp_lrj_footer' => 'Menu Rpdapé',
  ));

  //cabeçalhos personalizados
  add_theme_support( 'custom-header', array(
    'height' => 290,
    'width' => 1920
  ));

  add_theme_support( 'align-wide');
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'post_tags' );


  //thumbnails
  add_theme_support('post-thumbnails');

  //logo
  add_theme_support( 'custom-logo', array(
    'width' => 130,
    'height' => 110
  ) );
  

  add_theme_support( 'automatic_feed_links');
  add_theme_support( 'html5', array(
    'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
  ));
}
add_action( 'after_setup_theme', 'wp_lrj_config', 0 );

//incluindo posts personalizados
require get_template_directory() . '/inc/imoveis.php';
require get_template_directory() . '/inc/customHome.php';
require get_template_directory() . '/inc/taxonomias.php';
require get_template_directory() . '/inc/zonas.php';
require get_template_directory() . '/inc/categorias.php';
require get_template_directory() . '/inc/search-page.php';

if(! function_exists('wp_body_open')){
  function wp_body_open(){
    do_action('wp_body_open');
  }
}
//taxonomia
function taxonomy_template() {
  if ( is_tax() ) {
    include( get_template_directory() . '/inc/pages-all/taxonomy-page.php' );
    exit;
  }
}
add_action( 'template_redirect', 'taxonomy_template' );

add_action( 'cmb2_admin_init', 'cmb2_add_post_custom_field' );

function adicionar_taxonomias_imoveis_ao_blog() {
    $taxonomias_imoveis = get_object_taxonomies('imoveis');

    foreach ($taxonomias_imoveis as $taxonomia) {
        if (taxonomy_exists($taxonomia)) {
            register_taxonomy_for_object_type($taxonomia, 'post');
        }
    }
}
add_action('init', 'adicionar_taxonomias_imoveis_ao_blog');

 
function exibir_termo_pai_cmb2($post_id, $taxonomy) {
    $terms = get_the_terms($post_id, $taxonomy);
    if ($terms) {
        foreach ($terms as $term) {
            if ($term->parent == 0) {
                return $term->name;
            }
        }
    }
    return '';
}



require get_template_directory() . '/inc/shortcodes.php';

require get_template_directory() . '/inc/required-field.php';