<?php
  get_header();
  //Template name: landing-page
?>
<!-- Hero -->
<main class="hero" style="
    background: linear-gradient(
        180deg,
        #181616 -6.86%,
        rgba(217, 217, 217, 0) 127.99%
      ),
      url(<?=the_field('bg_hero')?>) no-repeat;
    background-size: cover;
    <?php if ( get_post_meta( get_the_ID(), 'fixed_bg', 1 ) ) : ?>
      background-attachment: fixed;
    <?php endif; ?>
  ">
  <div class="container">
    <h1><?php the_title() ?></h1>

    <p><?= the_field('desc_imovel') ?></p>

    <?php include(TEMPLATEPATH . "/inc/call.php"); ?>
  </div>
</main>
<!-- Menu -->
<nav class="lp_menu" style="background: <?=the_field('bg_menu_color') ?>">
  <ul class="container">
    <li><a href="#sobre">Sobre</a></li>
    <li><a href="#diferenciais">Diferenciais</a></li>
    <li><a href="#localizacao">Localização</a></li>
    <li><a href="#acompanhe">Acompanhe a Obra</a></li>
    <li><a href="#contato">Contato</a></li>
  </ul>
</nav>

<!-- sobre -->
<?php if ( !get_post_meta( get_the_ID(), 'ocultar_sessao_sobre', true ) ) : ?>
<section class="destaques" id="sobre">
  <div class="container">
    <?php if(get_field('difentrega')) : ?>
    <h2 class="titulo">
      <?= the_field('difentrega') ?>
    </h2>
    <?php endif ?>

    <div class="infos_ap">
      <?php if(get_field('qtd_suites')) : ?>
      <div>
        <p>Apartamentos<span class="fl">
            <span class="com">com</span>
            <strong><?= the_field('qtd_suites') ?></strong>
            <span class="ns">suítes</span>
          </span>

        </p>
      </div>
      <?php endif ?>

      <?php if(get_field('metragem')) : ?>
      <div>
        <span><strong><?= the_field('metragem') ?></strong> de área primitiva</span>
      </div>
      <?php endif ?>

      <?php if(get_field('qtd_vagas')) : ?>
      <div>
        <strong><?= the_field('qtd_vagas') ?></strong>
        <span> Vagas de <br> Garagem</span>
      </div>
      <?php endif ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section>
  <div class=" container">
    <div class="infos_imovel">
      <?php 
        if(get_field('valor_imovel') || get_field('q_estrelas') ) : 
      ?>
      <div class="avalaiacao">
        <?php if(get_field('q_estrelas') == 5) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/5estrelas.svg" alt="avaliação" class="img" />
        <?php elseif(get_field('q_estrelas') == 4) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/4estrelas.svg" alt="avaliação" class="img" />
        <?php elseif(get_field('q_estrelas') == 3) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/3estrelas.svg" alt="avaliação" class="img" />
        <?php elseif(get_field('q_estrelas') == 2) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/2estrelas.svg" alt="avaliação" class="img" />
        <?php elseif(get_field('q_estrelas') == 1) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/1estrelas.svg" alt="avaliação" class="img" />
        <?php endif ?>

        <?php if(get_field('valor_imovel')) : ?>
        <div class="preco">
          <span>Á partir de <strong>R$</strong>
            <p class="valor"><?= the_field('valor_imovel') ?></p>
          </span>
        </div>
        <?php endif ?>
      </div>
      <?php endif ?>
      <ul>
        <?php if(get_field('qtd_quartos')) : ?>
        <li>
          <svg width="75" height="57" viewBox="0 0 75 57" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10.7143 0C6.30804 0 2.67857 3.62946 2.67857 8.03571V26.1991C1.04464 27.675 0 29.7884 0 32.1429V56.25H13.3929V50.8929H61.6071V56.25H75V32.1429C75 29.7884 73.9554 27.675 72.3214 26.1991V8.03571C72.3214 3.62946 68.692 0 64.2857 0H10.7143ZM10.7143 5.35714H64.2857C65.7723 5.35714 66.9643 6.54911 66.9643 8.03571V24.1071H61.6071V21.4286C61.6071 17.0223 57.9777 13.3929 53.5714 13.3929H42.8571C40.8054 13.3929 38.9223 14.1964 37.5 15.4848C36.0357 14.147 34.1263 13.4013 32.1429 13.3929H21.4286C17.0223 13.3929 13.3929 17.0223 13.3929 21.4286V24.1071H8.03571V8.03571C8.03571 6.54911 9.22768 5.35714 10.7143 5.35714ZM21.4286 18.75H32.1429C33.6295 18.75 34.8214 19.942 34.8214 21.4286V24.1071H18.75V21.4286C18.75 19.942 19.942 18.75 21.4286 18.75ZM42.8571 18.75H53.5714C55.058 18.75 56.25 19.942 56.25 21.4286V24.1071H40.1786V21.4286C40.1786 19.942 41.3705 18.75 42.8571 18.75ZM8.03571 29.4643H66.9643C68.4509 29.4643 69.6429 30.6563 69.6429 32.1429V50.8929H66.9643V45.5357H8.03571V50.8929H5.35714V32.1429C5.35714 30.6563 6.54911 29.4643 8.03571 29.4643Z"
              fill="#121212" />
          </svg>

          <span><?= the_field('qtd_quartos') ?>
            quartos</span>
        </li>
        <?php endif ?>
        <?php if(get_field('qtd_quartos')) : ?>
        <li>
          <svg width="76" height="76" viewBox="0 0 76 76" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M70.5 41.75H10.5V13.625C10.4971 12.5658 10.7043 11.5166 11.1097 10.538C11.515 9.55948 12.1104 8.67106 12.8614 7.92418L12.9239 7.86168C14.1009 6.68643 15.612 5.90322 17.2508 5.61902C18.8896 5.33483 20.5762 5.56353 22.0802 6.27386C20.6598 8.63541 20.0694 11.4039 20.4029 14.1395C20.7363 16.875 21.9744 19.4206 23.9205 21.3718L25.6316 23.0829L22.482 26.2326L26.0173 29.7679L29.1669 26.6184L46.6183 9.1673L49.7678 6.01777L46.2323 2.4823L43.0827 5.63183L41.3716 3.92074C39.3229 1.87782 36.6224 0.618487 33.7406 0.362197C30.8588 0.105907 27.9784 0.868908 25.6014 2.51824C23.0949 0.935292 20.1245 0.251922 17.1782 0.58039C14.2319 0.908859 11.485 2.22963 9.38859 4.32574L9.32609 4.38824C8.10929 5.59839 7.14459 7.03787 6.48784 8.62335C5.83109 10.2088 5.49533 11.9088 5.5 13.625V41.75H0.5V46.75H5.5V51.5468C5.49989 51.9499 5.5649 52.3503 5.6925 52.7326L10.3438 66.6857C10.592 67.4328 11.0693 68.0826 11.7078 68.5429C12.3464 69.0032 13.1138 69.2506 13.9009 69.25H15.9166L14.0938 75.5H19.302L21.125 69.25H53.6406L55.5156 75.5H60.7344L58.8594 69.25H62.0984C62.8857 69.2507 63.6532 69.0034 64.2919 68.5431C64.9306 68.0828 65.408 67.4329 65.6562 66.6857L70.3072 52.7326C70.4348 52.3503 70.4999 51.9499 70.5 51.5468V46.75H75.5V41.75H70.5ZM27.4563 7.45621C28.8337 6.08171 30.7002 5.30978 32.6462 5.30978C34.5921 5.30978 36.4586 6.08171 37.8361 7.45621L39.5469 9.1673L29.1673 19.5468L27.4563 17.8361C26.0818 16.4585 25.3099 14.5921 25.3099 12.6461C25.3099 10.7002 26.0818 8.83374 27.4563 7.45621V7.45621ZM65.5 51.3437L61.1981 64.25H14.8019L10.5 51.3437V46.75H65.5V51.3437Z"
              fill="#121212" />
          </svg>

          <span><?= the_field('qtd_banheiros') ?>
            banheiros</span>
        </li>
        <?php endif ?>
        <?php if(get_field('qtd_vagas')) : ?>
        <li>
          <svg width="68" height="61" viewBox="0 0 68 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12.6875 59H2V9.125L34.0625 2L66.125 9.125V59H55.4375M12.6875 59H55.4375M12.6875 59V44.75M55.4375 59V44.75M12.6875 30.5V16.25H55.4375V30.5M12.6875 30.5H55.4375M12.6875 30.5V44.75M55.4375 30.5V44.75M12.6875 44.75H55.4375"
              stroke="#121212" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>

          <span><?= the_field('qtd_vagas') ?>
            vagas</span>
        </li>
        <?php endif ?>
        <?php if(get_field('metragem')) : ?>
        <li>
          <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M0 0H4.39599V61.4516L28.8817 19.0346L55.3016 34.2887L71.1931 6.75664L75 8.95463L56.9105 40.2937L30.4906 25.0396L4.39599 70.2479V70.3359H14.4936L31.5149 40.8563L33.7129 37.0494L37.5154 39.2474L60.1284 52.3035L74.7318 27.009V74.7318H0V0ZM61.7373 58.3084L35.3174 43.0543L19.571 70.3359H70.3359V43.4148L61.7373 58.3084V58.3084Z"
              fill="#121212" />
          </svg>

          <span><?= the_field('metragem') ?></span>
        </li>
        <?php endif ?>
      </ul>
    </div>

    <?php  if(get_field('feito_paravc') && get_field('descIm') ): ?>

    <div class="feito_paravc">
      <h2 class="titulo"><?= the_field('feito_paravc') ?></h2>

      <?php $descIm = get_field('descIm')?>
      <?php echo wpautop(  $descIm); ?>
    </div>

    <?php endif ?>
  </div>

  <?php if(get_field('banner_lazer')) : ?>
  <section class="banner">
    <div class="swiper bn_">
      <div class="swiper-wrapper">
        <?php 
                $imgs_ = get_field('banner_lazer');

                if(isset($imgs_)) { foreach($imgs_ as $ip_) {
              ?>
        <div class="swiper-slide">
          <img src="<?= $ip_ ?>" alt="" />
        </div>
        <?php }} ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
  <?php endif ?>

  <div style="display: flex; justify-content: center; margin: 20px auto 40px">
    <?php include(TEMPLATEPATH . "/inc/call.php"); ?>
  </div>
