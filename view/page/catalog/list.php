<div class="container-xl">
    <h1 class="text-left mt-5 mb-3">Catalogue</h1>
    <p>
        <button class="btn btn-primary btn-light border" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Filtrer</button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body mb-3">
            <form method="post" name="formStage" action="index.php?controller=catalog&action=index">
                <div class="row">
                    <?php
                    foreach ($lstCategories as $category) {
                        echo '<div class="col-4 text-center">';
                        echo '<p class="lead"><input type="checkbox" name="catChoose[]" value=' . $category["idCategory"] . '> ' . $category["catName"] . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <p class="text-center mt-3">
                    <input type="submit" name="btnSubmit" class="btn btn-outline-primary" value="Rechercher" />
                </p>
            </form>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-5">
        <?php
        foreach ($books as $book) {
        ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="resources/images/<?php echo $book['booCover'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="index.php?controller=catalog&action=detailBook&idBook='<?php echo htmlspecialchars($book['idBook']) ?>'">
                        <h6 class="card-title text-center"><?php echo $book['booTitle'] ?> </h6>
                        </a>
                        <p class="card-text"><small><?php echo "Auteur : " . $book['booAuthor'] . "<br>Catégorie : " . $book['catName'] . "<br>Ajouté par : " . $book['usePseudo'] ?></small></p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    echo "</div>";
    if(!isset($_POST["catChoose"]))
    {
        echo '<div class="d-flex justify-content-center"><nav>';
        echo '<ul class="pagination">';
        if($_GET["numberPage"] > 1)
        {
            echo '<li class="page-item"><a class="page-link" href="index.php?controller=catalog&action=index&numberPage='. ($_GET["numberPage"] -1) .'">Précédent</a></li>';
        }
        echo '<li class="page-item"><a class="page-link" href="">'.$_GET["numberPage"]. '</a></li>';
        if($_GET["numberPage"] < $nbBook/15)
        {
            echo '<li class="page-item"><a class="page-link" href="index.php?controller=catalog&action=index&numberPage='. ($_GET["numberPage"] + 1) .'">Suivant</a></li>';
        }
        echo '</ul>';
    echo '</nav></div>';
    }
?>
</div>