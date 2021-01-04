<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : vérification des donnée entrée pour l'inscription
 */  

if(array_key_exists('password', $_POST)){
    if(password_verify($_POST['password'], $compte[0]['usePassword'])){
        if($_POST['password'] && $_POST['username']){
            //echo '<h1 class="mt-3 text-center text-success" >VOUS VOUS ETES CONNECTES</h1>';
            $_SESSION['newLogin'] = true;
            $_SESSION['username'] = $compte[0]['usePseudo'];
            $_SESSION['connected'] = true;

            header("Location: index.php?controller=home&action=index");
        }
        else{

            $_SESSION['loginError'] = true;

            header("Location: index.php?controller=login&action=index");
        }
    }
    else{
        $_SESSION['loginError'] = true;

        header("Location: index.php?controller=login&action=index");
    }
}
else{
    if(array_key_exists('username', $_POST)){
        header("Location: index.php?controller=login&action=index");
    }
    else{
        header("Location: index.php?controller=home&action=index");
    }
}
?>