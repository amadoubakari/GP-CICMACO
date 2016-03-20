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

namespace Evenement\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Evenement\Service\EvenementService;

class EvenementServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $evenementRepository = $entityManager->getRepository('Application\Entity\Evenement');

        return new EvenementService($entityManager, $evenementRepository);
    }

}
