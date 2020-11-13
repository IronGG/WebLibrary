<?php
/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Recueil des méthodes permettant de charger les données pour les clients
 */

include_once 'Entity.php';

class RegisterRepository implements Entity {

    private $bdd;

    public function __construct()
    {
        // SQL stuff
        try
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
    
    /**
     * Récupérer tous les clients
     *
     * @return array
     */
    public function findAll() {

        try
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        $lstCat = $this->bdd->query("SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie");

        return $lstCat;

    }

    public function insertIntoDB() {

        $insertUser = "INSERT INTO t_utilisateur (utiPseudo, utiPassword) VALUES ('" . $_SESSION['username'] . "' , '" . $_SESSION['password'] . "' )";

        if ($this->bdd->query($insertUser) == TRUE) {
            echo "New record created successfully";
        } 
        else {  
            echo "Error: " . $insertUser . "<br>";
        }
    }

    public function login($username) {

        $userList = $this->bdd->query("SELECT * FROM t_utilisateur WHERE utiPseudo = '$username'");

        return $userList;
    }

    public function register($username, $password) {

        $userList = $this->bdd->query("SELECT * FROM t_utilisateur WHERE utiPseudo = '$username'");

        return $userList;
    }


}