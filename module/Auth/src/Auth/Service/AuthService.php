<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Service;

/**
 * Description of AuthService
 *
 * @author AMADOU BAKARI
 */
class AuthService extends AbstractService implements IAuthService {

    public function authentification($login, $password, $rememberMe) {
        $personnel = NULL;
        $profil = NULL;
        $user = $this->getEm()->getRepository('Application\Entity\Personnel')->findBy(array('login' => $login, 'password' => $password, 'statut' => 1));
        $evenements = $this->getEm()->getRepository('Application\Entity\Evenement')->findAll();
        if ($user != NULL) {
            $personnel = $user[0];
            if ($personnel->getProfil()->getId() == 1) {
                $profil = "USER";
            } elseif ($personnel->getProfil()->getId() == 2) {
                $profil = "ADMIN";
            }
        }
        return array(
            'personnel' => $personnel,
            'evenements' => $evenements,
            'profil' => $profil
        );
    }

    public function getPersonnel($id) {
        return $this->getEm()->find('Application\Entity\Personnel', $id);
    }

}
