<meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <!--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">-->

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link href="resources/bootstrap/star-rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="resources/bootstrap/star-rating/js/star-rating.js" type="text/javascript"></script>

<div class="container-xl px-5">
    <h1 class="text-left mt-5 mb-5"><?php echo $book[0]['booTitle']?></h1>
    <div class="row row-cols-1 row-cols-md-5">
    </div>
      <div class="row">
        <div class="col-3 form-group">
        <img src="resources/images/<?php echo $book[0]['booCover']?>" class="card-img-top" alt="...">
        </div>
        <div class="col-9">
            <p>Auteur du livre : <?php echo $book[0]['booAuthor']?></p>
            <p>Editeur du livre : <?php echo $book[0]['booEditor']?></p>
            <p>Nombre de chapitres paru : <?php echo $book[0]['booChapter']?></p>
            <p>Année de sortie du premier chaptire : <?php echo $book[0]['booYear']?></p>
            <p>Catégorie : <?php echo $book[0]['catName']?></p>
            <p>Livre ajouté par : <?php echo $book[0]['usePseudo']?></p>
            <p><a href="resources/images/<?php echo $book[0]['booCover']?>" download="extrait">Télécharger un extrait</a></p>
            <p>Note moyenne du livre</p>
            <p>Evaluez ici</p>

            <input id="input-2ba" type="text" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars="5" data-filledStar="1"
                  data-symbol="&#xe005;" data-default-caption="{rating} hearts" data-star-captions="{}" title="">
            <hr>

        </div>
      </div>
      <div class="row form-group px-4">
        <p>Résumé : <br><?php echo $book[0]['booAbstract']?></p>
      </div>
</div>