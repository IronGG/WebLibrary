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
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="home.php"><img src="../ressources/images/MiChatMiManchot.jpg"
                    class="rounded-circle" width="50" height="50" alt="Logo"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalogue.php">Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="APropos.php">A propos</a>
                </li>
                <li class="nav-item">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-delay=10000 title="Vous devez être connectés pour pouvoir ajouter un livre.">
                        <a class="nav-link disabled" href="newBook.php" tabindex="-1" aria-disabled="true">Ajouter un livre</a>
                    </span>
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

    <?php
    
    if(array_key_exists('username', $_POST)) {
        if(preg_match ('/.{1,50}/', $_POST['username']) == 1){  

            $_SESSION['username'] = $_POST['username'];
            echo ' username enregistré ';

        }
    }

    if(array_key_exists('email', $_POST)) {
        if(preg_match ('/.{1,50}/', $_POST['username']) == 1){  

            $_SESSION['username'] = $_POST['username'];
            echo ' username enregistré ';

        }
    }

    if(array_key_exists('password', $_POST) && array_key_exists('confirm-password', $_POST)) {

        if(preg_match ('/.{8,50}/', $_POST['password']) == 1){
            if($_POST['password'] == $_POST['confirm-password']){

                $_SESSION['password'] = $_POST['password'];
                echo ' MDP enregistré ';
    
            }
            elseif(array_key_exists('password', $_POST)) {
                echo ' Les deux mots de passes ne sont pas identiques ';
            }
        }
        else{
            echo 'mdp pas assez long';
        }
    }

    echo '<h1>' . $_SESSION['username'] . '</h1>';
    echo '<h1>' . $_SESSION['email'] . '</h1>';
    echo '<h1>' . $_SESSION['password'] . '</h1>';
    /*if(isset($_POST['username'])){
        $_SESSION['username'] = $_POST['username'];
    }

    echo '<h1 class="text-center mt-5">' . $_SESSION['username'] . '</h1>'*/

    // SQL stuff
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
        
    }
    ?>

        <footer class="footer mt-5">
            <div class="container-fluid bg-dark py-5">
                <span class="text-light">Place sticky footer content here.</span>
            </div>
        </footer>



</body>

</html>