</section>



<section class="datas">
  <div class="datas_info container">
    <?php if(get_field('inicio_vendas')) : ?>
    <div>
      <h2>Vendas iniciadas em:</h2>
      <span>
        <?php                
          $input = get_field('inicio_vendas'); 
          $date = strtotime($input); echo
          date('d/M/Y', $date);
        ?>
      </span>
    </div>
    <?php else : ?>
    <div>
      <h2>Vendas iniciadas em:</h2>
      <span>Consulte-nos</span>
    </div>
    <?php endif ?>
  </div>
</section>

<!-- video -->
<section class="video">
  <div class="container grid">
    <?php if(get_field('video_imovel') && get_field('img_video')) : ?>
    <div class="area-video">
      <div class="youtube-player pristine">
        <img src="<?= the_field('img_video') ?>" class="img" alt="custom-preview" />
      </div>
    </div>
    <?php endif ?>

    <?php if(get_field('content_video') || get_field('desc_area_video') ) : ?>
    <div class="content_video">
      <h2 class="titulo"><?= the_field('titulo_area_video') ?></h2>
      <p>
        <?php $desc_area_video = get_field('desc_area_video')?>
        <?php echo wpautop(  $desc_area_video); ?>
      </p>
    </div>
    <?php endif ?>
  </div>
