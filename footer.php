  <!-- footer -->
  <footer>
    <?php if(! is_single()) : ?>
    <div class="populares">
      <div class="container">
        <h2>Buscas Populares</h2>
        <ul>
          <?php
            $args = array(
              's' => '',
              'post_type' => 'imoveis',
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page' => 12
            );

            $recent_posts = new WP_Query($args);

            while($recent_posts->have_posts()) : $recent_posts->the_post();
          ?>

          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

          <?php endwhile; wp_reset_postdata(); ?>
        </ul>


      </div>
    </div>
    <div class="menu_footer">
      <div class="container">
        <div class="logo_footer">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="158" height="73"
            viewBox="0 0 158 73" fill="none">
            <rect width="158" height="73" fill="url(#pattern0)"></rect>
            <defs>
              <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0" transform="translate(0 -0.000513699) scale(0.00625 0.0135274)"></use>
              </pattern>
              <image id="image0" width="160" height="74"
                xlink:href="data:image/png;base64,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">
              </image>
            </defs>
          </svg>
        </div>
        <div class="menu_footer">
          <h2>Menu</h2>
          <?php 
              wp_nav_menu( array(
                'theme_location' => 'wp_lrj_footer',
                'depth' => 1,
                'menu_class' => 'menu_footer'
              ));
             ?>
        </div>
        <div class="contato_footer">
          <h2>Contato</h2>
          <ul>
            <li>
              <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M6.25 15C6.25 15 11.5 10.8 11.5 6.25C11.5 3.3506 9.1494 1 6.25 1C3.3506 1 1 3.3506 1 6.25C1 10.8 6.25 15 6.25 15Z"
                  stroke="#EA8A30" stroke-width="2" stroke-linejoin="round" />
                <path
                  d="M6.2499 8.35002C6.52568 8.35002 6.79875 8.29571 7.05354 8.19017C7.30832 8.08464 7.53982 7.92995 7.73483 7.73495C7.92983 7.53995 8.08451 7.30844 8.19005 7.05366C8.29558 6.79888 8.3499 6.5258 8.3499 6.25002C8.3499 5.97425 8.29558 5.70117 8.19005 5.44639C8.08451 5.19161 7.92983 4.9601 7.73483 4.7651C7.53982 4.5701 7.30832 4.41541 7.05354 4.30988C6.79875 4.20434 6.52568 4.15002 6.2499 4.15002C5.69295 4.15002 5.1588 4.37127 4.76498 4.7651C4.37115 5.15893 4.1499 5.69307 4.1499 6.25002C4.1499 6.80698 4.37115 7.34112 4.76498 7.73495C5.1588 8.12878 5.69295 8.35002 6.2499 8.35002V8.35002Z"
                  stroke="#EA8A30" stroke-width="2" stroke-linejoin="round" />
              </svg>
              <a target="_blank"
                href="https://www.google.com/maps/place/Av.+Jo%C3%A3o+Cabral+de+Mello+Neto,+610+-+Barra+da+Tijuca,+Rio+de+Janeiro+-+RJ,+22775-057/@-22.9860414,-43.3609644,17z/data=!3m1!4b1!4m5!3m4!1s0x9bda2f839ef82f:0x44747fa1a1333252!8m2!3d-22.9860464!4d-43.3587757">
                Avenida João Cabral de Melo Neto, 610, Loja 01 - Barra da
                Tijuca</a>
            </li>
            <li>
              <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M9.33769 9.94971L10.5437 8.74368C10.7062 8.58326 10.9117 8.47345 11.1353 8.42757C11.359 8.3817 11.5911 8.40174 11.8036 8.48525L13.2734 9.07211C13.4881 9.15927 13.6722 9.30803 13.8026 9.49966C13.9329 9.69128 14.0035 9.91719 14.0056 10.1489V12.8409C14.0044 12.9986 13.9713 13.1543 13.9082 13.2988C13.8452 13.4433 13.7536 13.5735 13.6389 13.6817C13.5242 13.7898 13.3888 13.8737 13.2409 13.9281C13.0929 13.9825 12.9355 14.0065 12.7781 13.9985C2.47844 13.3578 0.400204 4.63567 0.00717016 1.29757C-0.0110747 1.13365 0.00559514 0.967719 0.0560831 0.8107C0.106571 0.653681 0.189733 0.509132 0.300097 0.386561C0.410462 0.26399 0.545529 0.166176 0.696411 0.0995532C0.847293 0.0329307 1.01057 -0.000990209 1.1755 2.2004e-05H3.77599C4.00805 0.000708891 4.23459 0.0708044 4.42649 0.201293C4.61838 0.331781 4.76685 0.516695 4.8528 0.73225L5.43965 2.20209C5.52594 2.41372 5.54795 2.64608 5.50294 2.87015C5.45794 3.09421 5.34791 3.30005 5.18661 3.46195L3.98058 4.66797C3.98058 4.66797 4.67512 9.36823 9.33769 9.94971Z"
                  fill="#EA8A30" />
              </svg>
              <a href="tel:(21) 98252-0443"> (21) 98252-0443</a>
            </li>
            <li>
              <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.5 0H0V14H17.5V0ZM15.75 3.5L8.75 7.875L1.75 3.5V1.75L8.75 6.125L15.75 1.75V3.5Z"
                  fill="#EA8A30" />
              </svg>
              <a href="mailto:italolyra@gmail.com">italolyra@gmail.com</a>
            </li>
          </ul>
        </div>
        <div class="siga">
          <h2>Siga-nos</h2>

          <ul class="siga_sociais">
            <li>
              <a href=""><svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M38.75 19.375C38.75 8.67188 30.0781 0 19.375 0C8.67188 0 0 8.67188 0 19.375C0 29.0453 7.08516 37.0609 16.3477 38.5156V24.9758H11.4258V19.375H16.3477V15.1063C16.3477 10.2508 19.2383 7.56875 23.6656 7.56875C25.7859 7.56875 28.0031 7.94688 28.0031 7.94688V12.7125H25.5594C23.1531 12.7125 22.4023 14.2062 22.4023 15.7383V19.375H27.7758L26.9164 24.9758H22.4023V38.5156C31.6648 37.0609 38.75 29.0453 38.75 19.375Z"
                    fill="white" />
                </svg>
              </a>
            </li>
            <li>
              <a href=""><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M19.9946 13.3302C16.3222 13.3302 13.3252 16.3272 13.3252 19.9996C13.3252 23.672 16.3222 26.669 19.9946 26.669C23.667 26.669 26.664 23.672 26.664 19.9996C26.664 16.3272 23.667 13.3302 19.9946 13.3302ZM39.9978 19.9996C39.9978 17.2378 40.0228 14.501 39.8677 11.7442C39.7126 8.5421 38.9821 5.70023 36.6406 3.35869C34.294 1.01215 31.4572 0.286676 28.2551 0.131574C25.4932 -0.0235283 22.7564 0.0014882 19.9996 0.0014882C17.2378 0.0014882 14.501 -0.0235283 11.7442 0.131574C8.5421 0.286676 5.70023 1.01716 3.35869 3.35869C1.01215 5.70524 0.286675 8.5421 0.131574 11.7442C-0.0235283 14.506 0.0014882 17.2428 0.0014882 19.9996C0.0014882 22.7564 -0.0235283 25.4982 0.131574 28.2551C0.286675 31.4572 1.01716 34.299 3.35869 36.6406C5.70524 38.9871 8.5421 39.7126 11.7442 39.8677C14.506 40.0228 17.2428 39.9978 19.9996 39.9978C22.7614 39.9978 25.4982 40.0228 28.2551 39.8677C31.4572 39.7126 34.299 38.9821 36.6406 36.6406C38.9871 34.294 39.7126 31.4572 39.8677 28.2551C40.0278 25.4982 39.9978 22.7614 39.9978 19.9996V19.9996ZM19.9946 30.2614C14.3159 30.2614 9.73288 25.6784 9.73288 19.9996C9.73288 14.3209 14.3159 9.73789 19.9946 9.73789C25.6734 9.73789 30.2564 14.3209 30.2564 19.9996C30.2564 25.6784 25.6734 30.2614 19.9946 30.2614ZM30.6766 11.7142C29.3508 11.7142 28.2801 10.6435 28.2801 9.31761C28.2801 7.99174 29.3508 6.92103 30.6766 6.92103C32.0025 6.92103 33.0732 7.99174 33.0732 9.31761C33.0736 9.63244 33.0119 9.94426 32.8916 10.2352C32.7713 10.5262 32.5948 10.7905 32.3722 11.0131C32.1495 11.2357 31.8852 11.4123 31.5942 11.5326C31.3033 11.6529 30.9915 11.7146 30.6766 11.7142V11.7142Z"
                    fill="white" />
                </svg>
              </a>
            </li>
          </ul>

          <a href="" class="btn tel"><svg width="20" height="19" viewBox="0 0 15 14" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M9.33769 9.94971L10.5437 8.74368C10.7062 8.58326 10.9117 8.47345 11.1353 8.42757C11.359 8.3817 11.5911 8.40174 11.8036 8.48525L13.2734 9.07211C13.4881 9.15927 13.6722 9.30803 13.8026 9.49966C13.9329 9.69128 14.0035 9.91719 14.0056 10.1489V12.8409C14.0044 12.9986 13.9713 13.1543 13.9082 13.2988C13.8452 13.4433 13.7536 13.5735 13.6389 13.6817C13.5242 13.7898 13.3888 13.8737 13.2409 13.9281C13.0929 13.9825 12.9355 14.0065 12.7781 13.9985C2.47844 13.3578 0.400204 4.63567 0.00717016 1.29757C-0.0110747 1.13365 0.00559514 0.967719 0.0560831 0.8107C0.106571 0.653681 0.189733 0.509132 0.300097 0.386561C0.410462 0.26399 0.545529 0.166176 0.696411 0.0995532C0.847293 0.0329307 1.01057 -0.000990209 1.1755 2.2004e-05H3.77599C4.00805 0.000708891 4.23459 0.0708044 4.42649 0.201293C4.61838 0.331781 4.76685 0.516695 4.8528 0.73225L5.43965 2.20209C5.52594 2.41372 5.54795 2.64608 5.50294 2.87015C5.45794 3.09421 5.34791 3.30005 5.18661 3.46195L3.98058 4.66797C3.98058 4.66797 4.67512 9.36823 9.33769 9.94971Z"
                fill="white" />
            </svg>
            (21) 98252-0443</a>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="copy">

      <div class="container links_fim">
        <h2 class="links_uteis">Links Úteis</h2>
        <div class="links_footer">
          <div class="link_bairros">
            <h3>Bairros</h3>
            <ul>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'Bairros',
                  'hide_empty' => false,
                ) );
                foreach ( $terms as $term ) {
                  echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                }
              ?>
            </ul>
          </div>

          <div class="link_tipologias">
            <h3>Tipos de Imóveis</h3>
            <ul>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'Tipologias',
                  'hide_empty' => false,
                ) );
                foreach ( $terms as $term ) {
                  echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                }
              ?>
            </ul>
          </div>

          <div class="link_tipologias">
            <h3>Apartamentos</h3>
            <ul>
              <?php
                $args = array(
                    'post_type' => 'imoveis',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'Tipologias',
                            'field' => 'slug',
                            'terms' => 'apartamento',
                            'include_children' => false, // excluir as coberturas
                        ),
                    ),
                );
                $imoveis = new WP_Query( $args );
                if ( $imoveis->have_posts() ) {
                    while ( $imoveis->have_posts() ) {
                        $imoveis->the_post();
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    wp_reset_postdata();
                }
                ?>
            </ul>
          </div>

          <div class="link_tipologias">
            <h3>Coberturas</h3>
            <ul>
              <?php
                $args = array(
                    'post_type' => 'imoveis',
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'Tipologias',
                        'field' => 'slug',
                        'terms' => 'apartamento',
                      ),
                      array(
                        'taxonomy' => 'Tipologias',
                        'field' => 'slug',
                        'terms' => 'cobertura',
                      ),
                    ),
                  );
                  $imoveis = new WP_Query( $args );
                  if ( $imoveis->have_posts() ) {
                    while ( $imoveis->have_posts() ) {
                      $imoveis->the_post();
                      echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    wp_reset_postdata();
                  }
              ?>
            </ul>
          </div>

        </div>
      </div>

      <div style="display: flex; justify-content: center">
        <?php the_custom_logo(); ?>
      </div>

      <span>
        <a href="termos">Termos de Uso</a>
        <a href="privacidade">Política de Privacidade</a>
      </span>
    </div>
  </footer>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA9XLgl24D55-AqGouDD9uDSy-pypsDH_k">
  </script>

  <script>
var swiper = new Swiper(".lancamentosSemana", {
  spaceBetween: 30,
  slidesPerView: 3,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    1140: {
      slidesPerView: 3,

    },
    700: {
      slidesPerView: 2,
    },
    400: {
      slidesPerView: 1.5,
    },
    200: {
      slidesPerView: 1,
    },
  },
});

var swiper = new Swiper(".resultados", {
  slidesPerView: 3,
  spaceBetween: 30,
  breakpoints: {
    1140: {
      slidesPerView: 3,
    },
    700: {
      slidesPerView: 2,
    },
    400: {
      slidesPerView: 1.5,
    },
    200: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
  </script>
  <?php wp_footer(); ?>
  </body>

  </html>