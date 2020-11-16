<?php

if($_POST['password'] == $compte[0]['utiPassword']){
    echo "<h1>VOUS VOUS ETES CONNECTES</h1>";
    echo $compte[0]['utiPseudo'];

    $_SESSION['username'] = $compte[0]['utiPseudo'];
    var_dump($_SESSION);
    echo $_SESSION['username'];
}
else{
    echo "<h1>ACCES REFUSE</h1>";
}

//var_dump($compte);

//echo "<h1>votre mot de passe est : " . $compte[0]['utiPassword'] . "</h1>";
//var_dump($resultat);

//echo $comptes[5]['utiPseudo'];
?>