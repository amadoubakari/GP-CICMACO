<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Service;

/**
 * Description of PersonnelService
 *
 * @author AMADOU BAKARI\Application\Entity\Personnel
 */
use Personnel\Service\AbstractService;
use Personnel\Service\IPersonnelService;
use Application\Entity\Personnel;
use Application\Entity\Fraternite;
// Pagination
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator as ZendPaginator;

class PersonnelService extends AbstractService implements IPersonnelService {

    public function savePersonnel(Personnel $personnel) {
        $this->getEm()->persist($personnel);
        $this->getEm()->flush();
    }

    public function getAll($page) {
        $paginator = new ZendPaginator(new PaginatorAdapter(new ORMPaginator($this->getEm()->createQuery('SELECT p FROM Application\Entity\Personnel p WHERE p.statut=1 ORDER BY p.nom ASC'))));
        $pagefirst = 1;
        $nbElements=4;
        if ($page) {
            $pagefirst = $page;
        }

        $paginator->setCurrentPageNumber((int) $pagefirst)
                ->setItemCountPerPage($nbElements);

        return $paginator;
    }

    public function getAllPays() {
        $query = $this->getEm()->createQuery('SELECT p FROM Application\Entity\Pays AS p WHERE p.statut=1 ORDER BY p.nom ASC');
        return $query->getResult();
    }

    public function getPaysById($id) {
        return $this->getEm()->find('Application\Entity\Pays', $id);
    }

    public function getPersonnelById($id) {
        return $this->getEm()->find('Application\Entity\Personnel', $id);
    }

    public function getAllListPretres() {
        $typePersonnel = 'Pretre';
        $query = $this->getEm()->createQuery('SELECT p from Application\Entity\Personnel p WHERE p.typePersonnel=\'' . $typePersonnel . '\' ORDER BY p.nom ASC');
        return $query->getResult();
    }

    public function getAllListEtudiants() {
        $typePersonnel = 'Etudiant';
        $query = $this->getEm()->createQuery('SELECT p from Application\Entity\Personnel p WHERE p.typePersonnel=\'' . $typePersonnel . '\' ORDER BY p.nom ASC');
        return $query->getResult();
    }

    public function getFraterniteById($id) {
        $query = $this->getEm()->createQuery('SELECT f from Application\Entity\Fraternite f WHERE f.idPersonnel=' . $id);
        return $query->getResult();
    }

    public function editPersonnel(Personnel $personnel) {
        $this->getEm()->merge($personnel);
        $this->getEm()->flush();
    }

    public function deletePersonnel(Personnel $personnel) {
        $this->getEm()->remove($personnel);
        $this->getEm()->flush();
    }

    public function getListPersonnels() {
        return $this->getRep()->findAll();
    }

    public function deleteFraternite(Fraternite $fraternite) {
        $this->getEm()->remove($fraternite);
        $this->getEm()->flush();
    }

    public function getEvenementByIdPersonnel($id) {
        $query = $this->getEm()->createQuery('SELECT e from Application\Entity\Evenement e WHERE e.idPersonnel=' . $id);
        return $query->getResult();
    }

    public function deleteEvenement(\Application\Entity\Evenement $evenement) {
        $this->getEm()->remove($evenement);
        $this->getEm()->flush();
    }

    public function getAllProfils() {
        return $this->getEm()->getRepository('Application\Entity\Profil')->findAll();
    }

    public function getProfilById($id) {
        return $this->getEm()->find('Application\Entity\Profil', $id);
    }

    public function checkUniqueEmail($email) {
        $exist = FALSE;
        $query = $this->getEm()->createQuery('SELECT p from Application\Entity\Personnel p WHERE p.email=' . $email);
        $personnel = $query->getSingleResult();
        if ($personnel != NULL) {
            $exist = TRUE;
        }
        return $exist;
    }

}
