<?php 
/* 
Template name: paginas
*/
get_header();

?>

<!-- hero -->
<main class="hero_zonas" style=" background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?=the_field('banner_hero_cate')?>) no-repeat;">
  <div class="container">
    <h1>Emcontre seu imóvel</h1>
  </div>
</main>


<section class="lancamentos_da_semana pd">
  <div class="container">
    <div class="center">
      <h2 class="titulo">Imóveis Disponíveis</h2>
    </div>

    <div class="itens_lancamentos_da_semana">
      <div class="swiper lancamentosSemana">
        <div class="swiper-wrapper">
          <?php 
              global $post;
              $post_slug = $post->post_name;
              $args2 = array(
                'post_type' => 'imoveis', 
                'order' => 'ASC', 
                'posts_per_page' => 20,
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

<?php get_footer(); ?>