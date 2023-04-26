<?php 
/* 
Template name: home
*/
get_header();
?>
<!-- hero -->
<main class="hero" style="
      background: linear-gradient(
          180deg,
          #181616 -6.86%,
          rgba(217, 217, 217, 0) 127.99%
        ),
        url(<?=the_field('banner_hero')?>) no-repeat;
      background-size: cover;
      <?php if ( get_post_meta( get_the_ID(), 'fixed_bg', 1 ) ) : ?>
        background-attachment: fixed;
      <?php endif; ?>
    ">
  <div class="container">
    <h1><?= the_field('titulo_hero') ?></h1>

    <a href="#lancamentos" class="btn">
      <?= the_field('titulo_botao_hero') ?>
    </a>
    <span>
      <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M9.99922 11.6661C9.57278 11.6661 9.14614 11.5033 8.82116 11.1778L0.488256 2.8449C-0.162752 2.1939 -0.162752 1.13926 0.488256 0.488256C1.13926 -0.162752 2.1939 -0.162752 2.8449 0.488256L9.99922 7.64543L17.1551 0.489558C17.8061 -0.16145 18.8607 -0.16145 19.5117 0.489558C20.1628 1.14057 20.1628 2.1952 19.5117 2.84621L11.1788 11.1791C10.8533 11.5046 10.4263 11.6661 9.99922 11.6661Z"
          fill="white" />
      </svg>
    </span>
  </div>
</main>

<!-- lançamentos da semana -->
<section class="lancamentos_da_semana" id="lancamentos">
  <div class="container">
    <div class="center">
      <?php include(TEMPLATEPATH . "/inc/form-search.php"); ?>

      <?php if(get_field('titulo_lancamentos_semana')): ?>
      <h2 class="titulo"><?= the_field('titulo_lancamentos_semana') ?></h2>
      <?php endif ?>
    </div>

    <div class="conteudo_ls">
      <?= the_field('conteudo_lancamentos_conteudo') ?>
    </div>

    <div class="itens_lancamentos_da_semana">
      <div class="swiper lancamentosSemana">
        <div class="swiper-wrapper">
          <?php 
              $args2 = array(
              'post_type' =>
          'imoveis', 'order' => 'DESC', 'posts_per_page' => -1 ); 
          $the_query =
          new WP_Query ($args2); ?>

          <?php if($the_query->have_posts()) : while ($the_query->have_posts())
          : $the_query->the_post(); ?>

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
</section>

