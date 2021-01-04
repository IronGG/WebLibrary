<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Contrôleur pour la gestion du login
 */

include_once 'model/RegisterRepository.php';

class LoginController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action"; // listAction

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction() {

        $view = file_get_contents('view/page/login/index.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Permet de s'inscrire ou d'envoyer une erreur s'il y'en a
     *
     * @return void
     */
    private function registerAction() {

        $registerRepository = new RegisterRepository();
        $compte = $registerRepository->accountCreation();

        // Si la personne est connectée -> impossibilité de s'inscrire par dessus
        if(isset($_SESSION['username'])){
            header("Location: index.php?controller=home&action=index");
        }
        else{
        echo "<h1>ERROR</h1>";
        $_SESSION['registerError'] = true;
        header("Location: index.php?controller=login&action=index");
        }
    }

    /**
     * Action login du controleur. Permet de se connecter et rediriger sur la bonne page en fonction des valeurs rentrées.
     *
     * @return void
     */
    private function loginAction() {

        $registerRepository = new RegisterRepository();
        $compte = $registerRepository->login($_POST['username']);

        // contrôle la connection et renvoi sur la page en fonction des valeurs rentrées et celles de la bd
        if(array_key_exists('password', $_POST)){
            if(password_verify($_POST['password'], $compte[0]['usePassword'])){
                if($_POST['password'] && $_POST['username']){

                    // Si les valeurs sont justes -> connection (stockée dans deux variables de sessions permanentes, 'username' et 'connected')

                    $_SESSION['newLogin'] = true;
                    $_SESSION['username'] = $compte[0]['usePseudo'];
                    $_SESSION['connected'] = true;
        
                    header("Location: index.php?controller=home&action=index");
                }
                else{

                    // Si par hasard $_POST['username'] n'existe pas, cette erreur sera déclanchée
        
                    $_SESSION['loginError'] = true;
        
                    header("Location: index.php?controller=login&action=index");
                }
            }
            else{

                // Mot de passe ne match pas avec celui de la bd

                $_SESSION['loginError'] = true;
        
                header("Location: index.php?controller=login&action=index");
            }
        }   
        else{
            if(array_key_exists('username', $_POST)){
                // Si l'utilisateur était sur la page de login -> redirige sur login
                header("Location: index.php?controller=login&action=index");
            }
            else{
                // Si l'utilisateur n'était pas sur la page de login (et n'a donc pas passé un POST) -> redirige sur home
                header("Location: index.php?controller=home&action=index");
            }
        }
    }
}