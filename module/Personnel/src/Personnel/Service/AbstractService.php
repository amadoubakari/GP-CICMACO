<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractService
 *
 * @author AMADOU BAKARI
 */

namespace Personnel\Service;

use \Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class AbstractService {

    /**
     * @var \Doctrine\ORM\EntityManager L'entity manager
     */
    private $_em;

    /**
     * @var \Doctrine\ORM\EntityRepository Le repository
     */
    private $_rep;

    /**
     * Constructeur
     * @param \Doctrine\ORM\EntityManager $em L'Entity manager
     * @param \Doctrine\ORM\EntityRepository $rep Le repository
     */
    public function __construct(EntityManager $em, EntityRepository $rep) {
        $this->_em = $em;
        $this->_rep = $rep;
    }

    /**
     * Obtient l'entity manager
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        return $this->_em;
    }

    /**
     * Obtient le repository
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRep() {
        return $this->_rep;
    }

}
