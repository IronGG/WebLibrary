<!--
  ETML
  Auteur : Laetitia Guidetti et Adrian Barreira
  Date: Septembre à Décembre 2020
  Description : Page d'acuueil du Site Web -->
<div>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-6">
        <h1 class="text-center mt-5">Hello, world!</h1>
        <h5 class="text-center">Bienvenue sur le site web Pikou !</h2>
    </div>
    <div class="col">
    <?php

if(array_key_exists('newLogin', $_SESSION))
{
    echo '
    <div class="toast" data-autohide="true" data-delay="2000">
        <div class="toast-header">
            <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect fill="#007aff" width="100%" height="100%" /></svg>
            <strong class="mr-auto">Connecté</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
        Vous vous êtes connecté.
        </div>
    </div>';   
    unset($_SESSION['newLogin']);
}
?>
    </div>
  </div>
</div>
    <p class="text-center mb-5">Ce site a été réalisé dans le cadre d'un projet de web dynamique, l'objectif est de mettre en pratique plusieurs modules.</p>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(".toast").toast('show');
    });
</script>