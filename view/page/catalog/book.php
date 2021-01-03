<!--
  ETML
  Auteur : Laetitia Guidetti et Adrian Barreira
  Date: Septembre à Décembre 2020
  Description : Page de détail d'un livre -->

<meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <!--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">-->

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link href="resources/bootstrap/star-rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="resources/bootstrap/star-rating/js/star-rating.js" type="text/javascript"></script>

<!-- Détail d'un livre -->
<div class="container-xl px-5">
    <h1 class="text-left mt-5 mb-3"><?php echo $book[0]['booTitle']?></h1>
      <div class="row">
        <div class="col-3 mb-3">
        <img src="resources/images/<?php echo $book[0]['booCover']?>" class="card-img-top" alt="...">
        </div>
        <div class="col-5">
          <p>Auteur du livre : <?php echo $book[0]['booAuthor']?></p>
          <p>Editeur du livre : <?php echo $book[0]['booEditor']?></p>
          <p>Nombre de chapitres paru : <?php echo $book[0]['booChapter']?></p>
          <p>Année de sortie du premier chapitre : <?php echo $book[0]['booYear']?></p>
          <p>Catégorie : <?php echo $book[0]['catName']?></p>
          <p>Livre ajouté par : <?php echo '<a href="index.php?controller=home&action=profil&user=' . $book[0]['usePseudo'] .'">' . $book[0]['usePseudo'] . '</a>'; ?></p>
          <!-- Téléchargement d'un extrait -->
          <p><a href="resources/PDF/<?php echo $book[0]['booExtract']?>" download="extrait">Télécharger un extrait</a></p>
        </div>
        <div class="col-4 ">
          <p>Nombre d'évaluations : <?php echo $nbOfVotes; ?> </p>
          <p>Moyenne : <?php echo $note; ?></p>
          <h5>Evaluez le livre :</h5>
          <form action="index.php?controller=catalog&action=detailBook&idBook=<?php echo $_GET['idBook'] ?>" method="post">
            <input id="input-2ba" type="text" name="eval" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars="5" value="<?php echo $userEval ?>"
                data-symbol="&#xe005;" data-default-caption="{rating} hearts" data-star-captions="{}" title="">
                <hr>
            <p class="text-center">
              <button class="btn btn-outline-primary">Votez !</button>
            </p>
          </form>
        </div>
        <script>
          $(document).ready(function(){
            $('#input-2ba').rating({3});
          });
        </script>
      </div>
      <div class="row px-3">
        <p>Résumé : <br><?php echo $book[0]['booAbstract']?></p>
      </div>
</div>