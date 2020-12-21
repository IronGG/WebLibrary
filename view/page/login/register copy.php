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

    if(array_key_exists('email', $_POST)) {
        if(preg_match ('/.{1,50}/', $_POST['email']) == 1){  

            $_SESSION['email'] = $_POST['email'];
            echo ' email enregistré ';

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



    /*if(isset($_POST['username'])){
        $_SESSION['username'] = $_POST['username'];
    }

    echo '<h1 class="text-center mt-5">' . $_SESSION['username'] . '</h1>'*/




    /*
        
    // SQL stuff
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $insertUser = "INSERT INTO t_user (usePseudo, usePassword) VALUES ('" . $_SESSION['username'] . "' , '" . $_SESSION['password'] . "' )";

    if ($bdd->query($insertUser) == TRUE) {
        echo "New record created successfully";
    } 
    else {  
        echo "Error: " . $insertUser . "<br>";
    }


*/

    //PAS SA
    //$insertUtil = $bdd->query($insertUser);


    echo "<h3>tout est dans la bd</h3>";
    ?>