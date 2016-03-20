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

namespace Fraternite\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FraterniteServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $evenementRepository = $entityManager->getRepository('Application\Entity\Fraternite');

        return new \Fraternite\Service\FraterniteService($entityManager, $evenementRepository);
    }

}
