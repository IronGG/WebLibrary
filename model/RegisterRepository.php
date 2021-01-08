<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Méthode pour afficher/changer les informations des utilisateurs
 */

include_once "Repository.php";
class RegisterRepository extends Repository{

    /**
     * Constructeur de RegisterRepository
     */
    public function __construct()
    {
        include_once "config.ini.php";
        $dbName = $GLOBALS['database']['dbName'];
        $user = $GLOBALS['database']['user'];
        $password = $GLOBALS['database']['password'];
        $host = $GLOBALS['database']['host'];
        $charset = $GLOBALS['database']['charset'];

        $this->connector = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset='. $charset, $user, $password);

    }
    
    /**
     * Inscrit un utilisateur dans la bd
     *
     * @param string $username
     * @param string $password
     */
    public function register($username, $password) {

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $queryToUse = "INSERT INTO t_user (usePseudo, usePassword, useDate) VALUES (:username , :passwordHash, CURDATE())";
        $values = array(
            1=> array(
                'marker' => ':username',
                'var' => $username,
                'type' => PDO::PARAM_STR
            ),
            2=> array(
                'marker' => ':passwordHash',
                'var' => $passwordHash,
                'type' => PDO::PARAM_STR
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $req = $this->unsetData($req);
    }

    /**
     * Récupère le password en fonction du pseudo donné
     *
     * @param string $username
     * @return array
     */
    public function login($username) {

        $queryToUse = "SELECT usePseudo, usePassword FROM t_user WHERE usePseudo = :username";
        $values = array(
            1=> array(
                'marker' => ':username',
                'var' => $username,
                'type' => PDO::PARAM_STR
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $userList = $this->formatData($req);
        $req = $this->unsetData($req);

        return $userList;
    }

    /**
     * appele la méthode register si la vérification est acceptée
     */
    public function accountCreation() {

        if($this->accountVerification()){
            $this->register($_POST['username'], $_POST['password']);
        }

    }

    /**
     * Vérification que les données entrées pour l'inscription sont valide
     */
    public function accountVerification() {

        $valid = false;

        if(array_key_exists('username', $_POST)) {
            if(preg_match ('/.{1,50}/', $_POST['username']) == 1){  
    
                if(array_key_exists('password', $_POST) && array_key_exists('confirm-password', $_POST)) {
    
                    if(preg_match ('/.{8,50}/', $_POST['password']) == 1){
                        if($_POST['password'] == $_POST['confirm-password']){
                            $queryToUse = "SELECT usePseudo FROM t_user WHERE usePseudo = :username";
                            $values = array(
                                1=> array(
                                    'marker' => ':username',
                                    'var' => $_POST['username'],
                                    'type' => PDO::PARAM_STR
                                )
                            );
                            $req = $this->queryPrepareExecute($queryToUse, $values);
                            $user = $this->formatData($req);
                            $req = $this->unsetData($req);
                            if($user == array()){
                                $_SESSION['username'] = $_POST['username'];
                                $valid = true;
                            }
                            else{
                                $_SESSION['registerErrorUserExists'] = true;
                            }
                        }
                        elseif(array_key_exists('password', $_POST)) {
                            // Les deux mots de passes ne sont pas identiques
                        }
                    }
                    else{
                        // mdp pas assez long
                    }
                }
            }
        }

        return $valid;
    }

    /**
     * Retourne l'id d'un utilisateur
     *
     * @param string $username
     * @return int
     */
    public function findUserId($username) {

        $queryToUse = "SELECT idUser FROM t_user WHERE usePseudo = :username";

        $values = array(
            1=> array(
                'marker' => ':username',
                'var' => $username,
                'type' => PDO::PARAM_STR
            )
        );

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]['idUser'];

    }

    /**
     * Retourne des infomrations conserent un utilisateur
     *
     * @param string $userName
     * @return array
     */
    public function oneUserData($userName) {

        $queryToUse = "SELECT useDate, usePseudo, count(t_book.idUser) as nbBook FROM t_user left join t_book on t_user.idUser = t_book.idUser WHERE usePseudo =  :username";

        $values = array(
            1=> array(
                'marker' => ':username',
                'var' => $userName,
                'type' => PDO::PARAM_STR
            )
        );

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $user = $this->formatData($req);
        $req = $this->unsetData($req);

        return $user[0];

    }

    /**
     * Retourne le nombre de vote d'un utilisateur
     *
     * @param string $pseudo
     * @return int
     */
    public function ProfileNumberOfVotes($pseudo) {

        $id = $this->findUserId($pseudo);

        $queryToUse = "SELECT COUNT(idUser) AS votes FROM t_evaluate WHERE idUser = :id";

        $values = array(
            1=> array(
                'marker' => ':id',
                'var' => $id,
                'type' => PDO::PARAM_STR
            )
        );

        $req = $this->queryPrepareExecute($queryToUse, $values);
        $eval = $this->formatData($req);
        $req = $this->unsetData($req);

        return $eval[0]['votes'];

    }

    /**
     * Retourne les 3 derniers livres ajouté par un utilisateur
     *
     * @param string $userName
     * @return array
     */
    public function bookAddByUser($userName) {

        $maVar1 = 0; // nombre de départ
        $maVar2i = 3; // nombre de répétition à afficher
        $queryToUse = "SELECT idBook, booCover, booAuthor, booTitle, catName, usePseudo FROM t_book natural join t_user natural join t_category where usePseudo = :userName ORDER BY idBook DESC LIMIT $maVar1, $maVar2i";
        $values = array(
            1=> array(
                'marker' => ':userName',
                'var' => $userName,
                'type' => PDO::PARAM_STR
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $books = $this->formatData($req);
        $req = $this->unsetData($req);

        return $books;

    }

}