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
    <h1 class="text-left mt-5 mb-5"><?php echo $book[0]['booTitle']?></h1>
    <div class="row row-cols-1 row-cols-md-5">
    </div>
      <div class="row">
        <div class="col-3 form-group">
        <img src="resources/images/<?php echo $book[0]['booCover']?>" class="card-img-top" alt="...">
        </div>
        <div class="col-9">
          <div class="container">
              <p>Auteur du livre : <?php echo $book[0]['booAuthor']?></p>
              <p>Editeur du livre : <?php echo $book[0]['booEditor']?></p>
              <p>Nombre de chapitres paru : <?php echo $book[0]['booChapter']?></p>
              <p>Année de sortie du premier chapitre : <?php echo $book[0]['booYear']?></p>
            
              <div class="row">
                <div class="col-sm">
                  <p>Catégorie : <?php echo $book[0]['catName']?></p>
                  <p>Livre ajouté par : <?php echo '<a href="index.php?controller=home&action=profil&user=' . $book[0]['usePseudo'] .'">' . $book[0]['usePseudo'] . '</a>'; ?></p>
                  <!-- Téléchargement d'un extrait -->
                  <p><a href="resources/PDF/<?php echo $book[0]['booExtract']?>" download="extrait">Télécharger un extrait</a></p>
                </div>
                <div class="col-sm text-center">
                  <h5> Nombre d'évaluations : <?php echo $nbOfVotes; ?> </h5>
                  <h1 class="mt-3"> Moyenne</h1>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h4>Evaluez ici </h4>
                  <h6>(de 1 à 5)</h6>
                  <p> 
                    <form action="index.php?controller=catalog&action=detailBook&idBook=<?php echo $_GET['idBook'] ?>" method="post">
                      <input id="input-2ba" type="text" name="eval" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars="5" value="<?php echo $userEval ?>"
                            data-symbol="&#xe005;" data-default-caption="{rating} hearts" data-star-captions="{}" title="">
                      <hr>
                      <button class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                  </p>
                </div>
                <div class="col-sm text-center">
                  <?php echo '<h1 style="border-bottom: 5px solid black;">' . $note . '</h1>'; ?>
                  <h1> 5</h1>
                </div>
              </div>
            </div>
<!--
            <form action="index.php?controller=catalog&action=detailBook&idBook=1" method="post">
            <input id="input-2ba" type="text" name="eval" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars="5" data-filledStar="1"
                  data-symbol="&#xe005;" data-default-caption="{rating} hearts" data-star-captions="{}" title="">
            <hr>
            <button class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            </form>-->

            <script>
            $(document).ready(function(){
                $('#input-2ba').rating({3});
            });
            </script>

        </div>
      </div>
      <div class="row form-group px-4">
        <p>Résumé : <br><?php echo $book[0]['booAbstract']?></p>
      </div>
</div>