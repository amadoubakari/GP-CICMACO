<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Evenement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Evenement;
use Application\Entity\Pays;
use Zend\Validator\File\Size;
use Zend\File\Transfer\Adapter\Http;
use Application\Entity\Personnel;
use DateTime;

//use Application\Entity\Personnel;

session_start();

class EvenementController extends AbstractActionController {

    public function addAction() {

        $request = $this->getRequest();

        $evenementService = $this->getServiceLocator()->get('Evenement\Service\EvenementService');

        if ($request->isPost()) {
            $evenement = new Evenement();
            $evenement->setType($request->getPost('type'));
            $evenement->setDateDebut((new DateTime($request->getPost('dateDebut'))));
            $evenement->setDateFin((new DateTime($request->getPost('dateFin'))));
            $evenement->setDescription($request->getPost('description'));
            $evenement->setIdPersonnel($evenementService->getPersonnelById($request->getPost('idPersonnel')));
            $evenementService->saveEvenement($evenement);

            $this->redirect()->toRoute('evenement/default', array('controller' => 'evenement', 'action' => 'index'));
        }
        return new ViewModel(
                array('personnels' => $evenementService->getAllPersonnels()));
    }

    public function indexAction() {
        $evenementService = $this->getServiceLocator()->get('Evenement\Service\EvenementService');
        return new ViewModel(
                array('evenements' => $evenementService->getAllEvents()));
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}
