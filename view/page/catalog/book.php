
<div class="container-xl px-5">
    <h1 class="text-left mt-5 mb-5"><?php echo $book[0]['livTitre']?></h1>
    <div class="row row-cols-1 row-cols-md-5">
    </div>
      <div class="row">
        <div class="col-3 form-group">
        <img src="resources/images/<?php echo $book[0]['livCouverture']?>" class="card-img-top" alt="...">
        </div>
        <div class="col-9">
            <p>Auteur du livre : <?php echo $book[0]['livAuteur']?></p>
            <p>Editeur du livre : <?php echo $book[0]['livEditeur']?></p>
            <p>Nombre de chapitres paru : <?php echo $book[0]['livChapitre']?></p>
            <p>Année de sortie du premier chaptire : <?php echo $book[0]['livAnnee']?></p>
            <p>Catégorie : <?php echo $book[0]['catName']?></p>
            <p>Livre ajouté par : <?php echo $book[0]['utiPseudo']?></p>
            <a href="resources/images/<?php echo $book[0]['livCouverture']?>" download="extrait">Télécharger un extrait</a>

        </div>
      </div>
      <div class="row form-group px-4">
        <p>Résumé : <br><?php echo $book[0]['livResume']?></p>
      </div>
</div>