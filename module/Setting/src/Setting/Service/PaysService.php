<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setting\Service;

/**
 * Description of EleveService
 *
 * @author AMADOU BAKARI
 */
use Application\EntityManager\GenericEntityManager;

class PaysService extends GenericEntityManager implements IPaysService {

    public function listPays() {
        $this->getEm()->beginTransaction();
        
        
        $this->getEm()->commit();
    }

}
