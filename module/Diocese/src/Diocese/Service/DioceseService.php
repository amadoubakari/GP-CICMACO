<?php
namespace Diocese\Service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DioceseService
 *
 * @author dikoue
 */
use Application\Entity\Diocese;

class DioceseService extends AbstractService{
    //put your code here
    public function saveDiocese(Diocese $diocese) {
        $this->getEm()->persist($diocese);
        $this->getEm()->flush();
    }

    public function getAll() {
       $query = $this->getEm()->createQuery('SELECT d.nom, d.telephone, d.recteur from Application\Entity\Diocese d ORDER BY d.recteur ASC');
        return $query->getResult(); 
    }
}