</section>

<!-- lazer -->
<section class="lazer">
  <div class="container">
    <?php if(get_field('tt_area_lazer')) : ?>
    <h2 class="titulo"><?= the_field('tt_area_lazer') ?></h2>
    <?php endif ?>

    <?php if(get_field('sobre_area_lazer')) : ?>
    <p>
      <?= the_field('sobre_area_lazer') ?>
    </p>
    <?php endif ?>

    <?php if(get_field('opc_lazer')) : ?>
    <ul class="lista_ap_itens">
      <?php 
            $itens = get_field('opc_lazer');

            if(isset($itens)) { foreach($itens as $i) {
          ?>
      <li><?= $i ?></li>
      <?php }} ?>
    </ul>
    <?php endif ?>
  </div>
</section>

<section class="diferenciais" id="diferenciais">
  <div class="container">
    <h2 class="titulo"><?= the_field('tt_diferenciais') ?></h2>

    <?php if(get_field('diferenciais_grupo')) : ?>
    <div class="diferenciais_itens">
      <?php 
          $diferenciais_ = get_field('diferenciais_grupo');
          if(isset($diferenciais_)) { foreach($diferenciais_ as $d) {
        ?>
      <div class="dif_item">
        <?php if(!$d['dif_icone']) : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-icon.svg" alt="diferencial" />
        <?php else: ?>
        <img src="<?= $d['dif_icone'] ?>" alt="diferencial" />
        <?php endif ?>

        <span><?= $d['dif_titulo'] ?></span>
      </div>
      <?php }} ?>
    </div>
    <?php endif ?>
  </div>
