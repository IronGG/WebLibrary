<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Classe parent contentant les méthodes de base pour les repository
 */

abstract class Repository{

    // Variable de classe
    protected $connector;

    /**
     * Simple requête
     *
     * @param string $query
     * @return PDOStatement
     */
    protected function querySimpleExecute($query)
    {
        $req = $this->connector->query($query);
        return $req;
    }


    /**
     * Prépare, bind et execute une requête
     *
     * @param string $query
     * @param array $binds
     * @return PDOStatement
     */
    protected function queryPrepareExecute($query, $binds)
    {
        $req = $this->connector->prepare($query);
        $req->execute();
        return $req;
    }


    /**
     * Format le résultat de la requête dans un tableau
     *
     * @param PDOStatement $req
     * @return array
     */
    protected function formatData($req)
    {

        $listOfItem = $req->fetchALL(PDO::FETCH_ASSOC);
        return $listOfItem;
    }


    /**
     * Vide la requête
     *
     * @param PDOStatement $req
     */
    protected function unsetData($req)
    {

        $req->closeCursor();
    }
}