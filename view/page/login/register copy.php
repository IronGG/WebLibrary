<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : 
 */  
    
    if(array_key_exists('username', $_POST)) {
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

    $_SESSION['account'] = array('username' => $_SESSION['username'], 'email' => $_SESSION['email'],  'password' => $_SESSION['password']);

    var_dump($_SESSION['account']);

    var_dump($_POST);
    
    echo '<h1>' . $_SESSION['username'] . '</h1>';
    echo '<h1>' . $_SESSION['email'] . '</h1>';
    echo '<h1>' . $_SESSION['password'] . '</h1>';


    echo "<h3>tout est dans la bd</h3>";
    ?>