</section>

<!-- regiao -->
<section class="regiao" id="sobre">
  <div class="container">
    <?php if(get_field('tt_localiza')) : ?>
    <h2 class="titulo" id="localizacao">
      <?= the_field('tt_localiza') ?>
    </h2>
    <?php endif ?>

    <p class="desc_regiao">
      <?= the_field('desc_localiza') ?>
    </p>
  </div>

  <div class="mapa">
    <?php if(get_field('mapa_local')): ?>
    <button id="btn-carregar-mapa">ver localização do imóvel</button>
    <div id="mapa-local"></div>

    <script>
    var btnCarregarMapa = document.getElementById('btn-carregar-mapa');
    var mapaLocal = document.getElementById('mapa-local');

    btnCarregarMapa.addEventListener('click', function() {
      if (mapaLocal.innerHTML === '') {
        mapaLocal.innerHTML =
          '<iframe src="<?= get_field('mapa_local') ?>" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        btnCarregarMapa.style.display = 'none';
      }
    });
    </script>
    <?php endif ?>
  </div>

  <div class="container">
    <?php
      $rua_terms = get_the_terms($post->ID, 'Rua');
      $bairro_terms = get_the_terms($post->ID, 'Bairros');
      $cidade_terms = get_the_terms($post->ID, 'Cidades');

      if ($rua_terms || $bairro_terms || $cidade_terms) :
      ?>
    <div class="imovel-endereco">
      <i class="localizacao-icone">📍</i>
      <?php
      if ($rua_terms) {
        foreach ($rua_terms as $term) {
          echo '<span><a href="' . get_term_link($term) . '">' . $term->name . '</a></span>';
        }
      }

      if ($bairro_terms) {
        foreach ($bairro_terms as $term) {
          echo '<span><a href="' . get_term_link($term) . '">' . $term->name . '</a></span>';
        }
      }

      if ($cidade_terms) {
        foreach ($cidade_terms as $term) {
          echo '<span><a href="' . get_term_link($term) . '">' . $term->name . '</a></span>';
        }
      }
    ?>
    </div>
    <?php endif; ?>

  </div>
</section>

<?php if(get_field('agendeTitulo')): ?>
<section class="agende" style="
    background: linear-gradient(
        180deg,
        #181616 -6.86%,
        rgba(217, 217, 217, 0) 127.99%
      ),
      url(<?=the_field('agendebg')?>) no-repeat;
    background-size: cover;
  ">
  <div class="container">
    <h2>
      <?= the_field('agendeTitulo') ?>
    </h2>
    <a class="btn" href="<?= the_field('whtas_imovel') ?>"> Agendar agora </a>
  </div>
</section>
<?php  endif ?>

