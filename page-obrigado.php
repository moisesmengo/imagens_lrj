<?php 
/* 
Template name: obrigado
*/
get_header();
?>
<!-- hero -->

<main class="obgmain">
  <div class="container">
    <img
      src="<?php echo get_template_directory_uri(); ?>/assets/img/obg.webp"
      alt="Obrigado"
      class="img"
    />

    <div>
      <h1>
        Obrigado! <br />
        Cadastro feito com sucesso!
      </h1>

      <h2>
        Aguarde <span id="countdown">5 </span> segundos e você será direcionado
        para o nosso whatsapp
      </h2>

      <div class="loading"></div>
    </div>
  </div>
</main>

<script>
  // define o número inicial
  var count = 5000;

  // define o elemento span
  var countdownElement = document.getElementById("countdown");

  // define a função para atualizar o contador
  function updateCountdown() {
    count--;
    countdownElement.innerText = count;

    // verifica se chegou a zero
    if (count === 0) {
      clearInterval(intervalId);
      // redireciona para o WhatsApp
      window.location.href = "https://api.whatsapp.com/send?phone=552130839806";
    }
  }

  // define o intervalo de tempo (em milissegundos)
  var interval = 1000;

  // inicia o intervalo
  var intervalId = setInterval(updateCountdown, interval);
</script>

<?php get_footer(); ?>
