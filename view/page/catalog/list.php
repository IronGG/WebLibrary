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
                        foreach($lstCategories as $category)
                        {
                            echo '<div class="col-4 text-center">';
                            echo '<p class="lead"><input type="checkbox" name="catChoose[]" value='. $category["idCategory"].'> ' . $category["catName"] . '</p>';
                            echo '</div>';
                        }
                    ?>
                    </div>
                <p class="text-center mt-3">
                    <input type="submit" name="btnSubmit" class="btn btn-outline-primary" value="Rechercher"/>
                </p>
            </form>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-5">
    <?php

        foreach($books as $book)
        {
        
    ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/<?php echo $book['booCover']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="index.php?controller=catalog&action=detailBook" class="text-decoration-none text-dark">
                        <h6 class="card-title text-center"><?php echo $book['booTitle']?> </h6>
                    </a>
                    <p class="card-text"><small><?php echo "Auteur : " . $book['booAuthor'] ."<br>Catégorie : " .$book['catName'] ."<br>Ajouté par : " . $book['usePseudo']?></small></p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>





        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">God of highschool</h5>
                    <p class="card-text mt-3">Auteur<br> Categorie</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/Lataque.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                    <p class="card-text mt-3">Auteur<br>Categorie</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                    <p class="card-text mt-3">Auteur<br>Categorie</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>