<!-- galeria -->
<?php if(get_field('implantacao_images') || get_field('decorado_images') || get_field('plantas_images') || get_field('implantacao_images') ) : ?>
<section class="tabs my_galery" id="galeria">
  <div class="container">
    <h2 class="titulo">
      <?= the_field('tt_galeria') ?>
    </h2>
    <ul class="galeria-lista js-tabmenu">
      <?php if(get_field('perpec_images')) : ?>
      <li>Perpectivas</li>
      <?php endif ?>
      <?php if(get_field('plantas_images')) : ?>
      <li>Plantas</li>
      <?php endif ?>
      <?php if(get_field('decorado_images')) : ?>
      <li>Decorado</li>
      <?php endif ?>
      <?php if(get_field('implantacao_images')) : ?>
      <li>Implantação</li>
      <?php endif ?>
    </ul>

    <div class="js-tab-content">
      <?php if(get_field('perpec_images')) : ?>
      <section>
        <div class="swiper perpectivas">
          <div class="swiper-wrapper">
            <?php 
              $imgs_perp = get_field('perpec_images');

              if(isset($imgs_perp)) { foreach($imgs_perp as $ip) {
            ?>
            <div class="swiper-slide">
              <img src="<?= $ip ?>" alt="" />
            </div>
            <?php }} ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
      <?php endif ?>

      <?php if(get_field('plantas_images')) : ?>
      <section>
        <div class="swiper plantas">
          <div class="swiper-wrapper">
            <?php 
              $plantas = get_field('plantas_images');

              if(isset($plantas)) { foreach($plantas as $ipl) {
            ?>
            <div class="swiper-slide">
              <img src="<?= $ipl ?>" alt="" />
            </div>
            <?php }} ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
      <?php endif ?>

      <?php if(get_field('decorado_images')) : ?>
      <section>
        <div class="swiper plantas decorado">
          <div class="swiper-wrapper">
            <?php 
              $decorado = get_field('decorado_images');

              if(isset($decorado)) { foreach($decorado as $dec) {
            ?>
            <div class="swiper-slide">
              <img src="<?= $dec ?>" alt="" />
            </div>
            <?php }} ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
      <?php endif ?>

      <?php if(get_field('implantacao_images')) : ?>
      <section>
        <div class="swiper plantas implantacao">
          <div class="swiper-wrapper">
            <?php 
              $implantacao = get_field('implantacao_images');

              if(isset($implantacao)) { foreach($implantacao as $imp) {
            ?>
            <div class="swiper-slide">
              <img src="<?= $imp ?>" alt="" />
            </div>
            <?php }} ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
      <?php endif ?>
    </div>

    <p>
      <?php $p_galeria = get_field('p_galeria')?>
      <?php echo wpautop(  $p_galeria); ?>
    </p>

    <?php if(get_field('btn_galeria')) : ?>
    <?php include(TEMPLATEPATH . "/inc/call.php"); ?>
    <?php endif ?>
  </div>
</section>
<?php endif ?>

