<?php
/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Controler pour gérer les pages classiques
 */

class HomeController extends Controller {

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
        $catalogRepository = new CatalogRepository();
        $lstCategories = $catalogRepository->findAllCat();

        $view = file_get_contents('view/page/home/newBook.php');


        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }
}