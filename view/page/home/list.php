<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Affichage des livres de la page d'accueil
 */
echo '<div class="container-xl">';
    echo '<div class="row row-cols-1 row-cols-md-5">';
    
// Affichage des 5 livres
        foreach($books as $book)
        {   
    ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="resources/images/<?php echo $book['booCover'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="index.php?controller=catalog&action=detailBook&idBook=<?php echo htmlspecialchars($book['idBook']) ?>">
                    <h6 class="card-title text-center"><?php echo $book['booTitle'] ?> </h6>
                    </a>
                    <p class="card-text"><small><?php echo "Auteur : " . $book['booAuthor'] . "<br>Catégorie : " . $book['catName'] . "<br>Ajouté par : " . '<a href="index.php?controller=home&action=profil&user=' . $book['usePseudo'] .'">' . $book['usePseudo'] . '</a>'; ?></small></p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    
    </div>
</div>