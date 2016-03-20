<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Evenement\Service;

/**
 * Description of PersonnelService
 *
 * @author AMADOU BAKARI\Application\Entity\Personnel
 */
use Evenement\Service\AbstractService;
use Evenement\Service\IEvenementService;
use Application\Entity\Evenement;

class EvenementService extends AbstractService implements IEvenementService {

    public function saveEvenement(Evenement $evenement) {
        $this->getEm()->persist($evenement);
        $this->getEm()->flush();
    }

    public function getAll() {
        $emConfig = $this->getEm()->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
        $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
        $emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');
        $query = $this->getEm()->createQuery('SELECT e.type,DAY(e.dateDebut) as day,MONTH(e.dateDebut) as month,YEAR(e.dateDebut) as year, e.dateFin,DAY(e.dateFin) as dayf,MONTH(e.dateFin) as monthf,YEAR(e.dateFin) as yearf, e.dateFin, e.description,e.idPersonnel from Application\Entity\Evenement e ORDER BY e.type ASC');
        return $query->getResult();
    }

    public function getPersonnelById($id) {
        return $this->getEm()->find('Application\Entity\Personnel', $id);
    }

    public function getAllPersonnels() {
        $query = $this->getEm()->createQuery('SELECT p from Application\Entity\Personnel p ORDER BY p.nom ASC');
        return $query->getResult();
    }

    public function getAllEvents() {
        return $this->getEm()->getRepository('Application\Entity\Evenement')->findAll();
    }

    public function getNewEvents() {
        return $this->getEm()->getRepository('Application\Entity\Evenement')->findBy(array(), array('dateDebut' => 'DESC'), 4);
    }

}