<!-- como está -->
<section class="estagio">
  <div class="container">
    <div class="estagio_da_obra" id="acompanhe">
      <div class="como_esta">
        <h3>como está a obra?</h3>

        <?php 
          $preparo = get_field('preparo') . "%";
          $fundacao = get_field('fundacao') . "%";
          $estruturacao = get_field('estruturacao') . "%";
          $alvenaria = get_field('alvenaria') . "%";
          $instalacao = get_field('instalacao') . "%";
          $acabamento = get_field('acabamento') . "%";
        ?>

        <?php if($preparo > 0 || $fundacao > 0  || $estruturacao  > 0   || $alvenaria > 0  || $instalacao > 0  || $acabamento > 0 ) : ?>

        <div class="itens_estagio">
          <div class="item_estagio">
            <div class="progresso" style="width: <?= $preparo ?>">
            </div>
            <span>Preparo do Terreno</span>
            <span class="percent"><?= $preparo ?></span>
          </div>

          <div class="item_estagio">
            <div class="progresso" style="width: <?= $fundacao ?>"></div>
            <span>Fundação</span>
            <span class="percent"><?= $fundacao ?></span>
          </div>

          <div class="item_estagio">
            <div class="progresso" style="width: <?= $estruturacao ?>"></div>
            <span>Estruturação</span>
            <span class="percent"><?= $estruturacao ?></span>
          </div>

          <div class="item_estagio">
            <div class="progresso" style="width: <?= $alvenaria ?>"></div>
            <span>Alvenaria</span>
            <span class="percent"><?= $alvenaria ?></span>
          </div>

          <div class="item_estagio">
            <div class="progresso" style="width: <?= $instalacao ?>"></div>
            <span>Instalações</span>
            <span class="percent"> <?= $instalacao ?></span>
          </div>

          <div class="item_estagio">
            <div class="progresso" style="width: <?= $acabamento ?>"></div>
            <span>Acabamento</span>
            <span class="percent"><?= $acabamento ?></span>
          </div>
        </div>

        <?endif ?>
      </div>

      <div class="infos_obra">
        <div class="datas_">
          <div>
            <i class="inicio_">Início das vendas</i>
            <strong>
              <?php 
                $inicio_vendas = get_field('inicio_vendas');
                if ($inicio_vendas) {
                  echo $inicio_vendas;
                } else {
                  echo 'Contate-nos';
                }
                ?>
            </strong>
          </div>

          <div>
            <i class="inicio_">Entrega Prevista</i>
            <strong>
              <?php 
              $entrega_prevista = get_field('entrega_prevista');
              if ($entrega_prevista) {
                echo $entrega_prevista;
              } else {
                echo 'Contate-nos';
              }
              ?>
            </strong>
          </div>
        </div>

        <div>
          <h4>Tipologia:</h4>
          <ul>
            <li>
              <?php 
            // Obtém a lista de termos associados ao post atual na taxonomia 'Tipologias'
            $terms = get_the_terms($post->ID, 'Tipologias'); 
            
            // Itera sobre cada termo na lista de termos
            foreach($terms as $term) :             
                // Obtém o link para o arquivo do termo
                $term_link = get_term_link($term);
            ?>
              <span><a href="<?= $term_link ?>"><?= $term->name ?></a><br /></span>
              <?php endforeach ?>
            </li>
          </ul>
        </div>

        <?php 
          $construtora_terms = get_the_terms($post->ID, 'Construtora');

          if ($construtora_terms && !is_wp_error($construtora_terms)) : 
          ?>
        <div>
          <h4>Construtora:</h4>
          <ul>
            <?php
            foreach($construtora_terms as $term) : 
                $term_link = get_term_link($term);
            ?>
            <li><a href="<?= $term_link ?>"><?= $term->name ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
        <?php endif; ?>



        <?php if(get_field('total_unidades')) : ?>
        <div>
          <h4>Total de Unidades:</h4>
          <span><?= the_field('total_unidades') ?></span>
        </div>
        <?php endif ?>

        <?php if(get_field('total_torres')) : ?>
        <div>
          <h4>Número de Torres:</h4>
          <span><?= the_field('total_torres') ?></span>
        </div>
        <?php endif ?>

        <?php if(get_field('pavimetos')) : ?>
        <div>
          <h4>Número de Pavimentos:</h4>
          <ul>
            <?php
                $pavimentos = get_field('pavimetos');
                if(isset($pavimentos)) { foreach($pavimentos as $pav) {
               ?>
            <li><?= $pav ?></li>
            <?php }} ?>
          </ul>
        </div>
        <?php endif ?>

        <?php if(get_field('total_elevadores')) : ?>
        <div>
          <h4>Número de Elevadores:</h4>
          <span><?= the_field('total_elevadores') ?></span>
        </div>
        <?php endif ?>

        <?php if(get_field('qtd_vagas')) : ?>
        <div>
          <h4>Total de Vagas:</h4>
          <span><?= the_field('qtd_vagas') ?>
            vagas</span>
        </div>
        <?php endif ?>

        <?php if(get_field('pj_arquitetura')) : ?>
        <div>
          <h4>Projeto de Arquitetura:</h4>
          <span><?= the_field('pj_arquitetura') ?></span>
        </div>
        <?php endif ?>

        <?php if(get_field('pj_paisagismo')) : ?>
        <div>
          <h4>Projeto de Paisagismo:</h4>
          <span><?= the_field('pj_paisagismo') ?></span>
        </div>
        <?php endif ?>

        <?php if(get_field('pj_interiores')) : ?>
        <div>
          <h4>Projeto de Interiores:</h4>
          <span><?= the_field('pj_interiores') ?></span>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>

