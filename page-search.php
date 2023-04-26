<?php 
/* 
Template name: buscar
*/
get_header();

  if($_GET['nome'] && !empty($_GET['nome'])){
    $nome = $_GET['nome'];
  }

  if($_GET['cat'] && !empty($_GET['cat'])){
    $cat = $_GET['cat'];
  }
                   
?>

<main class="hero_zonas" style=" background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?=the_field('banner_hero_search')?>) no-repeat;">
  <div class="container">
    <h1>Resultado da pesquisa</h1>
  </div>
</main>

<div class='resultado_buscas  pd' style="margin-top: 0;">
  <div class='container'>
    <?php include(TEMPLATEPATH . "/inc/form-search.php"); ?>

    <div class="itens_lancamentos_da_semana">
      <div class="swiper lancamentosSemana">
        <div class="swiper-wrapper">
          <?php 
              $nomec = get_field('nome_imovel');
              $args2 = array(
                
                'post_type' => 'imoveis', 
                'order' => 'ASC',
                               
                'posts_per_page' => -1,  
   
                'tax_query' => array(
                    array(
                        'taxonomy' => 'Bairros',
                        'field' => 'slug',
                        'terms' => $cat
                    )
                ),

        
              ); 
              $the_query = new WP_Query ($args2); 
            ?>

          <?php if($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post (); ?>

          <?php include(TEMPLATEPATH . "/inc/slide.php"); ?>
          <?php
              endwhile;
              wp_reset_postdata();
              else:
                ?>
          <p>Nenhuma postagem encontrada!</p>
          <?php endif;
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
</div>


<style>
.resultado_buscas .busca {
  top: 0;
  margin: 0 auto 40px;
}
</style>
<?php get_footer(); ?>