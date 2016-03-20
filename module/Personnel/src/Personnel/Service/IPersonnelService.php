<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Service;

/**
 *
 * @author AMADOU BAKARI
 */
use Application\Entity\Personnel;
use Application\Entity\Fraternite;
use Application\Entity\Evenement;

interface IPersonnelService {

    public function savePersonnel(Personnel $personnel);

    public function editPersonnel(Personnel $personnel);

    public function deletePersonnel(Personnel $personnel);

    public function deleteFraternite(Fraternite $fraternite);

    public function getAll($page);

    public function getAllPays();

    public function getPaysById($id);

    public function getPersonnelById($id);

    public function getAllListPretres();

    public function getAllListEtudiants();

    public function getFraterniteById($id);

    public function getListPersonnels();

    public function getEvenementByIdPersonnel($id);

    public function deleteEvenement(Evenement $evenement);

    public function getAllProfils();

    public function getProfilById($id);

    public function checkUniqueEmail($email);
}
