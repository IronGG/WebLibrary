<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Header
 */  
?>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="index.php?controller=home&action=index"><img src="resources/images/MiChatMiManchot.jpg"
                class="rounded-circle" width="50" height="50" alt="Logo"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php if($_GET['controller'] == 'home' && $_GET['action'] == 'index') echo 'active';?>">
                <a class="nav-link" href="index.php?controller=home&action=index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_GET['controller'] == 'catalog' && $_GET['action'] == 'index') echo 'active';?>" href="index.php?controller=catalog&action=index">Catalogue</a>
            </li>
            <li class="nav-item <?php if($_GET['controller'] == 'home' && $_GET['action'] == 'Apropos') echo 'active';?>">
                <a class="nav-link" href="index.php?controller=home&action=Apropos">A propos</a>
            </li> <!--
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=home&action=newBook">Ajouter un livre</a>
            </li> -->
            <li class="nav-item">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-delay=10000 title="Vous devez être connectés pour pouvoir ajouter un livre.">
                    <a class="nav-link <?php if(!isset($_SESSION['username']))echo'disabled'; if($_GET['controller'] == 'home' && $_GET['action'] == 'newBook') echo 'active';?>" href="index.php?controller=home&action=newBook" tabindex="-1" aria-disabled="true">Ajouter un livre</a>
                </span>
            </li>
        </ul>
        <?php
        if(isset($_SESSION['username'])){
            echo 
            '<div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Bonjour ' 
              .  $_SESSION['username'] . 
              '</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?controller=home&action=profil&user=IronG">Mon Profil</a>
                <a class="dropdown-item" href="#">Paramètres</a>
                <a class="dropdown-item" href="#">Autre</a>
                <div class="dropdown-divider"></div>
                <form action="#" method="post">
                  <input class="dropdown-item" type="submit" name="disconnect" value="Déconnexion">
                </form> 
              </div>
            </div>';
        }   
        else{
            echo '<a class="btn btn-outline-success my-2 mr-5 my-sm-0 px-4" href="index.php?controller=login&action=index"> Login </a>';
        }
        ?>
        <form class="form-inline my-2 my-lg-0"> 
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>