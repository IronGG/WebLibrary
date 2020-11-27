<?php
/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Recueil des méthodes permettant de charger les données pour les clients
 */

include_once 'Entity.php';

class CatalogRepository implements Entity {

    // Variable de classe
    private $connector;

    /**
    * Constructeur de Database
    */
    public function __construct()
    {
        $this->connector = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
    }

    /**
    * Simple requête
    */
    private function querySimpleExecute($query)
    {
        $req = $this->connector->query($query);
        return $req;
    }

    /**
    * Préparer et executer une requête
    */
    private function queryPrepareExecute($query, $binds)
    {
        $req = $this->connector->prepare($query);
        $req->execute();
        return $req;
    }

    /**
    * Formater la requête dans un tableau
    */
    private function formatData($req)
    {

        $listOfItem = $req->fetchALL(PDO::FETCH_ASSOC);
        return $listOfItem;
    }

    /**
    * vide la requête
    */
    private function unsetData($req)
    {

        $req->closeCursor();
    }

    /**
     * Récupérer tous les clients
     *
     * @return array
     */
    public function findAll() {

        $queryToUse = "SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie";
        $req = $this->querySimpleExecute($queryToUse);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }

    public function findBestHome() {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 5; // nombre de répétition à afficher
        $queryToUse = "SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie LIMIT $maVar1, $maVar2i";
        $req = $this->querySimpleExecute($queryToUse);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }
    public function findAllCat() {

        $queryToUse = "SELECT * FROM t_categorie";
        $req = $this->querySimpleExecute($queryToUse);
        $lstCat = $this->formatData($req);
        $req = $this->unsetData($req);

        return $lstCat;

    }
    public function findSpecialBook($specialCat) {

        $queryToUse = "SELECT * FROM t_livre natural join t_utilisateur natural join t_categorie where ";
        $i = 0;
        foreach($specialCat as $oneCat)
        {
            if($i == 0)
            {
                $queryToUse = $queryToUse . "idCategorie = ". $oneCat;
            }
            else
            {
                $queryToUse = $queryToUse . " or idCategorie = ". $oneCat;
            }
            $i++;
        }
        $req = $this->querySimpleExecute($queryToUse);
        $lstCat = $this->formatData($req);
        $req = $this->unsetData($req);

        return $lstCat;
    }

    public function insertBook($livCouverture, $livTitre, $livChapter, $livExtrait, $livResume, $livAuteur, $livEditeur, $livAnnee, $idUtilisateur, $idCategorie)
    {
        
        $queryToUse = "INSERT INTO t_livre values (NULL,'$livCouverture' ,'$livTitre', '$livChapter', '$livExtrait', '$livResume', '$livAuteur', '$livEditeur','$livAnnee',(SELECT idUtilisateur FROM t_utilisateur where utiPseudo = \"$idUtilisateur\"),'$idCategorie')";
        $req = $this->queryPrepareExecute($queryToUse, 1);
        echo $queryToUse;
        $req = $this->unsetData($req);
    }

    public function findABook($idBook)
    {
        $queryToUse = "SELECT * FROM t_categorie  natural join t_livre natural join t_utilisateur where idLivre = $idBook";
        $req = $this->querySimpleExecute($queryToUse);
        $book = $this->formatData($req);
        $req = $this->unsetData($req);

        return $book;
    }
}