<!-- ebook -->
<?php if(get_field('imovel_pdf_url')) : ?>
<div class="ebook" style="
      background: linear-gradient(
          91.59deg,
          #1c1c1c -46.88%,
          rgba(36, 34, 34, 0.324658) 59.8%,
          rgba(39, 38, 38, 0) 111.09%
        ),
        url(<?= the_field('bg_ebook') ?>)
          no-repeat;
      background-size: cover;
      <?php if ( get_post_meta( get_the_ID(), 'fixed_bg_ebook', 1 ) ) : ?>
        background-attachment: fixed;
      <?php endif; ?>
    ">
  <div class="container">
    <a href="<?= the_field('imovel_pdf_url') ?>" class="btn_ebook btn"><?= the_field('txt_btn_ebook') ?></a>
  </div>
</div>
<?php endif ?>

<section class="block pd bloco-tax">
  <div class="container">
    <?php the_content( ) ?>
  </div>
</section>

<!-- vantagens -->
<section class="vantagens">
  <div class="container">
    <?php if(get_field('tt_vantagens')) : ?>
    <h2 class="titulo"><?= the_field('tt_vantagens') ?></h2>
    <?php endif ?>

    <p>
      <?= the_field('desc_vantagens') ?>
    </p>

    <ul>
      <?php
        $lista_vantagens = get_field('lista_vantagens');
        if(isset($lista_vantagens)) { foreach($lista_vantagens as $v) {
      ?>
      <li><?= $v ?></li>
      <?php }} ?>
    </ul>
  </div>
</section>

<!-- tour -->
<?php if(get_field('link_tour')) : ?>
<section class="tuor" style="
        background: linear-gradient(
            91.59deg,
            #1c1c1c -46.88%,
            rgba(36, 34, 34, 0.324658) 59.8%,
            rgba(39, 38, 38, 0) 111.09%
          ),
          url(<?= the_field('img_tour') ?>)
            no-repeat;
        background-size: cover;
        <?php if ( get_post_meta( get_the_ID(), 'fixed_bg_tuor', 1 ) ) : ?>
            background-attachment: fixed;
          <?php endif; ?>
        ">
  <div class="container">

    <h2><?= the_field('tt_tour') ?></h2>

    <?php include(TEMPLATEPATH . "/inc/call.php"); ?>
  </div>
</section>
<?php endif ?>


<!-- contato -->
<section class="contato" id="contato">
  <div class="container">
    <?php if(get_field('tt_contato')) : ?>
    <h2 class="titulo"><?= the_field('tt_contato') ?></h2>
    <?php endif ?>

    <div style="display: none">
      <?php include(TEMPLATEPATH . "/inc/form-lp.php"); ?>
    </div>
    <?php include(TEMPLATEPATH . "/inc/form-lp.php"); ?>
  </div>
</section>

<!-- próximos -->
<section class="lancamentos_da_semana">
  <div class="container pd">
    <div class="center">
      <h2 class="titulo">Próximos ao <?php the_title() ?></h2>
    </div>

    <div class="itens_lancamentos_da_semana">
      <div class="swiper lancamentosSemana">
        <div class="swiper-wrapper">
          <?php 
              $args2 = array(
              'post_type' =>
          'imoveis', 'order' => 'ASC', 'posts_per_page' => 10 ); $the_query =
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

<!-- newsletter -->
<?php 
  $home = get_page_by_title('home')->ID;
?>
<div class="newsletter">
  <div class="container">
    <p>
      <?= the_field('desc_nlt', $home) ?>
    </p>

    <form>
      <input type="email" name="email" placeholder="Seu E-mail" id="email" required />
      <button class="btn">Cadastrar</button>
    </form>
  </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<a href="<?= the_field('whtas_imovel') ?>" class="whats" data-whats="<?= the_field('whtas_imovel') ?>">
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

