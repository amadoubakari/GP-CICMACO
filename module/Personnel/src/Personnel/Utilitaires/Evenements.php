<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Utilitaires;

/**
 * Description of Evenements
 *
 * @author AMADOU BAKARI
 */
use Application\Entity\Evenement;

require './IEvenements.php';

class Evenements implements IEvenements {

    private $db;

    public function getDb() {
        return $this->db;
    }

    public function setDb($db) {
        $this->db = $db;
    }

    public function getAllEvenements() {
        //$db = new PDO('mysql:host=localhost;dbname=cicmaoc', 'root', '');
        //$personnes = array();
        $request = $this->db->query('SELECT type, date_debut, date_fin, description FROM evenement ORDER BY date_debut');
        return $donnees = $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getRecentsEvents() {
        
    }

    function __construct(PDO $db) {
        $this->setDb($db);
    }

}
