<?php get_header(); ?>
<!-- hero -->
<main class="hero"
  style="background: url('<?php header_image(); ?>') no-repeat; background-size: cover; background-position: center">
  <div class="container">
    <h1>Blog</h1>
  </div>
</main>
<!-- blog -->

<section class="blog mt">
  <div class="container">
    <h2 class="titulo center">Últimas postagens</h2>
    <div class="postagens">
      <?php 
    $args = array(
      'posts_per_page' => 6 // Define o número máximo de posts por página
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) :
        $query->the_post();
  ?>
      <div class="postagem">
        <div class="img_postagem">
          <img src="
        <?php 
          if ( has_post_thumbnail() ) {
            the_post_thumbnail_url('large');
          } else {
            echo get_bloginfo( 'stylesheet_directory' ) . '/assets/img/thumbnail-default.jpg"';
          }
        ?>
      " class="img" alt="Postagem" />
        </div>
        <div class="cont_postagem">
          <h2 class="titulo_postagem"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="desc_postagem">
            <?php the_excerpt(); ?>
          </p>
        </div>
      </div>
      <?php 
    endwhile;
    wp_reset_postdata(); // Restaura a query original
  ?>
      <?php else: ?>
      <p>Nenhuma postagem encontrada</p>
      <?php endif; ?>
    </div>
    <div class="paginas" style="margin-bottom: 50px">
      <?php next_posts_link('Posts mais antigos', $query->max_num_pages); ?>
      <?php previous_posts_link('Posts mais recentes'); ?>
    </div>
  </div>
</section>


<!-- newsletter -->
<div class="newsletter">
  <div class="container">
    <p>
      Assine nossa newsletter e receba notícias e lançamentos antes de todo
      mundo
    </p>

    <form>
      <input type="email" name="email" placeholder="Seu E-mail" id="email" required />
      <button class="btn">Cadastrar</button>
    </form>
  </div>
</div>

<?php get_footer(); ?>