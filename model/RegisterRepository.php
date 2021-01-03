<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Méthode pour afficher/changer les informations des utilisateurs
 */

include_once "Repository.php";
class RegisterRepository extends Repository{

    public function __construct()
    {
        $this->connector = new PDO('mysql:host=localhost;dbname=bdwebprojet;charset=utf8', 'root', 'root');

    }
    

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
                'var' => $password,
                'type' => PDO::PARAM_STR
            )
        );
        $req = $this->queryPrepareExecute($queryToUse, $values);
        $req = $this->unsetData($req);

        if ($req == TRUE) {
            echo "New record created successfully";
        } 
        else {  
            echo "Error: " . $queryToUse . "<br>";
        }
    }

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

    public function accountCreation() {

        if($this->accountVerification()){
            $this->register($_POST['username'], $_POST['password']);
        }

    }

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
                            echo ' Les deux mots de passes ne sont pas identiques ';
                        }
                    }
                    else{
                        echo 'mdp pas assez long';
                    }
                }
    
                echo ' username enregistré ';
    
            }
        }

        return $valid;
    }

    // DONE
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


    // date de création Done
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

    // nombre de votes Done
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