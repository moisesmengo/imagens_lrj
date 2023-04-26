<!-- buscar -->
<?php 
$home = get_page_by_title('home')->ID; ?>
<section class="busca_detalhada mt" id="busca">
  <form class="container" action="/home#busca" method="POST">
    <h2 class="titulo center">
      <?= the_field('titulo_busca', $home) ?>
    </h2>

    <div class="filtros">
      <div class="selects s1">
        <select name="cidade" id="cidade">
          <option value="">Cidade</option>
          <?php
          $ci = get_terms( array(
                'taxonomy' =>
          'Cidades', 'hide_empty' => false, ) ); foreach($ci as $c) { ?>
          <option value="<?= $c->name ?>"><?= $c->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="selects">
        <select name="tipo" id="tipo">
          <option value="">Tipologia</option>

          <?php
            $tipologias = get_terms( array(
                'taxonomy' =>
                'Tipologias', 'hide_empty' => false, ) ); foreach($tipologias as $t) {
          ?>
          <option value="<?= $t->name ?>"><?= $t->name ?></option>
          <?php } ?>
        </select>

        <select name="fase" id="fase">
          <option value="">Fase da Obra</option>

          <?php
            $fases = get_terms( array(
                'taxonomy' =>
          'Fase da Obra', 'hide_empty' => false, ) ); foreach($fases as $fase) {
          ?>
          <option value="<?= $fase->name ?>"><?= $fase->name ?></option>
          <?php } ?>
        </select>

        <select name="contrutoras" id="contrutoras">
          <option value="">Construtora</option>
          <?php
            $const = get_terms( array(
                'taxonomy' =>
                'Construtora', 'hide_empty' => false, ) 
            ); foreach($const as $con) {
          ?>
          <option value="<?= $con->name ?>"><?= $con->name ?></option>
          <?php } ?>
        </select>

        <select name="bairros" id="bairros">
          <option value="">Bairro</option>
          <?php
            $Bairros = get_terms( array(
                'taxonomy' =>
          'Bairros', 'hide_empty' => false, ) ); foreach($Bairros as $b) { ?>
          <option value="<?= $b->name ?>"><?= $b->name ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <button type="submit" class="btn_buscar filt btn">Buscar</button>
  </form>

  <?php 
    $cidade = $_POST['cidade'] ;
    $tipo = $_POST['tipo'];
    $contrutora  = $_POST['contrutoras'];
    $bairro = $_POST['bairros'] ;
    $fase =  $_POST['fase'] ;
  ?>


  <?php if($cidade || $tipo || $contrutora || $bairro || $fase) : ?>

  <div class="resultado_buscas">

    <div class="container">
      <div class="swiper resultados">
        <div class="swiper-wrapper">
          <?php               
              $args2 = array(
                
              'post_type' => 'imoveis', 'order' => 'ASC', 'posts_per_page' => -1, 
              'tax_query' =>
                array( 'relation' => 'OR', 
                  array( 
                    'taxonomy' => 'Cidades', 
                    'field' => 'slug', 
                    'terms' => $cidade 
                  ), 
                  array( 
                    'taxonomy' => 'Tipologias',
                    'field' => 'slug', 
                    'terms' => $tipo 
                  ),
                  array( 
                    'taxonomy' => 'Bairros',
                    'field' => 'slug', 
                    'terms' => $bairro 
                  ),
                   array( 
                    'taxonomy' => 'Fase da Obra',
                    'field' => 'slug', 
                    'terms' => $fase 
                  ),
                  array( 
                    'taxonomy' => 'Construtora',
                    'field' => 'slug', 
                    'terms' => $contrutora 
                  ),
                  ),
                  
                ); 

          $the_query = new WP_Query
          ($args2); ?>

          <?php if($the_query->have_posts()) : while ($the_query->have_posts())
          : $the_query->the_post (); ?>;
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

  <?php endif ?>
</section>


<style>
.selects.s1 {
  grid-template-columns: repeat(1, 1fr);
}
</style>