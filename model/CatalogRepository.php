<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Méthode pour afficher/changer les informations des livres
 */

class CatalogRepository{

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
    public function findAll($numberPage) {
        $numberPage = ($numberPage -1) * 15;

        $queryToUse = "SELECT * FROM t_book natural join t_user natural join t_category limit $numberPage, 15";
        $req = $this->querySimpleExecute($queryToUse);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }

    public function findBestHome() {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 5; // nombre de répétition à afficher
        $queryToUse = "SELECT * FROM t_book natural join t_user natural join t_category ORDER BY idBook DESC LIMIT $maVar1, $maVar2i";
        $req = $this->querySimpleExecute($queryToUse);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }
    public function findAllCat() {

        $queryToUse = "SELECT * FROM t_category";
        $req = $this->querySimpleExecute($queryToUse);
        $lstCat = $this->formatData($req);
        $req = $this->unsetData($req);

        return $lstCat;

    }
    public function findSpecialBook($specialCat) {

        $queryToUse = "SELECT * FROM t_book natural join t_user natural join t_category where ";
        $i = 0;
        foreach($specialCat as $oneCat)
        {
            if($i == 0)
            {
                $queryToUse = $queryToUse . "idCategory = ". $oneCat;
            }
            else
            {
                $queryToUse = $queryToUse . " or idCategory = ". $oneCat;
            }
            $i++;
        }
        $req = $this->querySimpleExecute($queryToUse);
        $lstCat = $this->formatData($req);
        $req = $this->unsetData($req);

        return $lstCat;
    }

    public function insertBook($booCover, $booTitle, $livChapter, $booExtract, $booAbstract, $booAuthor, $booEditor, $booYear, $idUser, $idCategory)
    {
        
        $queryToUse = "INSERT INTO t_book values (NULL,'$booCover' ,'$booTitle', '$livChapter', '$booExtract', '$booAbstract', '$booAuthor', '$booEditor','$booYear',(SELECT idUser FROM t_user where usePseudo = \"$idUser\"),'$idCategory')";
        $req = $this->queryPrepareExecute($queryToUse, 1);
        echo $queryToUse;
        $req = $this->unsetData($req);
    }

    public function findABook($idBook)
    {
        $queryToUse = "SELECT * FROM t_category  natural join t_book natural join t_user where idBook = $idBook";
        $req = $this->querySimpleExecute($queryToUse);
        $book = $this->formatData($req);
        $req = $this->unsetData($req);

        return $book;
    }

    public function numberPagePossible()
    {
        $queryToUse = "Select count(idbook) from t_book";
        $req = $this->querySimpleExecute($queryToUse);
        $nbBook = $this->formatData($req);
        $req = $this->unsetData($req);

        return $nbBook[0]["count(idbook)"];
    }

    public function SearchEval($idBook)
    {
        $queryToUse = "SELECT AVG(evaGrade) as eval FROM t_eval WHERE idBook = $idBook";
        $req = $this->querySimpleExecute($queryToUse);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]["evaGrade"];
    }
}