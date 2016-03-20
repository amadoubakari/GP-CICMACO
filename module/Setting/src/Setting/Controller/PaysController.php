<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setting\Controller;

/**
 * Description of PaysController
 *
 * @author AMADOU BAKARI
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

session_start();

class PaysController extends AbstractActionController {

    public function listAction() {
        return new ViewModel();
    }

}
