<?php 
  $call = get_field('call_model')
?>

<?php if($call == 'whatsapp') : ?>
<a class="btn" href="<?= the_field('whtas_imovel') ?>">
  <?= the_field('titulo_botao_hero') ?>
</a>
<?php endif ?>

<?php if($call == 'ancora') : ?>
<a class="btn" href="#contato">
  <?= the_field('titulo_botao_hero') ?>
</a>
<?php endif ?>

<?php if($call == 'modal') : ?>
<button class="btn" data-modal="abrir">
  <?= the_field('titulo_botao_hero') ?>
</button>
<?php endif ?>

<section class="modal-container" data-modal="container">
  <div class="modal">
    <button data-modal="fechar" class="fechar">X</button>
    <div>
      <?php if(get_field('tt_contato')) : ?>
      <h2 class="titulo"><?= the_field('tt_contato') ?></h2>
      <?php endif ?>

      <div style="display: none">
        <?php include(TEMPLATEPATH . "/inc/form-lp.php"); ?>
      </div>
      <?php include(TEMPLATEPATH . "/inc/form-lp.php"); ?>
    </div>
  </div>
</section>