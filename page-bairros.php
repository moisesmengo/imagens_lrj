<?php 
/* 
Template name: bairros
*/
get_header();

?>

<!-- hero -->
<main class="hero_zonas" style=" background: linear-gradient(
    180deg,
    #181616 -6.86%,
    rgba(217, 217, 217, 0) 127.99%
  ),
  url(<?=the_field('banner_hero_bairro')?>) no-repeat;">
  <div class="container">
    <h1><?php  the_title() ?></h1>
  </div>
</main>

<section class="bloco-tax">
  <div class="container">
    <?php the_content( ) ?>
  </div>
</section>

<?php 
$taxonomias = get_taxonomies(array('object_type' => 'imoveis'));

foreach ($taxonomias as $taxonomia) {
    echo $taxonomia . '<br>';
}
?>
<section class="lancamentos_da_semana pd">
  <div class="container">
    <div class="center">
      <h2 class="titulo">Bairros disponíveis</h2>
    </div>
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'Bairros',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    $term_id = get_queried_object_id();

    if (!empty($terms) && !is_wp_error($terms)): ?>
    <ul class="bairros_todos">
      <?php foreach ($terms as $term) :
            $image = get_term_meta($term->term_id, 'bairros_image', true);
            $count = $term->count; ?>
      <li>
        <a href="<?= get_term_link($term) ?>">
          <h3><?= $term->name ?></h3>
          <?php if ($image) : ?>
          <img src="<?= $image ?>" alt="Bairro <?= $term->name ?>">
          <?php endif; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
    <button class="ver-mais">Ver mais</button>

    <script>
    const initialItems = 9;
    const increment = 3;
    let currentItem = initialItems;
    const totalItems = document.querySelectorAll('.bairros_todos li').length;

    function updateItemsVisibility() {
      document.querySelectorAll('.bairros_todos li').forEach((item, index) => {
        item.style.display = (index < currentItem) ? 'block' : 'none';
      });

      if (currentItem >= totalItems) {
        document.querySelector('.ver-mais').style.display = 'none';
      }
    }

    function handleVerMais() {
      if (currentItem < totalItems) {
        currentItem += increment;
        updateItemsVisibility();
      }
    }

    document.querySelector('.ver-mais').addEventListener('click', handleVerMais);
    updateItemsVisibility();
    </script>
    <?php endif; ?>


  </div>
</section>

<?php get_footer(); ?>