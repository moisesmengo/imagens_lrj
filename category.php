<?php 
  $term = get_queried_object(); // Obtém o objeto da taxonomia atual
  $term_id = get_queried_object_id();
  $image_id = get_term_meta( $term_id, 'cat_image_', true );
  $titulo = get_term_meta( $term_id, 'titulo_cat', true );
  $tituloDesc = get_term_meta( $term_id, 'titulo_cat_desc', true );
  $bloco_tax = get_term_meta( $term_id, 'cat_text_', true );

  $args = array(
    'post_type' => 'post',
    'cat' => $term_id,
    'posts_per_page' => 6,
  );
  $query = new WP_Query( $args );

  get_header();
?>
<main class="hero_zonas" style="background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?= $image_id ?>) no-repeat;">
  <div class="container">
    <?php if($titulo): ?>
    <h1><?= $titulo ?></h1>
    <?php else: ?>
    <h1><?= $term->name ?></h1>
    <?php endif ?>
  </div>
</main>

<div class="migalhadepao container">
  <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a> &gt;
  <?php
    // Verifica se há categorias pai e exibe na ordem inversa
    $cat_ancestors = array_reverse(get_ancestors(get_queried_object_id(), 'category'));
    foreach ($cat_ancestors as $cat_ancestor) {
      $cat_ancestor_link = get_category_link($cat_ancestor);
      $cat_ancestor_name = get_cat_name($cat_ancestor);
      echo '<a href="' . $cat_ancestor_link . '">' . $cat_ancestor_name . '</a> &gt; ';
    }
    
    // Exibe a categoria atual
    $current_cat_name = single_cat_title('', false);
    echo $current_cat_name . ' &gt; ';
    
    // Verifica se há postos pai e exibe na ordem inversa
    $post_ancestors = array_reverse(get_post_ancestors(get_queried_object_id()));
    foreach ($post_ancestors as $post_ancestor) {
      $post_ancestor_link = get_permalink($post_ancestor);
      $post_ancestor_title = get_the_title($post_ancestor);
      echo '<a href="' . $post_ancestor_link . '">' . $post_ancestor_title . '</a> &gt; ';
    }
    
    // Exibe o título do post atual
    $current_post_title = single_post_title('', false);
    echo $current_post_title;
  ?>
</div>




<?php if($tituloDesc && $term->description): ?>
<section class="lancamentos_da_semana tax_tag">
  <div class=" container">
    <div class="center">
      <h2 class="titulo"> <?= $tituloDesc  ?>
      </h2>
      <p class="desc_tax"><?php echo $term->description; ?></p>
    </div>
  </div>
</section>
<?php endif ?>

<section>
  <ul class="lista_posts container">
    <?php 
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'post',
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $term_id,
          ),
        ),
        'paged' => $paged,
        'posts_per_page' => 6, // limite de 5 posts por página
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); 
    ?>
    <li>

      <div class="area_image">
        <?php if ( has_post_thumbnail() ) : ?>
        <img src="<?php the_post_thumbnail_url( ); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </div>
      <div class="area_text_tag">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="resumo"><?php the_excerpt(); ?></p>
        <p class="categoria_">Categorias: <?php the_category( ', ' ); ?></p>

      </div>
    </li>
    <?php endwhile;
      wp_reset_postdata();
      else : ?>
    <p><?php _e( 'Nenhum post encontrado na tag' ); ?></p>
    <?php endif; ?>
  </ul>
  <div class="paginas container" style="margin-bottom: 50px">
    <?php next_posts_link('Posts mais antigos', $query->max_num_pages); ?>
    <?php previous_posts_link('Posts mais recentes'); ?>
  </div>
</section>


<?php  
  if ( ! empty( $bloco_tax ) ): 
?>
<div class="bloco-tax ">
  <div class="container">
    <?php echo wpautop(  $bloco_tax); ?>
  </div>
</div>
<?php endif ?>
<?php get_footer(); ?>