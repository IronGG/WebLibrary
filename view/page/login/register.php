<?php

if(isset($_SESSION['username'])){
    header("Location: index.php?controller=home&action=index");
}
else{
echo "<h1>ERROR</h1>";
header("Location: index.php?controller=login&action=index");
$_SESSION['registerError'] = true;
}

?>