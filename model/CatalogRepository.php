<?php
/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Recueil des méthodes permettant de charger les données pour les clients
 */

include_once 'Entity.php';

class CatalogRepository implements Entity {

    /**
     * Récupérer tous les clients
     *
     * @return array
     */
    public function findAll() {

        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        $lstCat = $bdd->query("SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie");

        return $lstCat;

    }

    /**
     * Find One entry
     *
     * @param $idProduct
     *
     * @return array
     */
    public function findOne($idCustomer) {

        include './data/customers.php';
        
        $customerCurrent = array();

        // Boucler sur tous les clients et sélectionner seulement celui que l'on veut afficher
        foreach($customers as $customer) {

            if($customer['idContact'] == $idCustomer){
                $customerCurrent = $customer;
            }
        }

        return $customerCurrent;
    }

    public function findBestHome() {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 5; // nombre de choses a afficher 

        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        $lstCat = $bdd->query("SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie LIMIT $maVar1, $maVar2i");

        return $lstCat;

    }


}