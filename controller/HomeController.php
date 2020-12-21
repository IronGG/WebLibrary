<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Contrôleur pour les pages classiques
 */
include_once 'model/VerifInsert.php';

class HomeController extends Controller {

    /**
     * Permet de choisir l'action a effectuer
     *
     * @return mixed
     */
    public function display() {

        
        if(array_key_exists('action', $_GET)){
            $action = $_GET['action'] . "Action"; // listAction
        }
        else{
            $action = 'indexAction'; // listAction
        }

        
        if(method_exists(get_class($this), $action)){      
            return call_user_func(array($this, $action));
        }
        else{
            return call_user_func(array($this, "indexAction"));
        }

        //return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction() {

        $catalogRepository = new CatalogRepository();
        $books = $catalogRepository->findBestHome();

        $view = file_get_contents('view/page/home/index.php');
        $bestseller = file_get_contents('view/page/home/list.php');

        ob_start();
        eval('?>' . $view . $bestseller);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Contact Action
     *
     * @return string
     */
    private function AproposAction() {

        $view = file_get_contents('view/page/home/Apropos.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Contact Action
     *
     * @return string
     */
    private function newBookAction() {

        if (!isset($_SESSION['username']))
        {
            header("Location: index.php?controller=home&action=unConnected");
        }
        else
        {
            $catalogRepository = new CatalogRepository();
            $lstCategories = $catalogRepository->findAllCat();
            $verifData = new VerifInsert();

            $view = file_get_contents('view/page/home/newBook.php');


            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }

    private function profilAction() {

        $view = file_get_contents('view/page/home/profil.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    private function unConnectedAction() {

        $view = file_get_contents('view/page/home/unConnected.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}