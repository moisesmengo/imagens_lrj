<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- hero -->
<main class="hero hero_blog" style="background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?=  get_the_post_thumbnail_url(); ?>) no-repeat; background-size:cover">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>

  <?php $tags = get_the_tags(); ?>
  <?php if ($tags) { ?>
  <div class="tags_">
    <svg class="icon icon-tag">
      <use xlink:href="#icon-tag"></use>
    </svg>
    <?php foreach ($tags as $tag) { ?>

    <a href="   <?php echo get_tag_link($tag->term_id); ?>" class="tag_"> <svg width="14" height="14"
        viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M12.5995 0H7.63674C7.26533 7.93218e-05 6.90916 0.147686 6.64657 0.410352L0.410053 6.64687C0.147496 6.9095 0 7.26567 0 7.63704C0 8.0084 0.147496 8.36457 0.410053 8.6272L5.3721 13.5892C5.63473 13.8518 5.9909 13.9993 6.36226 13.9993C6.73363 13.9993 7.08979 13.8518 7.35243 13.5892L13.5889 7.35273C13.8522 7.09083 14 6.7344 14 6.36326V1.40052C14 1.02908 13.8524 0.672851 13.5898 0.410203C13.3271 0.147554 12.9709 0 12.5995 0ZM10.5036 4.89692C10.3171 4.90114 10.1316 4.86805 9.95808 4.7996C9.78454 4.73115 9.62642 4.62873 9.49301 4.49833C9.35959 4.36793 9.25358 4.21219 9.18118 4.04026C9.10878 3.86833 9.07147 3.68366 9.07142 3.49711C9.07137 3.31055 9.1086 3.12587 9.18091 2.9539C9.25322 2.78193 9.35916 2.62614 9.4925 2.49567C9.62585 2.36521 9.78392 2.2627 9.95743 2.19417C10.1309 2.12563 10.3164 2.09245 10.5029 2.09658C10.8688 2.10467 11.2171 2.25569 11.473 2.51732C11.729 2.77895 11.8724 3.13039 11.8725 3.49641C11.8726 3.86242 11.7293 4.21393 11.4735 4.47569C11.2177 4.73744 10.8695 4.88864 10.5036 4.89692Z"
          fill="#333333" />
      </svg>
      <?php echo $tag->name; ?></a>
    <?php } ?>
  </div>
  <?php } ?>
</main>

<article class="cont_blog">
  <div class="pd bloco_topo">
    <div class="container">

      <?php the_content() ?>

      <h2 class="titulo mt">Imóveis Relacionados</h2>
      <div class="itens_lancamentos_da_semana">
        <div class="swiper lancamentosSemana">
          <div class="swiper-wrapper">
            <?php 
                global $post;
                $post_slug = $post->post_name;
                
                // Obtenha os termos da taxonomia 'Bairros' associados ao post atual
                $bairros_terms = wp_get_post_terms($post->ID, 'Bairros', array('fields' => 'slugs'));

                $args2 = array(
                    'post_type' => 'imoveis', 
                    'order' => 'ASC', 
                    'posts_per_page' => 10,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'Bairros',
                            'field' => 'slug',
                            'terms' => $bairros_terms,
                        ),
                    ),
                ); 

                $the_query = new WP_Query ($args2); 
            ?>

            <?php if($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <?php include(TEMPLATEPATH . "/inc/slide.php"); ?>

            <?php
                endwhile;
                wp_reset_postdata();
                else:
            ?>
            <p>Nenhum imóvel encontrado!</p>
            <?php endif; ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>

      <div class="area_categorias">
        <h5>Categorias:</h5>
        <?php
            $categories = get_the_category();
            if ($categories) {
              echo '<ul>';
              foreach ($categories as $category) {
                $cat_name = $category->name;
                $cat_link = get_category_link($category->term_id);
                $cat_count = $category->count;
                
                // Verifica se a categoria tem subcategorias
                $subcategories = get_categories(array('parent' => $category->term_id));
                $has_subcategories = (count($subcategories) > 0);
                
                // Adiciona a classe "has-subcategories" se a categoria tiver subcategorias
                $class = $has_subcategories ? 'has-subcategories' : '';
                
                echo '<li class="' . $class . '"><a href="' . $cat_link . '">' . $cat_name . ' <span>(' . $cat_count . ')</span></a>';
                
                if ($has_subcategories) {
                  echo '<ul>';
                  foreach ($subcategories as $subcategory) {
                    $subcat_name = $subcategory->name;
                    $subcat_link = get_category_link($subcategory->term_id);
                    $subcat_count = $subcategory->count;
                    echo '<li><a href="' . $subcat_link . '">' . $subcat_name . ' <span>(' . $subcat_count . ')</span></a>';
                    
                    // Verifica se a subcategoria tem subcategorias
                    $subsubcategories = get_categories(array('parent' => $subcategory->term_id));
                    $has_subsubcategories = (count($subsubcategories) > 0);
                    
                    // Adiciona a classe "has-subcategories" se a subcategoria tiver subcategorias
                    $class = $has_subsubcategories ? 'has-subcategories' : '';
                    
                    if ($has_subsubcategories) {
                      echo '<ul>';
                      foreach ($subsubcategories as $subsubcategory) {
                        $subsubcat_name = $subsubcategory->name;
                        $subsubcat_link = get_category_link($subsubcategory->term_id);
                        $subsubcat_count = $subsubcategory->count;
                        echo '<li><a href="' . $subsubcat_link . '">' . $subsubcat_name . ' <span>(' . $subsubcat_count . ')</span></a></li>';
                      }
                      echo '</ul>';
                    }
                    
                    echo '</li>';
                  }
                  echo '</ul>';
                }
                
                echo '</li>';
              }
              echo '</ul>';
            }
          ?>
      </div>

    </div>
  </div>

  <?php if(get_field('banner_image_blog') ): ?>
  <div class="banner_blog" style="background:  
      url(<?=  the_field('banner_image_blog') ?>) no-repeat; background-size:cover; background-position:center">
  </div>
  <?php endif ?>


  <?php 
  $informacoes = get_field('lista_itens_infor');
  
  if($informacoes ): ?>
  <div class="container pd informações">
    <h2 class="titulo"><?= the_field('titulo_informacoes') ?></h2>
    <ul class="itens_infor">
      <?php 
        foreach ($informacoes as $informacao) :
        ?>
      <li><?= $informacao ?></li>
      <?php endforeach ?>
    </ul>

  </div>
  <?php endif ?>
  <?php if(get_field('titulo_botao_call_blog')): ?>
  <div class="call_blog" style="background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?= the_field('imagem_call_blog') ?>) no-repeat; background-size:cover">
    <div class="container">
      <h2><?= the_field('titulo_call_blog') ?></h2>
      <a href="https://api.whatsapp.com/send?phone=552130839806&text=Ol%C3%A1,%20Gostaria%20de%20mais%20informa%C3%A7%C3%B5es!%20sobre%20o%20Atl%C3%A2ntico%20%20Pode%20me%20ajudar?"
        class="btn"><?= the_field('titulo_botao_call_blog') ?></a>
    </div>
  </div>
  <?php endif ?>



</article>

<?php endwhile; else: ?>

<section class="container pd">
  <h2>
    Página não encontrada
  </h2>
</section>

<?php endif; ?>

<?php get_footer(); ?>