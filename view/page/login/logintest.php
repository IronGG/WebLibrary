<?php

if(array_key_exists('password', $_POST)){
    if($_POST['password'] == $compte[0]['utiPassword']){
        if($_POST['password'] && $_POST['username']){
            echo '<h1 class="mt-3 text-center text-success" >VOUS VOUS ETES CONNECTES</h1>';
            $_SESSION['username'] = $compte[0]['utiPseudo'];
        }
        else{

            $_SESSION['loginError'] = true;

            header("Location: index.php?controller=login&action=index");
        }
    
        /*
        echo $compte[0]['utiPseudo'];
    
        $_SESSION['username'] = $compte[0]['utiPseudo'];
        var_dump($_SESSION);
        echo $_SESSION['username'];
    
        */
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

//var_dump($compte);

//echo "<h1>votre mot de passe est : " . $compte[0]['utiPassword'] . "</h1>";
//var_dump($resultat);

//echo $comptes[5]['utiPseudo'];
?>