<!-- destaque -->
<section class="destaques mt">
  <div class="container center">
    <h2 class="titulo">
      <?= the_field('titulo_destaque_semana') ?>
    </h2>
  </div>

  <div class="splide" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
      <ul class="splide__list">
        <?php 
          $args2 = array(
            
            'post_type' =>
        'imoveis', 'order' => 'ASC', 'posts_per_page' => -1, 'meta_query' =>
        array( array( 'key' => 'secao_destaque' , 'value' => 'on', 'compare' =>
        '=' ), ), ); $the_query = new WP_Query ($args2); ?>

        <?php if($the_query->have_posts()) : while ($the_query->have_posts()) :
        $the_query->the_post (); ?>

        <li class="splide__slide">
          <div class="banner_destaque" style="
              background: linear-gradient(
                  180deg,
                  #181616 -6.86%,
                  rgba(217, 217, 217, 0) 127.99%
                ),
                url(<?=the_field('bg_hero')?>) no-repeat;
              background-size: cover;
            ">
            <div class="container">
              <div class="banner_info">
                <div class="infos_destaque">
                  <span class="embreve">
                    <div class="br_">
                      <?php the_terms( $post->ID, 'Fase da Obra' ); ?>
                    </div>
                  </span>
                  <h2>
                    <a href="<?php  the_permalink() ?>"><?php the_title() ?></a>
                  </h2>
                </div>
                <div class="destaque_endereco">
                  <span>Apartamentos no bairro <br />
                    <div class="br_">
                      <?php the_terms( $post->ID, 'Bairros' ); ?>
                    </div>
                  </span>
                </div>
              </div>
              <ul>
                <?php if(get_field('qtd_quartos')) : ?>
                <li>
                  <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M16.35 9.45V7C16.35 5.9 15.45 5 14.35 5H11C10.63 5 10.28 5.12 10 5.32C9.72 5.12 9.37 5 9 5H5.65C4.55 5 3.65 5.9 3.65 7V9.45C3.25 9.91 3 10.51 3 11.17V15H4.5V13.5H15.5V15H17V11.17C17 10.51 16.75 9.91 16.35 9.45ZM14.75 8.5H10.75V6.5H14.75V8.5ZM5.25 6.5H9.25V8.5H5.25V6.5ZM15.5 12H4.5V11C4.5 10.45 4.95 10 5.5 10H14.5C15.05 10 15.5 10.45 15.5 11V12ZM18 2V18H2V2H18ZM18 0H2C0.9 0 0 0.9 0 2V18C0 19.1 0.9 20 2 20H18C19.1 20 20 19.1 20 18V2C20 0.9 19.1 0 18 0Z"
                      fill="#fff" />
                  </svg>

                  <p>
                    <span class="quartos"><?= the_field('qtd_quartos') ?></span>
                    quartos
                  </p>
                </li>
                <?php endif ?>
                <?php if(get_field('qtd_banheiros')) : ?>
                <li>
                  <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M6 12C6 11.45 6.45 11 7 11C7.55 11 8 11.45 8 12C8 12.55 7.55 13 7 13C6.45 13 6 12.55 6 12ZM10 13C10.55 13 11 12.55 11 12C11 11.45 10.55 11 10 11C9.45 11 9 11.45 9 12C9 12.55 9.45 13 10 13ZM13 13C13.55 13 14 12.55 14 12C14 11.45 13.55 11 13 11C12.45 11 12 11.45 12 12C12 12.55 12.45 13 13 13ZM10 5.5C8.24 5.5 6.78 6.81 6.54 8.5H13.47C13.3457 7.66773 12.9273 6.90753 12.2908 6.35717C11.6542 5.80682 10.8415 5.50272 10 5.5V5.5ZM10 4C12.76 4 15 6.24 15 9V10H5V9C5 6.24 7.24 4 10 4ZM7 16C7.55 16 8 15.55 8 15C8 14.45 7.55 14 7 14C6.45 14 6 14.45 6 15C6 15.55 6.45 16 7 16ZM10 16C10.55 16 11 15.55 11 15C11 14.45 10.55 14 10 14C9.45 14 9 14.45 9 15C9 15.55 9.45 16 10 16ZM13 16C13.55 16 14 15.55 14 15C14 14.45 13.55 14 13 14C12.45 14 12 14.45 12 15C12 15.55 12.45 16 13 16ZM18 2H2V18H18V2ZM18 0C19.1 0 20 0.9 20 2V18C20 19.1 19.1 20 18 20H2C0.9 20 0 19.1 0 18V2C0 0.9 0.9 0 2 0H18Z"
                      fill="#fff" />
                  </svg>

                  <p>
                    <span class="banheiros"><?= the_field('qtd_banheiros') ?></span>
                    banheiros
                  </p>
                </li>
                <?php endif ?>
                <?php if(get_field('qtd_vagas')) : ?>
                <li>
                  <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M2 20C1.45 20 0.979333 19.8043 0.588 19.413C0.196 19.021 0 18.55 0 18V2C0 1.45 0.196 0.979 0.588 0.587C0.979333 0.195667 1.45 0 2 0H18C18.55 0 19.021 0.195667 19.413 0.587C19.8043 0.979 20 1.45 20 2V18C20 18.55 19.8043 19.021 19.413 19.413C19.021 19.8043 18.55 20 18 20H2ZM2 18H18V2H2V18ZM7 12C6.71667 12 6.47933 11.904 6.288 11.712C6.096 11.5207 6 11.2833 6 11C6 10.7167 6.096 10.479 6.288 10.287C6.47933 10.0957 6.71667 10 7 10C7.28333 10 7.521 10.0957 7.713 10.287C7.90433 10.479 8 10.7167 8 11C8 11.2833 7.90433 11.5207 7.713 11.712C7.521 11.904 7.28333 12 7 12ZM13 12C12.7167 12 12.4793 11.904 12.288 11.712C12.096 11.5207 12 11.2833 12 11C12 10.7167 12.096 10.479 12.288 10.287C12.4793 10.0957 12.7167 10 13 10C13.2833 10 13.521 10.0957 13.713 10.287C13.9043 10.479 14 10.7167 14 11C14 11.2833 13.9043 11.5207 13.713 11.712C13.521 11.904 13.2833 12 13 12ZM3 9.1V15.7C3 15.9333 3.075 16.125 3.225 16.275C3.375 16.425 3.56667 16.5 3.8 16.5H4.2C4.43333 16.5 4.625 16.425 4.775 16.275C4.925 16.125 5 15.9333 5 15.7V14.5H15V15.7C15 15.9333 15.075 16.125 15.225 16.275C15.375 16.425 15.5667 16.5 15.8 16.5H16.2C16.4333 16.5 16.625 16.425 16.775 16.275C16.925 16.125 17 15.9333 17 15.7V9.1L15.35 4.3C15.2667 4.06667 15.1293 3.875 14.938 3.725C14.746 3.575 14.5333 3.5 14.3 3.5H5.7C5.46667 3.5 5.254 3.575 5.062 3.725C4.87067 3.875 4.73333 4.06667 4.65 4.3L3 9.1ZM5.65 7.5L6.35 5.5H13.65L14.35 7.5H5.65ZM2 2V18V2ZM5 12.5V9.5H15V12.5H5Z"
                      fill="#fff" />
                  </svg>

                  <p>
                    <span class="vagas"><?= the_field('qtd_vagas') ?></span>
                    vagas
                  </p>
                </li>
                <?php endif ?>
                <?php if(get_field('metragem')) : ?>
                <li>
                  <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M0 2.22222V17.7778C0 19.0033 0.996667 20 2.22222 20H17.7778C19.0033 20 20 19.0033 20 17.7778V2.22222C20 0.996667 19.0033 0 17.7778 0H2.22222C0.996667 0 0 0.996667 0 2.22222ZM17.78 17.7778H2.22222V2.22222H17.7778L17.78 17.7778Z"
                      fill="#fff" />
                    <path
                      d="M13.3332 9.99989H15.5554V4.44434H9.99989V6.66656H13.3332V9.99989ZM9.99989 13.3332H6.66656V9.99989H4.44434V15.5554H9.99989V13.3332Z"
                      fill="#fff" />
                  </svg>

                  <p>
                    <span class="vagas"><?= the_field('metragem') ?></span>mts
                  </p>
                </li>
                <?php endif ?>
              </ul>
            </div>
          </div>
        </li>

        <?php
              endwhile;
              wp_reset_postdata();
              else:
                ?>
        <div class="nenhum">
          <p>Nenhum destaque encontado!</p>
        </div>
        <?php endif;
        ?>
      </ul>
    </div>
  </div>
