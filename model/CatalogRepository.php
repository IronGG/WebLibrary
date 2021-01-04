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
        include_once "config.php";
        $dbName = $GLOBALS['database']['dbName'];
        $user = $GLOBALS['database']['user'];
        $password = $GLOBALS['database']['password'];
        $host = $GLOBALS['database']['host'];
        $charset = $GLOBALS['database']['charset'];

        $this->connector = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset='. $charset, $user, $password);
    }



    /**
     * Retourne tout les livre d'une page (1 page = 15 livres)
     *
     * @param int $numberPage
     * @return array
     */
    public function findAll($numberPage) {
        $numberPage = ($numberPage -1) * 15;

        $queryToUse = "SELECT idBook, booCover, booAuthor, booTitle, catName, usePseudo FROM t_book natural join t_user natural join t_category limit $numberPage, 15";
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
    public function latestBooks() {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 5; // nombre de répétition à afficher
        $queryToUse = "SELECT idBook, booCover, booAuthor, booTitle, catName, usePseudo FROM t_book natural join t_user natural join t_category ORDER BY idBook DESC LIMIT $maVar1, $maVar2i";
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

        $queryToUse = "SELECT idCategory, catName FROM t_category";
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

        $queryToUse = "SELECT idBook, booCover, booAuthor, booTitle, catName, usePseudo FROM t_book natural join t_user natural join t_category where ";
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
        
        $queryToUse = "INSERT INTO t_book values (NULL, :booCover, :booTitle, :livChapter, :booExtract, :booAbstract, :booAuthor, :booEditor, :booYear,(SELECT idUser FROM t_user where usePseudo = :idUser), :idCategory)";
        $values = array(
            1=> array(
                'marker' => ':booCover',
                'var' => $booCover,
                'type' => PDO::PARAM_STR
            ),
            2=> array(
                'marker' => ':booTitle',
                'var' => $booTitle,
                'type' => PDO::PARAM_STR
            ),
            3=> array(
                'marker' => ':livChapter',
                'var' => $livChapter,
                'type' => PDO::PARAM_STR
            ),
            4=> array(
                'marker' => ':booExtract',
                'var' => $booExtract,
                'type' => PDO::PARAM_STR
            ),
            5=> array(
                'marker' => ':booAbstract',
                'var' => $booAbstract,
                'type' => PDO::PARAM_STR
            ),
            6=> array(
                'marker' => ':booAuthor',
                'var' => $booAuthor,
                'type' => PDO::PARAM_STR
            ),
            7=> array(
                'marker' => ':booEditor',
                'var' => $booEditor,
                'type' => PDO::PARAM_STR
            ),
            8=> array(
                'marker' => ':booYear',
                'var' => $booYear,
                'type' => PDO::PARAM_INT
            ),
            9=> array(
                'marker' => ':idUser',
                'var' => $idUser,
                'type' => PDO::PARAM_INT
            ),
            10=> array(
                'marker' => ':idCategory',
                'var' => $idCategory,
                'type' => PDO::PARAM_INT
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
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
        $queryToUse = "SELECT idBook, booCover, booAuthor, booTitle, catName, usePseudo, booEditor, booChapter, booYear, booExtract, booAbstract FROM t_category  natural join t_book natural join t_user WHERE idBook = :idBook limit 1";
        $values = array(
            1=> array(
                'marker' => ':idBook',
                'var' => $idBook,
                'type' => PDO::PARAM_INT
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
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
        $queryToUse = "SELECT AVG(evaGrade) as eval FROM t_evaluate WHERE idBook = :idBook";
        $values = array(
            1=> array(
                'marker' => ':idBook',
                'var' => $idBook,
                'type' => PDO::PARAM_INT
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]["eval"];
    }

    /**
     * Insère l'évaluation pour un livre
     *
     * @param int $idBook
     * @return int
     */
    public function InsertEval()
    {
        $registerRepository = new RegisterRepository();
        $accountId = $registerRepository->findUserId($_SESSION['username']);

        $queryToUse = "INSERT INTO t_evaluate VALUES (:idUser, :idBook, :evaGrade)";
        $values = array(
            1=> array(
                'marker' => ':idUser',
                'var' => $accountId,
                'type' => PDO::PARAM_INT
            ),
            2=> array(
                'marker' => ':idBook',
                'var' => $_GET['idBook'],
                'type' => PDO::PARAM_INT
            ),
            3=> array(
                'marker' => ':evaGrade',
                'var' => $_POST['eval'],
                'type' => PDO::PARAM_INT
            )
        );

        if($values[3]['var'] < 1){
            $values[3]['var'] = '1';
        }
    
        

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $req = $this->unsetData($req);

    }

    // nombre des votes DONE
    public function NumberOfVotes() {

        $queryToUse = "SELECT COUNT(idBook) AS nbVotes FROM t_evaluate WHERE idBook = :id";

        $values = array(
            1=> array(
                'marker' => ':id',
                'var' => $_GET['idBook'],
                'type' => PDO::PARAM_STR
            )
        );

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]['nbVotes'];

    }

    // stars already inserted (optional)
    public function AlreadyVoted() {

        $queryToUse = "SELECT idUser FROM t_user WHERE usePseudo = :username";

        $values = array(
            1=> array(
                'marker' => ':username',
                'var' => $_SESSION['username'],
                'type' => PDO::PARAM_STR
            )
        );

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]['idUser'];

    }

    // Modification Of Vote
    public function VoteModify() {
        $queryToUse = "UPDATE t_evaluate SET evaGrade = :eval WHERE idUser = :idUser AND idBook = :idBook";

        $registerRepository = new RegisterRepository();
        $accountId = $registerRepository->findUserId($_SESSION['username']);

        $values = array(
            1=> array(
                'marker' => ':eval',
                'var' => $_POST['eval'],
                'type' => PDO::PARAM_INT
            ),
            2=> array(
                'marker' => ':idUser',
                'var' => $accountId,
                'type' => PDO::PARAM_INT
            ),
            3=> array(
                'marker' => ':idBook',
                'var' => $_GET['idBook'],
                'type' => PDO::PARAM_INT
            )
        );

        if($values[1]['var'] < 1){
            $values[1]['var'] = '1';
        }

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $req = $this->unsetData($req);

    }

    /**
     * Retourne l'évaluation d'un utilisateur si un vote existe pour le livre
     *
     * @param int $idBook
     * @return int
     */
    public function SearchUserEval()
    {
        $registerRepository = new RegisterRepository();
        $accountId = $registerRepository->findUserId($_SESSION['username']);

        $queryToUse = "SELECT evaGrade FROM t_evaluate WHERE idBook = :idBook AND idUser = :idUser";
        $values = array(
            1=> array(
                'marker' => ':idUser',
                'var' => $accountId,
                'type' => PDO::PARAM_INT
            ),
            2=> array(
                'marker' => ':idBook',
                'var' => $_GET['idBook'],
                'type' => PDO::PARAM_INT
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        if(array_key_exists(0, $eval)){
            if(array_key_exists('evaGrade', $eval[0])){
                return $eval[0]["evaGrade"];
            }
        }
    }
}