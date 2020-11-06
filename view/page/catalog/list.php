<div class="container-xl">
    <h1 class="text-left mt-5 mb-5">Catalogue</h1>
    <div class="row row-cols-1 row-cols-md-5">
    <?php

        //while ($book = $books->fetch())
        foreach($books as $book)
        {
        
    ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/<?php echo $book['livCouverture']?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title text-center"><?php echo $book['livTitre']?> </h6>
                    <p class="card-text"><small><?php echo "Auteur : " . $book['livAuteur'] ."<br>Catégorie : " .$book['catName'] ."<br>Ajouté par : " . $book['utiPseudo']?></small></p>
                </div>
            </div>
        </div>
    <?php
        }
        $books->closeCursor()
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