<?php

namespace Fraternite\Service;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FraterniteService
 *
 * @author dikoue
 */
use Application\Entity\Fraternite;
use Fraternite\Service\AbstractService;
use Fraternite\Service\IFraterniteService;

class FraterniteService extends AbstractService implements IFraterniteService {

    //put your code here
    public function saveFraternite(Fraternite $fraternite) {
        $this->getEm()->persist($fraternite);
        $this->getEm()->flush();
    }

    public function getAllFraternite() {
        return $this->getEm()->getRepository('Application\Entity\Fraternite')->findAll();
    }
    public function getPersonnelById($id) {
        return $this->getEm()->find('Application\Entity\Personnel', $id);
    }

    public function deleteFraternite($id) {
        
    }

    public function updateFraternite(Fraternite $fraternite) {
        
    }

    public function getAllPersonnels() {

        return $this->getEm()->getRepository('Application\Entity\Personnel')->findAll();
    }

    public function getFraterniteById($id) {
        return $this->getEm()->find('Application\Entity\Fraternite', $id);
    }

}
