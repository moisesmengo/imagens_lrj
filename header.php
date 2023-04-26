<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ) ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lançamentos RJ</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" />
  <?php wp_head(); ?>

  <style>
  .single-imoveis header .container {
    justify-content: center;
  }

  .single-imoveis .hero * {
    color: #fff;
  }

  .single-imoveis .hero {
    height: 70vh;
    text-align: center;
    position: relative;
  }

  .single-imoveis h1 {
    font-size: 42px;
    font-style: italic;
    border-bottom: 2px solid #fff;
    font-weight: 300;
    margin-bottom: 20px;
    letter-spacing: 2px;
  }

  .single-imoveis h2 {
    font-size: 18px;
    font-weight: normal !important;
    margin-bottom: 20px;
  }

  .single-imoveis .hero p {
    font-weight: 400 !important;
    text-transform: none;
    font-size: 24px;
    line-height: 1.4;
    margin-bottom: 20px;
    font-style: italic;
    text-transform: none;
  }

  .single-imoveis .btn {
    height: 50px;
    color: #121212;
  }

  @media (max-width: 1500px) {
    .single-imoveis .hero {
      height: 70vh;
    }
  }

  @media (max-width: 600px) {
    .single-imoveis .hero p {
      font-size: 18px;
    }
  }
  </style>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- header -->
  <header>
    <div class="container">
      <?php the_custom_logo(); ?>

      <?php if(! is_single()): ?>
      <nav>
        <button data-menu="button" aria-expanded="false" aria-controls="menu">
          Menu
        </button>

        <?php wp_nav_menu( array(
          'theme_location' =>
          'wp_lrj_principal', 'depth' => 5, )); ?>
      </nav>
      <?php endif; ?>
    </div>
  </header>
</body>

</html>