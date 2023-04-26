<form action="/bairros" class="busca" method="get">
  <div class="lupa">
    <input type="text" name="nome" id="nome" placeholder="Buscar Imóvel" />
  </div>

  <div class="lista">
    <select name="cat" id="cat_busca">
      <option value="">Lista</option>

      <?php
        $terms = get_terms( array(
          'taxonomy' => 'Bairros',
          'hide_empty' => false,
        ) );
          
        foreach($terms as $i) {
          ?>
      <option value="<?= $i->slug ?>"><?= $i->name  ?></option>
      <?php 
        }
      ?>

    </select>
  </div>

  <button type="submit" id="btn_buscar" class="btn_buscar">Buscar</button>
</form>

<script>
document.getElementById('btn_buscar').addEventListener('click', function(e) {
  e.preventDefault();
  var catBusca = document.getElementById('cat_busca').value;
  var nomeBusca = document.getElementById('nome').value;
  var bairroSelecionado = catBusca.trim().toLowerCase().replace(/ /g, '-').normalize('NFD').replace(
    /[\u0300-\u036f]/g, "");
  window.location.href = '/bairros/' + bairroSelecionado;
});
</script>