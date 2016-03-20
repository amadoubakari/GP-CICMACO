<?php

namespace Diocese\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Diocese;
use Diocese\Service\DioceseService;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DioceseController
 *
 * @author dikoue
 */
session_start();

class DioceseController extends AbstractActionController {

    //put your code here
    public function indexAction() {
        
    }

    public function addAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $diocese = new Diocese();
            $diocese->setAdresse($request->getPost('adresse'));
            $diocese->setEconome($request->getPost('econome'));
            $diocese->setEmail($request->getPost('email'));
            $diocese->setNom($request->getPost('nom'));
            $diocese->setIdSecteur($request->getPost('idsecteur'));
            $diocese->setRecteur($request->getPost('recteur'));
            $diocese->setTelephone($request->getPost('telephone'));

            $dioceseService = $this->getServiceLocator()->get('Diocese\Service\DioceseService');
            $dioceseService->saveDiocese($diocese);
            return $this->redirect()->toRoute('diocese/default', array('controller' => 'diocese', 'action' => 'add'));
        }
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}