<script>
function initTabNav() {
  const tabmenu = document.querySelectorAll(".js-tabmenu li");
  const tabcontent = document.querySelectorAll(".js-tab-content section");

  if (tabmenu.length && tabcontent.length) {
    tabcontent[0].classList.add("ativo");
    tabmenu[0].classList.add("ativo");

    function activeTab(index) {
      tabcontent.forEach((content) => {
        content.classList.remove("ativo");
      });
      const direcao = tabcontent[index].dataset.anime;
      tabcontent[index].classList.add("ativo");
    }

    tabmenu.forEach((itemMenu, index) => {
      itemMenu.addEventListener("click", () => {
        activeTab(index);
      });
    });
  }
}
initTabNav();

function menuActive() {
  const links = document.querySelectorAll(".js-tabmenu li");

  const handleLink = (event) => {
    links.forEach((link) => {
      link.classList.remove("ativo");
    });
    event.currentTarget.classList.add("ativo");
  };

  links.forEach((link) => {
    link.addEventListener("click", handleLink);
  });
}
menuActive();

function mudarHeader() {
  const header = document.querySelector(".lp_menu");
  const distancia = header.offsetTop;
  window.addEventListener("scroll", () => {
    header.classList.toggle("change", window.scrollY > distancia);
  });
}
mudarHeader();




<?php if(get_field('perpec_images')) : ?>
var swiper = new Swiper(".perpectivas", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
<?php endif ?>
<?php if(get_field('plantas_images')) : ?>
var swiper = new Swiper(".plantas", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
<?php endif ?>
<?php if(get_field('decorado_images')) : ?>
var swiper = new Swiper(".decorado", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
<?php endif ?>

<?php if(get_field('implantacao_images')) : ?>
var swiper = new Swiper(".implantacao", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
<?php endif ?>

<?php if(get_field('banner_lazer')) : ?>
var swiper = new Swiper(".bn_", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
<?php endif ?>



var players = document.querySelectorAll('.youtube-player')

var loadPlayer = function(event) {
  var target = event.currentTarget
  var iframe = document.createElement('iframe')

  iframe.height = target.clientHeight
  iframe.width = target.clientWidth
  iframe.src = '<?= the_field('video_imovel') ?>' + '?autoplay=1'
  iframe.setAttribute('frameborder', 0)
  iframe.setAttribute('autoplay', 'encrypted-media')

  target.classList.remove('pristine')

  if (target.children.length) {
    target.replaceChild(iframe, target.firstElementChild)
  } else {
    target.appendChild(iframe)
  }
}

var config = {
  once: true
}

Array.from(players).forEach(function(player) {
  player.addEventListener('click', loadPlayer, config)
})
</script>

<script>
function initModal() {
  const btnAbrir = document.querySelectorAll('[data-modal="abrir"]');
  const btnFechar = document.querySelector('[data-modal="fechar"]');
  const containerModal = document.querySelector('[data-modal="container"]');

  btnAbrir.forEach((bt) => {
    bt.addEventListener("click", toggleModal);
  });

  btnFechar.addEventListener("click", toggleModal);

  containerModal.addEventListener("click", clickForaModal);

  function toggleModal(e) {
    e.preventDefault();
    containerModal.classList.toggle("ativo");
  }

  function clickForaModal(e) {
    if (e.target === this) toggleModal(e);
  }
}
initModal();
</script>

<script>
var accordion = document.getElementsByClassName("schema-faq-section");
var i;

for (i = 0; i < accordion.length; i++) {
  var question = accordion[i].getElementsByClassName("schema-faq-question")[0];
  question.addEventListener("click", function() {
    this.classList.toggle("active");
    var answer = this.nextElementSibling;
    if (answer.style.display === "block") {
      answer.style.display = "none";
    } else {
      answer.style.display = "block";
    }
  });
}
</script>
<?php get_footer(); ?>