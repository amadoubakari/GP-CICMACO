<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Service;

/**
 *
 * @author AMADOU BAKARI
 */
interface IAuthService {

    public function authentification($login, $password, $rememberMe);

    public function getPersonnel($id);
}
