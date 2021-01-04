<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Contrôleur principal
 */
abstract class Controller {

    /**
     * Méthode permettant d'appeler l'action 
     *
     * @return mixed
     */
    public function display() {

        $page = $_GET['action'] . "Display";

        $this->$page();
    }
}