</section>

<!-- blog -->
<section class="blog mt">
  <div class="container">
    <h2 class="titulo center">
      <?= the_field('titulo_blog') ?>
    </h2>
    <div class="postagens">
      <?php 
            $args = array(
              'posts_per_page' =>
      3, ); $postlist = new WP_Query( $args ); if($postlist->have_posts()):
      while($postlist->have_posts()) : $postlist->the_post();?>
      <div class="postagem">
        <div class="img_postagem">
          <img src="<?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail_url('large');
                        }
                        else {
                            echo get_bloginfo( 'stylesheet_directory' ) 
                                . '/assets/img/thumbnail-default.jpg"';
                            }
                        ?>" class="img" alt="Postagem" />
        </div>

        <div class="cont_postagem">
          <h2 class="titulo_postagem">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>

          <p class="desc_postagem">
            <?php the_excerpt(); ?>
          </p>
        </div>
      </div>
      <?php 
            endwhile;
            wp_reset_postdata();
            else:
      ?>
      <div class="nenhum">
        <p>Nenhuma postagem encontrada!</p>
      </div>
      <?php endif;
          ?>
    </div>
    <a href="/blog" class="ver_mais center">Ver mais</a>
  </div>
</section>

<!-- newsletter -->
<div class="newsletter">
  <div class="container">
    <p>
      <?= the_field('desc_nlt') ?>
    </p>

    <form>
      <input type="email" name="email" placeholder="Seu E-mail" id="email" required />
      <button class="btn">Cadastrar</button>
    </form>
  </div>
</div>

<section class="blog mt">
  <div class="container">
    <h2 class="titulo center">Bairros</h2>

    <?php
  $terms_per_page = 6;
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $terms = get_terms( array(
      'taxonomy' =>
    'Bairros', 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC',
    'number' => $terms_per_page, 'offset' => ( $paged - 1 ) * $terms_per_page, )
    ); $term_id = get_queried_object_id(); if ( ! empty( $terms ) && !
    is_wp_error( $terms ) ): ?>

    <ul class="bairros_todos">
      <?php foreach( $terms as $term ) :
      $image = get_term_meta( $term->term_id, 'bairros_image', true ); $count =
      $term->count; ?>
      <li>
        <a href="<?= get_term_link( $term ) ?>">
          <h3><?= $term->name ?></h3>
          <?php if( $image ) : ?>
          <img src="<?= $image ?>" alt="Bairro <?= $term->name ?>" />
          <?php endif; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>

    <?php endif; ?>

    <a href="/bairros" class="ver_mais center">Ver mais</a>
  </div>
