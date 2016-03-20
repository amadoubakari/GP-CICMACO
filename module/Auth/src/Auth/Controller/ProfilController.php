<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Controller;

/**
 * Description of ProfilController
 *
 * @author AMADOU BAKARI
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Personnel;

session_start();

class ProfilController extends AbstractActionController {

    public function changerpasswordAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        $msg = NULL;
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'accueil'));
        }

        if (isset($_SESSION['personnel'])) {
            $request = $this->getRequest();
            $personnel = $personnelService->getPersonnelById($_SESSION['personnel']->getIdPersonnel());
            if ($request->isPost()) {
                $personnel->setlogin($request->getPost('login'));
                $oldpassword = md5($request->getPost('oldpassword'));
                if ($personnel->getPassword() != $oldpassword) {
                    $msg = 'Ancien mot de passe invalide !!!';
                } else {
                    $newpassword = $request->getPost('newpassword');
                    $oldpassword = $request->getPost('confirmpassword');
                    if ($newpassword !== $oldpassword) {
                        $msg = "les deux mots de passe ne sont pas identiques !!!";
                        //$this->redirect()->toRoute('auth/default', array('controller' => 'profil', 'action' => 'changerpassword'));
                    } else {
                        $newpassword = $personnel->setPassword(md5($newpassword));
                        $personnelService->editPersonnel($personnel);
                        $this->redirect()->toRoute('auth/default', array('controller' => 'login', 'action' => 'logout'));
                    }
                }
            }
        }
        return new ViewModel(
                array('msg' => $msg,
            'personnel' => $personnel));
    }

}
