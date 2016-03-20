<?php
namespace Diocese\Service\Factory;
 
use Diocese\Service;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserServiceFactory
 *
 * @author dikoue
 */
class DioceseServiceFactory implements FactoryInterface {
    //put your code here
     public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $dioceseRepository = $entityManager->getRepository('Application\Entity\Diocese');
         
        return new Service\DioceseService($entityManager, $dioceseRepository);
    } 
}
