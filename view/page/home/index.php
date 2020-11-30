<div>
    <h1 class="text-center mt-5">Hello, world!</h1>
    <h5 class="text-center">Bienvenue sur le site web *******.</h2>
        <p class="text-center mb-5">Ce site a été réalisé dans le cadre d'un projet de web dynamique pour le module ICT
            I***</p>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="toast" data-autohide="false">
    <div class="toast-header">
        <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <rect fill="#007aff" width="100%" height="100%" /></svg>
        <strong class="mr-auto">Connecté</strong>
        <small class="text-muted">11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
    Vous vous êtes connecté.
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".toast").toast('show');
    });
</script>