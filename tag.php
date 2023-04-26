<?php 
  $term = get_queried_object(); //obtém o objeto da taxonomia de bairro atual
  $term_id = get_queried_object_id();
  $image_id = get_term_meta( $term_id, 'tag_image_', true );
  $titulo = get_term_meta( $term_id, 'titulo_tag', true );
  $tituloDesc = get_term_meta( $term_id, 'titulo_tag_desc', true );
  $bloco_tax = get_term_meta( $term_id, 'tag_text_', true );

  $args = array(
    'post_type' => 'post',
    'tag' => $term->slug,
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
    <?php if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post(); ?>
    <li>
      <div class="area_image">
        <?php if ( has_post_thumbnail() ) : ?>
        <img src="<?php the_post_thumbnail_url( ); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </div>
      <div class="area_text_tag">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="resumo"><?php the_excerpt(); ?></p>
        <p class="tag_post"><?php the_tags( 'Tags: ', ', ' ); ?></p>
      </div>
    </li>
    <?php endwhile;
wp_reset_postdata();
else : ?>
    <p><?php _e( 'Nenhum post encontrado na tag' ); ?></p>
    <?php endif; ?>
  </ul>
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