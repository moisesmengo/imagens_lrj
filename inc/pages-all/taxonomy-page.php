<?php
  function sanitize_taxonomy_name($taxonomy_name) {
    $sanitized_name = strtolower($taxonomy_name);
    $sanitized_name = str_replace(' ', '_', $sanitized_name);
    return $sanitized_name;
  }

  function get_image_id_by_taxonomy($taxonomy_name, $term_id) {
    $meta_key = strtolower($taxonomy_name) . '_image';
    return get_term_meta($term_id, $meta_key, true);
  }
  
  function get_titulo_by_taxonomy($taxonomy_name, $term_id) {
    $meta_key = 'titulo_' . strtolower($taxonomy_name);
    return get_term_meta($term_id, $meta_key, true);
  }
  
  function get_titulo_desc_by_taxonomy($taxonomy_name, $term_id) {
    $sanitized_taxonomy_name = sanitize_taxonomy_name($taxonomy_name);
    $meta_key = 'descricao_titulo_' . $sanitized_taxonomy_name;
    return get_term_meta($term_id, $meta_key, true);
  }

  function get_quarto_campo_personalizado($term_id) {
    $term_meta = get_term_meta($term_id); // Obter todos os campos personalizados (meta dados) do termo
    $contador = 0;
    foreach ($term_meta as $meta_key => $meta_value) {
        // Verificar se o valor do meta não está vazio e se o meta_key não é protegido (não começa com um underscore)
        if (!empty($meta_value[0]) && substr($meta_key, 0, 1) !== '_') {
            $contador++;

            // Verificar se o contador chegou ao quarto campo personalizado
            if ($contador == 4) {
                return $meta_value[0];
            }
        }
    }
    return false;
}  
  get_header();
  $term = get_queried_object(); //obtém o objeto da taxonomia de bairro atual
  $term_id = get_queried_object_id();
  $taxonomy = get_taxonomy($term->taxonomy); //obtém o nome da taxonomia atual
  $image_id = get_image_id_by_taxonomy($taxonomy->name, $term_id);
  $titulo = get_titulo_by_taxonomy($taxonomy->name, $term_id);
  $tituloDesc = get_titulo_desc_by_taxonomy($taxonomy->name, $term_id);
  $bloco_tax = get_quarto_campo_personalizado($term_id);
?>

<main class="hero_zonas" style="background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?=  $image_id ?>) no-repeat; 
  background-position:center;
  ">
  <div class="container">
    <h1><?=  $titulo; ?></h1>
  </div>
</main>

<div class="migalhadepao container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
    <?php
      $queried_object = get_queried_object();
      $taxonomy = $queried_object->taxonomy;
      $term_id = $queried_object->term_id;

      // Exibindo o nome da taxonomia com o link para a página da taxonomia
      $taxonomy_object = get_taxonomy($taxonomy);
      $taxonomy_slug = $taxonomy_object->rewrite['slug'];
      $taxonomy_link = home_url($taxonomy_slug);
      echo '<li class="breadcrumb-item"><a href="' . $taxonomy_link . '">' . $taxonomy_object->labels->singular_name . '</a></li>';

      $term_parents = array_reverse(get_ancestors($term_id, $taxonomy));

      foreach ($term_parents as $parent) {
          $term = get_term($parent, $taxonomy);
          echo '<li class="breadcrumb-item"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
      }

      echo '<li class="breadcrumb-item active">';
      single_term_title();
      echo '</li>';
    ?>
  </ol>
</div>

<section class="lancamentos_da_semana tax_lanc">
  <div class=" container">
    <div class="center">
      <h2 class="titulo"> <?= $tituloDesc ?></h2>
      <p class="desc_tax"><?php echo $term->description; ?></p>
    </div>

    <div class="itens_lancamentos_da_semana">
      <div class="swiper lancamentosSemana">
        <div class="swiper-wrapper">

          <?php 
            $term = get_queried_object(); 
            $post_slug = $term->slug; //obtém o slug da taxonomia de bairro atual
            $taxonomy_name = $term->taxonomy; //obtém o nome da taxonomia atual

            $args2 = array(
                'post_type' => 'imoveis', 
                'order' => 'ASC', 
                'posts_per_page' => 9,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy_name,
                        'field' => 'slug',
                        'terms' => $post_slug,
                    )
                )
            ); 
            $the_query = new WP_Query ($args2); 
          ?>


          <?php if($the_query->have_posts()) : while ($the_query->have_posts())
            : $the_query->the_post(); ?>
          <?php include(TEMPLATEPATH . "/inc/slide.php"); ?>

          <?php
            endwhile;
            wp_reset_postdata();
            else:
              ?>
          <p>Nenhum imóvel encontrado!</p>


          <?php endif;
          ?>


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>

  </div>
</section>

<?php  
  if ( !empty($bloco_tax) ): 
?>
<div class="bloco-tax ">
  <div class="container">
    <?php echo wpautop($bloco_tax); ?>
  </div>
</div>
<?php endif ?>

<?php 
  $term = get_queried_object(); // Obtém a categoria atual
  $term_children = get_term_children($term->term_id, $term->taxonomy);

  if($term_children):
?>
<div class="cat_asse container">
  <h2 class="titulo">Tipos de <?= $term->name ?>s</h2>
  <?php
    $term_id = get_queried_object_id();
    $terms = get_terms(array(
        'taxonomy' => $term->taxonomy,
        'hide_empty' => false,
    ));
    $displayed_terms = array(); // Array para rastrear termos já exibidos
    echo '<ul class="bairros_todos">';
    foreach ($terms as $term) {
        if ($term->parent == $term_id) {
            $has_children = false;
            foreach ($terms as $child_term) {
                if ($child_term->parent == $term->term_id) {
                    // Se o termo tiver filhos, não exibe o termo e seus filhos se algum já tiverem sido exibidos
                    if (in_array($child_term->term_id, $displayed_terms)) {
                        $has_children = true;
                        break;
                    }
                }
            }
            if (!$has_children) {
                $displayed_terms[] = $term->term_id; // Adiciona o termo atual ao array de termos exibidos
                $image_id = get_term_meta($term->term_id, 'tipologias_image', true); // Obtém o ID da imagem da taxonomia
                echo '<li><a href="' . get_term_link($term) . '">';
                if ($image_id) {
                    echo '<img src="' . $image_id . '" alt="' . $term->name . '">';
                }
                echo '<h3>' . $term->name . '</h3></a></li>'; // Exibe o link do termo e a imagem da taxonomia
            }
        }
    }
    echo '</ul>';
?>
</div>

<?php endif ?>

<?php get_footer(); ?>