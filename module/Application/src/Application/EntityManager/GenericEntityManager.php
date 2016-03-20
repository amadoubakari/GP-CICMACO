<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\EntityManager;

/**
 * Description of EManager
 *
 * @author AMADOU BAKARI
 */
use Doctrine\ORM\EntityManager;

class GenericEntityManager {

    /**
     * @var \Doctrine\ORM\EntityManager L'entity manager
     */
    private $em;

    /**
     * Constructeur
     * @param \Doctrine\ORM\EntityManager $em L'Entity manager
     * @param \Doctrine\ORM\EntityRepository $rep Le repository
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * Obtient l'entity manager
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        return $this->em;
        }

        /**
         * Obtient le repository
         * @return \Doctrine\ORM\EntityRepository
         */
        protected function setEm(EntityManager $em) {
        return $this->em=$em;
    }

}
