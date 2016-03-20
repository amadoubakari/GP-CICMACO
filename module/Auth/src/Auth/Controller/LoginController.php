<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Controller;

/**
 * 
 *
 * @author AMADOU BAKARI
 * @copyright (c) 2015, AMADOU BAKARI
 * 
 * This class manage authentification and redirect to home page if user exist
 * 
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;

session_start();

class LoginController extends AbstractActionController {

    public function loginAction() {

        $this->layout('layout/login');
        $request = $this->getRequest();
        $msg = NULL;
        $evenements = NULL;
        $login = NULL;
        $password = NULL;
        if ($request->isPost()) {
            //***************************************
            $message = new Message();
            $message->addTo('amadou_bakari@yahoo.fr')
                    ->addFrom('amadoubakari1992@gmail.com')
                    ->setSubject('Greetings and Salutations!')
                    ->setBody("Sorry, I'm going to be late today!");

            $transport = new Sendmail();
            $transport->send($message);
            //***************************************
            $login = $request->getPost('login');
            $password = md5($request->getPost('password'));
            $rememberMe = $request->getPost('rememberMe');
            $authService = $this->getServiceLocator()->get('authService');
            $results = $authService->authentification($login, $password, $rememberMe);
            $personnel = $results['personnel'];
            if ($personnel != NULL) {
                $_SESSION['personnel'] = $personnel;
                $_SESSION['profil'] = $results['profil'];
                $_SESSION['evenements'] = $results['evenements'];
                $_SESSION['connected'] = TRUE;
                return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
            } else {
                $msg = "Votre login ou mot de passe est incorrect !!!";
                // return $this->redirect()->toRoute('auth/default', array('controller' => 'login', 'action' => 'login'));
            }
        }
        return new ViewModel(
                array('msg' => $msg,
            'evenements' => $evenements,
            'login' => $login,
            'password' => $password));
    }

    public function logoutAction() {
        session_destroy();
        return $this->redirect()->toRoute('auth/default', array('controller' => 'login', 'action' => 'login'));
    }

    public function changepasswordAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'accueil'));
        }

        if (isset($_SESSION['personnel'])) {
            // $personnel = $_SESSION['personnel'];

            $request = $this->getRequest();
            if ($request->isPost()) {
                $personnel = $personnelService->getPersonnelById($_SESSION['personnel']->getIdPersonnel());
                //$pays = new Pays(1, 'CAMEROUN', '+237');
                $personnel->setlogin($request->getPost('login'));
                //$personnel->setIdPays($pays);
                $personnel->setPassword(md5($request->getPost('newpassword')));
                $personnelService->editPersonnel($personnel);
                $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
            }
        }
        return new ViewModel(
                array());
    }

}