</section>

<!-- sobre -->
<section class="sobre">
  <div class="container">
    <h2 class="titulo center">
      <?= the_field('sobre_titulo') ?>
    </h2>

    <div class="conteudo_sobre">
      <div class="imobiliaria">
        <?= the_field('sobre_imob') ?>
      </div>
      <div class="comprar">
        <?= the_field('sobre_compra') ?>
      </div>
    </div>
  </div>
</section>

<section class="bloco-tax">
  <div class="container">
    <?php the_content( ) ?>
  </div>
</section>

<a href="<?= the_field('whtas_home') ?>" class="whats">
  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_2131_2)">
      <path
        d="M34.0025 5.81512C32.1687 3.96431 29.9848 2.49698 27.5783 1.49864C25.1717 0.500288 22.5904 -0.00911068 19.985 0.000123326C9.0675 0.000123326 0.17 8.89512 0.16 19.8151C0.16 23.3126 1.075 26.7151 2.8025 29.7276L0 40.0001L10.51 37.2451C13.4175 38.8274 16.6748 39.6568 19.985 39.6576H19.995C30.915 39.6576 39.81 30.7626 39.82 19.8326C39.8225 17.2277 39.3095 14.6481 38.3107 12.2423C37.3118 9.83655 35.8468 7.6522 34 5.81512H34.0025ZM19.985 36.3026C17.0325 36.3036 14.1343 35.5091 11.595 34.0026L10.995 33.6426L4.76 35.2776L6.425 29.1951L6.035 28.5676C4.38452 25.9434 3.51162 22.9052 3.5175 19.8051C3.5175 10.7401 10.91 3.34512 19.995 3.34512C22.1594 3.34124 24.3031 3.76581 26.3026 4.59435C28.302 5.42289 30.1177 6.63902 31.645 8.17262C33.1776 9.70025 34.3925 11.5162 35.2198 13.5157C36.0471 15.5152 36.4703 17.6587 36.465 19.8226C36.455 28.9201 29.0625 36.3026 19.985 36.3026V36.3026ZM29.0225 23.9676C28.53 23.7201 26.0975 22.5226 25.64 22.3526C25.185 22.1901 24.8525 22.1051 24.5275 22.6001C24.195 23.0926 23.245 24.2151 22.96 24.5376C22.675 24.8701 22.38 24.9076 21.885 24.6626C21.3925 24.4126 19.795 23.8926 17.905 22.2001C16.43 20.8876 15.4425 19.2626 15.1475 18.7701C14.8625 18.2751 15.12 18.0101 15.3675 17.7626C15.585 17.5426 15.86 17.1826 16.1075 16.8976C16.3575 16.6126 16.44 16.4026 16.6025 16.0726C16.765 15.7376 16.6875 15.4526 16.565 15.2051C16.44 14.9576 15.4525 12.5151 15.035 11.5301C14.635 10.5576 14.2275 10.6926 13.9225 10.6801C13.6375 10.6626 13.305 10.6626 12.9725 10.6626C12.7214 10.6689 12.4743 10.7269 12.2467 10.8332C12.0192 10.9395 11.816 11.0916 11.65 11.2801C11.195 11.7751 9.9225 12.9726 9.9225 15.4151C9.9225 17.8576 11.6975 20.2051 11.9475 20.5376C12.1925 20.8701 15.4325 25.8676 20.405 28.0176C21.58 28.5301 22.505 28.8326 23.2275 29.0626C24.415 29.4426 25.4875 29.3851 26.3425 29.2626C27.2925 29.1176 29.27 28.0626 29.6875 26.9051C30.0975 25.7451 30.0975 24.7551 29.9725 24.5476C29.85 24.3376 29.5175 24.2151 29.0225 23.9676V23.9676Z"
        fill="white" />
    </g>
    <defs>
      <clipPath id="clip0_2131_2">
        <rect width="40" height="40" fill="white" />
      </clipPath>
    </defs>
  </svg>
</a>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
<script>
var splide = new Splide(".splide", {
  type: "loop",
  autoplay: true,
});

splide.mount();
</script>

<?php get_footer(); ?>