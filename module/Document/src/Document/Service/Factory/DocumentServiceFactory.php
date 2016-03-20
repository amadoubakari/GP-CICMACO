<?php
namespace Document\Service\Factory;
 
use Document\Service;
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
class DocumentServiceFactory implements FactoryInterface {
    //put your code here
     public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $documentRepository = $entityManager->getRepository('Application\Entity\Document');
         
        return new Service\DocumentService($entityManager, $documentRepository);
    } 
}
