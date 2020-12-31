<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Contrôleur pour la liste des livres et le détail
 */

include_once 'model/CatalogRepository.php';

class CatalogController extends Controller {

    /**
     * Permet de choisir l'action à effectuer
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        // Appelle une méthode dans cette classe (ici, ce sera le nom + action (ex: listAction, detailAction, ...))
        return call_user_func(array($this, $action));
    }


    /**
     * Affichage de la page list, le catalogue
     *
     * @return mixed
     */
    private function indexAction() {
        $catalogRepository = new CatalogRepository();
        $nbBook = $catalogRepository->numberPagePossible();
        if((!isset($_GET["numberPage"]) || $_GET["numberPage"] > 1 + $nbBook/15 || $_GET["numberPage"]<1) && !isset($_POST["catChoose"]))
        {
            header("Location: index.php?controller=catalog&action=index&numberPage=1");
        }
        else
        {
            // Instancie le modèle et va chercher les informations
            $catalogRepository = new CatalogRepository();
            $lstCategories = $catalogRepository->findAllCat();
            if(!isset($_POST["catChoose"]))
            {
                $books = $catalogRepository->findAll($_GET["numberPage"]);
            }
            else
            {
                $books = $catalogRepository->findSpecialBook($_POST["catChoose"]);
            }

            $view = file_get_contents('view/page/catalog/list.php');

            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }

    /**
     * Affichage du détail d'un livre
     *
     * @return mixed
     */
    private function detailBookAction() {
        //$note = $catalogRepository->SearchEval($_GET['idBook']);
        
        //Laetitia
        if (!isset($_SESSION['username']))
        {
            header("Location: index.php?controller=home&action=unConnected");
        }
        else
        {
            $catalogRepository = new CatalogRepository();
            $book = $catalogRepository->findABook($_GET['idBook']);

            $view = file_get_contents('view/page/catalog/book.php');


            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }
}