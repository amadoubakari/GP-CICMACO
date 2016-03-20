<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Evenement\Service;

/**
 *
 * @author AMADOU BAKARI
 */
use Application\Entity\Evenement;

interface IEvenementService {

    public function saveEvenement(Evenement $evenement);

    public function getAll();

    public function getPersonnelById($id);

    public function getAllPersonnels();

    public function getAllEvents();

    public function getNewEvents();
}
