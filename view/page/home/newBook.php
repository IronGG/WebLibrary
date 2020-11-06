
    <form method="post" name="addBook" action="index.php?controller=home&action=newBook" >
        <div class="container-xl px-5">
            <h1 class="text-left mt-5 mb-5">Ajouter un livre</h1>
            <div class="row row-cols-1 row-cols-md-5">
            </div>
              <div class="row">
                <div class="col-3 form-group">
                  <img src="../ressources/images/drStone.jpg" class="card-img" alt="...">
                </div>
                <div class="col-9">
                  <div class="row">
                    <div class="col form-group px-4">
                      <label for="mangaName">Nom de manga</label>
                      <input type="text" class="form-control" id="mangaName" name="mangaName" value ="<?php echo isset($_POST['mangaName']) ? $_POST['mangaName'] : '' ?>"placeholder="Entrez le nom">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 form-group px-4">
                      <label for="auteurName">Nom de l'auteur</label>
                      <input type="text" class="form-control" id="authorName" name="authorName" value ="<?php echo isset($_POST['authorName']) ? $_POST['authorName'] : '' ?>" placeholder="Entrez le nom de l'auteur">
                    </div>
                    <div class="col-6 form-group px-4">
                      <label for="chooseCate">Catégorie</label>
                      <select class="form-control" id="chooseCate" name="chooseCate">
                        <option value="1" <?php echo isset($_POST['chooseCate']) && $_POST['chooseCate'] === '1' ? 'chooseCate' : '' ?>>1</option>
                        <option value="2" <?php echo isset($_POST['chooseCate']) && $_POST['chooseCate'] === '2' ? 'chooseCate' : '' ?>>2</option>
                        <option value="3" <?php echo isset($_POST['chooseCate']) && $_POST['chooseCate'] === '3' ? 'chooseCate' : '' ?>>3</option>
                        <option value="4" <?php echo isset($_POST['chooseCate']) && $_POST['chooseCate'] === '4' ? 'chooseCate' : '' ?>>4</option>
                        <option value="5" <?php echo isset($_POST['chooseCate']) && $_POST['chooseCate'] === '5' ? 'chooseCate' : '' ?>>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 form-group px-4">
                      <label for="editeurName">Nom de l'éditeur</label>
                      <input type="text" class="form-control" id="editeurName" name="editeurName" value ="<?php echo isset($_POST['editeurName']) ? $_POST['editeurName'] : '' ?>" placeholder="Entrez le nom de l'editeur">
                    </div>
                    <div class="col-3 form-group px-4">
                      <label for="year">Date de sortie</label>
                      <input type="text" class="form-control" id="year" name="year" value ="<?php echo isset($_POST['year']) ? $_POST['year'] : '' ?>">
                    </div>
                    <div class="col-3 form-group px-4">
                      <label for="chapter">NB chapitres</label>
                      <input type="text" class="form-control" id="chapter" name="chapter" value ="<?php echo isset($_POST['chapter']) ? $_POST['chapter'] : '' ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group px-4">
                      <label for="extrait">Extrait du livre</label>
                      <input type="file" class="form-control-file" id="extrait">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row form-group px-4">
                <label for="resume">Résumé</label>
                <textarea  class="form-control" id="resume" name="resume" placeholder="Entrez un résumé clair"><?php echo isset($_POST['resume']) ? $_POST['resume'] : '' ?></textarea>
              </div>
              <p class="text-right form-group px-4">
              <button class="btn btn-primary" type="submit">Ajouter</button>
              </p>
        </div>
    </form>
