<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Méthode pour afficher/changer les informations des livres
 */

include_once "Repository.php";
class CatalogRepository extends Repository{

    /**
    * Constructeur de Database
    */
    public function __construct()
    {
        $this->connector = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');
    }



    /**
     * Retourne tout les livre d'une page (1 page = 15 livres)
     *
     * @param int $numberPage
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

    /**
     * Retourne les 5 dernières livres ajoutés pour la page d'accueil
     *
     * @return array
     */
    public function findBestHome() {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 5; // nombre de répétition à afficher
        $queryToUse = "SELECT * FROM t_book natural join t_user natural join t_category ORDER BY idBook DESC LIMIT $maVar1, $maVar2i";
        $req = $this->querySimpleExecute($queryToUse);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }

    /**
     * Retourne toute les catégories
     *
     * @return array
     */
    public function findAllCat() {

        $queryToUse = "SELECT * FROM t_category";
        $req = $this->querySimpleExecute($queryToUse);
        $lstCat = $this->formatData($req);
        $req = $this->unsetData($req);

        return $lstCat;

    }

    /**
     * Retourne des livres en fonction de la/les catégorie(s) chosies
     *
     * @param array $specialCat
     * @return array
     */
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

    /**
     * Insertion d'un livre
     *
     * @param string $booCover
     * @param string $booTitle
     * @param int $livChapter
     * @param string $booExtract
     * @param string $booAbstract
     * @param string $booAuthor
     * @param string $booEditor
     * @param int $booYear
     * @param int $idUser
     * @param int $idCategory
     * @return void
     */
    public function insertBook($booCover, $booTitle, $livChapter, $booExtract, $booAbstract, $booAuthor, $booEditor, $booYear, $idUser, $idCategory)
    {
        
        $queryToUse = "INSERT INTO t_book values (NULL,'$booCover' ,'$booTitle', '$livChapter', '$booExtract', '$booAbstract', '$booAuthor', '$booEditor','$booYear',(SELECT idUser FROM t_user where usePseudo = \"$idUser\"),'$idCategory')";
        $req = $this->queryPrepareExecute($queryToUse, 1);
        echo $queryToUse;
        $req = $this->unsetData($req);
    }

    /**
     * Retourne les informations d'un livre spécifique
     *
     * @param int $idBook
     * @return array
     */
    public function findABook($idBook)
    {
        $queryToUse = "SELECT * FROM t_category  natural join t_book natural join t_user where idBook = $idBook";
        $req = $this->querySimpleExecute($queryToUse);
        $book = $this->formatData($req);
        $req = $this->unsetData($req);

        return $book;
    }

    /**
     * Retourne le nombre de page possible
     *
     * @return int
     */
    public function numberPagePossible()
    {
        $queryToUse = "Select count(idbook) from t_book";
        $req = $this->querySimpleExecute($queryToUse);
        $nbBook = $this->formatData($req);
        $req = $this->unsetData($req);

        return $nbBook[0]["count(idbook)"];
    }

    /**
     * Retourne l'evalution d'un livre
     *
     * @param int $idBook
     * @return int
     */
    public function SearchEval($idBook)
    {
        $queryToUse = "SELECT AVG(evaGrade) as eval FROM t_eval WHERE idBook = $idBook";
        $req = $this->querySimpleExecute($queryToUse);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]["evaGrade"];
    }
}