<?php session_start(); // Démarrer le système de session ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../ressources/stylesheet.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <title>Pikou, la librairie en ligne</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="home.html"><img src="../ressources/images/MiChatMiManchot.jpg"
                    class="rounded-circle" width="50" height="50" alt="Logo"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalogue.html">Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form action="login.php" class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 mr-5 my-sm-0 px-4" type="submit">Login</button>
            </form>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


        <div class="container-xl">
            <h1 class="text-left mt-5 mb-5">Catalogue</h1>
            <div class="row row-cols-1 row-cols-md-5">
            <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                }
                $lstCat = $bdd->query("SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie");
                while ($donnees = $lstCat->fetch())
                {

            ?>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/<?php echo $donnees['livCouverture']?>.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title text-center"><?php echo $donnees['livTitre']?> </h6>
                            <p class="card-text"><small><?php echo "Auteur : " . $donnees['livAuteur'] ."<br>Catégorie : " .$donnees['catName'] ."<br>Ajouté par : " . $donnees['utiPseudo']?></small></p>
                        </div>
                    </div>
                </div>
            <?php
                }
                $lstCat->closeCursor()

            ?>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">God of highschool</h5>
                            <p class="card-text mt-3">Auteur<br> Categorie</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/Lataque.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                            <p class="card-text mt-3">Auteur<br>Categorie</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                            <p class="card-text mt-3">Auteur<br>Categorie</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="../ressources/images/NoGameNoLife.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer mt-5">
            <div class="container-fluid bg-dark py-5">
                <span class="text-light">Place sticky footer content here.</span>
            </div>
        </footer>

</body>

</html>