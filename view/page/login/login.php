<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : vérification des donnée entrée pour l'inscription
 */  
    if(array_key_exists('username', $_POST)) {
        if(preg_match ('/.{1,50}/', $_POST['username']) == 1){  

            $_SESSION['username'] = $_POST['username'];

        }
    }

    if(array_key_exists('password', $_POST) && array_key_exists('confirm-password', $_POST)) {

        if(preg_match ('/.{8,50}/', $_POST['password']) == 1){
            if($_POST['password'] == $_POST['confirm-password']){

                $_SESSION['password'] = $_POST['password'];
    
            }
            elseif(array_key_exists('password', $_POST)) {
                echo ' Les deux mots de passes ne sont pas identiques ';
            }
        }
        else{
            echo 'mdp pas assez long';
        }
    }
    ?>