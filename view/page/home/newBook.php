<!--
  ETML
  Auteur : Laetitia Guidetti et Adrian Barreira
  Date: Septembre à Décembre 2020
  Description : Page d'ajout d'un nouveau livre-->

<form method="post" name="addBook" action="index.php?controller=home&action=newBook" enctype="multipart/form-data">

  <div class="container-xl px-5">
    <?php
    $_SESSION["Error"] = Null;
    if (isset($_POST["btnSubmit"])) {
      $verifData->VerifData();
    }
    if (count($_SESSION["Error"]) > 0) {
      echo "<h3> Erreurs : </h3><ul>";
      foreach ($_SESSION["Error"] as $error) {
        echo "<li>" . $error . "</li>";
      }
      echo "</ul>";
    }
    ?>
    <h1 class="text-left mt-5 mb-5">Ajouter un livre</h1>
    <div class="row row-cols-1 row-cols-md-5">
    </div>
    <div class="row">
    <!-- Couverture du livre -->
      <div class="col-3 form-group">
        <label for="cover">Couverture du livre</label>
        <input type="file" class="form-control-file" id="cover" name="cover">
      </div>
      <div class="col-9">
        <div class="row">
        <!-- Nom du manga -->
          <div class="col form-group px-4">
            <label for="mangaName">Nom de manga</label>
            <input type="text" class="form-control" id="mangaName" name="mangaName" value="<?php echo isset($_POST['mangaName']) ? $_POST['mangaName'] : '' ?>" placeholder="Entrez le nom">
          </div>
        </div>
        <div class="row">
          <div class="col-6 form-group px-4">
          <!-- Nom de l'auteur -->
            <label for="auteurName">Nom de l'auteur</label>
            <input type="text" class="form-control" id="authorName" name="authorName" value="<?php echo isset($_POST['authorName']) ? $_POST['authorName'] : '' ?>" placeholder="Entrez le nom de l'auteur">
          </div>
          <div class="col-6 form-group px-4">
          <!-- Choix de la catégorie -->
            <label for="chooseCate">Catégorie</label>
            <select class="form-control" id="chooseCate" name="chooseCate">
              <?php
              foreach ($lstCategories as $category) {
                //Source du code : https://www.daniweb.com/programming/web-development/threads/470322/keep-selceted-value-of-select-after-post-with-dynamic-data
                echo "<option value=\"$category[idCategory]\"";
                if (isset($_POST['chooseCate']) && $_POST['chooseCate'] == $category['idCategory']) {
                  echo "selected='selected'";
                };
                echo ">$category[catName]</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6 form-group px-4">
          <!-- Nom de l'editeur -->
            <label for="editeurName">Nom de l'éditeur</label>
            <input type="text" class="form-control" id="editeurName" name="editeurName" value="<?php echo isset($_POST['editeurName']) ? $_POST['editeurName'] : '' ?>" placeholder="Entrez le nom de l'editeur">
          </div>
          <div class="col-3 form-group px-4">
          <!-- Date de sortie -->
            <label for="year">Date de sortie</label>
            <input type="number" class="form-control" id="year" name="year" min=1900 max=<?php echo date("Y"); ?> value="<?php echo isset($_POST['year']) ? $_POST['year'] : 1900 ?>">
          </div>
          <div class="col-3 form-group px-4">
          <!-- Nombre de chapitre -->
            <label for="chapter">NB chapitres</label>
            <input type="number" class="form-control" id="chapter" name="chapter" min=1 value="<?php echo isset($_POST['chapter']) ? $_POST['chapter'] : 1 ?>">
          </div>
        </div>
        <div class="row">
          <div class="col form-group px-4">
          <!-- Extrait du livre -->
            <label for="extrait">Extrait du livre</label>
            <input type="file" class="form-control-file" id="extrait" name="extrait">
          </div>
        </div>
      </div>
    </div>
    <div class="row form-group px-4">
    <!-- Résumé -->
      <label for="resume">Résumé</label>
      <textarea class="form-control" id="resume" name="resume" placeholder="Entrez un résumé clair"><?php echo isset($_POST['resume']) ? $_POST['resume'] : '' ?></textarea>
    </div>
    <p class="text-right form-group px-4">
      <button class="btn btn-primary" name="btnSubmit" type="submit">Ajouter</button>
    </p>
  </div>
</form>