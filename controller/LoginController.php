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

    private function registerAction() {
        //$registerRepository = new RegisterRepository();
        //$compte = $registerRepository->login('test')->fetchAll();*/
        //$registerRepository = new RegisterRepository();
        //$compte = $registerRepository->register($_POST['username'], $_POST['password']);

        $registerRepository = new RegisterRepository();
        $compte = $registerRepository->accountCreation();

        $view = file_get_contents('view/page/login/register.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    private function loginAction() {

        $registerRepository = new RegisterRepository();
        $compte = $registerRepository->login($_POST['username']);

        if(array_key_exists('password', $_POST)){
            if(password_verify($_POST['password'], $compte[0]['usePassword'])){
                if($_POST['password'] && $_POST['username']){
                    $_SESSION['newLogin'] = true;
                    $_SESSION['username'] = $compte[0]['usePseudo'];
                    $_SESSION['connected'] = true;
        
                    header("Location: index.php?controller=home&action=index");
                }
                else{
        
                    $_SESSION['loginError'] = true;
        
                    header("Location: index.php?controller=login&action=index");
                }
            }
            else{
                $_SESSION['loginError'] = true;
        
                header("Location: index.php?controller=login&action=index");
            }
        }   
        else{
            if(array_key_exists('username', $_POST)){
                header("Location: index.php?controller=login&action=index");
            }
            else{
                header("Location: index.php?controller=home&action=index");
            }
        }
    }
}