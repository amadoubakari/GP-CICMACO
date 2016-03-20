<?php

namespace Document\Service;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DioceseService
 *
 * @author dikoue
 */
use Application\Entity\Document;
//Pagination 
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator as ZendPaginator;

class DocumentService extends AbstractService {

    //put your code here
    public function saveDocument(Document $document) {
        $this->getEm()->persist($document);
        $this->getEm()->flush();
    }

    public function getAll() {
        $query = $this->getEm()->createQuery('SELECT d.type, d.description, d.fichier,d.idPersonnel, from Application\Entity\Document d ORDER BY d.idPersonnel ASC');
        return $query->getResult();
    }

    public function getAllDoc() {
        return $this->getEm()->getRepository('Application\Entity\Document')->findAll();
    }

    public function getPersonnelById($id) {
        return $this->getEm()->find('Application\Entity\Personnel', $id);
    }

    public function getAllPersonnels() {
        return $this->getEm()->getRepository('Application\Entity\Personnel')->findAll();
    }

    public function getDocumentsByIdPersonnel($idPersonnel, $page) {
        $query = $this->getEm()->createQuery('SELECT d from Application\Entity\Document d WHERE d.idPersonnel=' . $idPersonnel);
//        return $query->getResult();
        $firstPage = 1;
        $maxLenght = 20;
        if ($page) {
            $firstPage = $page;
        }
        $paginator = new ZendPaginator(new PaginatorAdapter(new ORMPaginator($query)));
        $paginator->setCurrentPageNumber((int) $firstPage)
                ->setItemCountPerPage($maxLenght);
        return $paginator;
    }

}
