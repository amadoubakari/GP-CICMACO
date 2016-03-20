<?php

namespace Fraternite\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Fraternite;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FraterniteController
 *
 * @author dikoue 
 */
session_start();

class FraterniteController extends AbstractActionController {

    //put your code here
    public function addAction() {

        $request = $this->getRequest();

        $fraterniteService = $this->getServiceLocator()->get('Fraternite\Service\FraterniteService');


        if ($request->isPost()) {
            $fraternite = new Fraternite();

            $fraternite->setType($request->getPost('type'));
            $fraternite->setNom($request->getPost('nom'));
            $fraternite->setOrdreFamilial($request->getPost('ordreFamilial'));
            $fraternite->setEtatPsychologique($request->getPost('etatPsychologique'));
            $fraternite->setEnVie($request->getPost('enVie'));
            $fraternite->setIdPersonnel($fraterniteService->getPersonnelById($request->getPost('idPersonnel')));

            $fraterniteService->saveFraternite($fraternite);

            $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }

        return new ViewModel(
                array('personnels' => $fraterniteService->getAllPersonnels()));
    }

    public function indexAction() {
        $fraterniteService = $this->getServiceLocator()->get('Fraternite\Service\FraterniteService');

        return new ViewModel(
                array('fraternites' => $fraterniteService->getAllFraternite()));
    }

}
