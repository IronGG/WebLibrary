<!--
  ETML
  Auteur : Laetitia Guidetti et Adrian Barreira
  Date: Septembre à Décembre 2020
  Description : Page du profil d'un utilisateur -->
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 mt-3">
                <div class="media profile-head">
                    <div class="profile mr-3"><img src="resources/images/catChibi.jpg" alt="Image de profil" width="130" height="130" class="rounded mb-2 img-thumbnail"></div>
                    <div class="media-body mb-5">
                        <h4><?php echo $userData["usePseudo"] ?></h4>
                        <p>Inscrit depuis le : <?php $date = explode("-",$userData["useDate"]); echo $date[2] . "." . $date[1] . "." . $date[0];?> <br>
                        Nombre de votes : <?php echo $nbOfVotes; ?> <br>
                        Nombre de livres ajoutés : <?php echo $userData["nbBook"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="py-4 px-4">
            <?php if ($books != NULL)
            { ?>
            <h5 class="mb-5">Derniers livres ajouté par <?php echo $userData["usePseudo"] ?> :</h5>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    foreach ($books as $book) {
                    ?>
                        <div class="col mb-4">
                            <div class="card h-100">
                                <img src="resources/images/<?php echo $book['booCover'] ?>" class="card-img-top" alt="Couverture du manga">
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
                <?php
            }
            else
                {
                    echo'<div class=" text-center mb-5">';
                    echo'<h5>Cette utilisateur n\'a jamais posté de livre</h5>';
                    echo'<img class="mt-3" src="resources/images/cryCat.jpg" alt="Chat triste"> </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>