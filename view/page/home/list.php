<div class="container-xl">
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
    ?>
    
    </div>
</div>