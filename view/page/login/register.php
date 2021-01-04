<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description :
 */  

if(isset($_SESSION['username'])){
    header("Location: index.php?controller=home&action=index");
}
else{
echo "<h1>ERROR</h1>";
header("Location: index.php?controller=login&action=index");
$_SESSION['registerError'] = true;
}

        // Si la personne est connectée -> impossibilité de s'inscrire par dessus
        if(isset($_SESSION['username'])){
            header("Location: index.php?controller=home&action=index");
        }

?>