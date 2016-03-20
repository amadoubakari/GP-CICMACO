<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonnelServiceFactory
 *
 * @author AMADOU BAKARI
 */

namespace Personnel\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Personnel\Service\PersonnelService;

class PersonnelServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $personnelRepository = $entityManager->getRepository('Application\Entity\Personnel');

        return new PersonnelService($entityManager, $personnelRepository);
    }

}
