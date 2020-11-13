<?php

if($_POST['password'] == $compte[0]['utiPassword']){
    echo "<h1>VOUS VOUS ETES CONNECTES</h1>";
}
else{
    echo "<h1>ACCES REFUSE</h1>";
}

//var_dump($compte);

//echo "<h1>votre mot de passe est : " . $compte[0]['utiPassword'] . "</h1>";
//var_dump($resultat);

//echo $comptes[5]['utiPseudo'];
?>