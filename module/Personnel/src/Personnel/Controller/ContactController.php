<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Controller;

/**
 * Description of ContactController
 *
 * @author AMADOU BAKARI
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

session_start();

class ContactController extends AbstractActionController {

    public function contactAction() {

        return new ViewModel( );
    }

}
