<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Evenement\Controller;

/**
 * Description of EventAjaxController
 *
 * @author AMADOU BAKARI
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class EventAjaxController extends AbstractActionController {

    public function listAction() {
        $evenementService = $this->getServiceLocator()->get('Evenement\Service\EvenementService');
//        $id = (int) $this->params('id', null);
        $tab = NULL;
        $events = $evenementService->getNewEvents();
        if (true) {
            foreach ($events as $event) {
                $personnel = $evenementService->getPersonnelById($event->getIdPersonnel());
                $tab['events'][] = array(
                    'idEvenement' => $event->getIdEvenement(),
                    'Type' => $event->getType(),
                    'dateDebut' => $event->getDateDebut()->format('d/m/Y'),
                    'dateFin' => $event->getDateFin()->format('d/m/Y'),
                    'description' => $event->getDescription(),
                    'photo' => $personnel->getPhoto(),
                    'nom' => $personnel->getNom(),
                    'prenom' => $personnel->getPrenom(),
                );
            }
        }

        return new JsonModel($tab);
    }

}
