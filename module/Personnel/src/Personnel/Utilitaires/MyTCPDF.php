<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Utilitaires;

/**
 * Description of MyTCPDF
 *
 * @author AMADOU BAKARI
 */
use TCPDF;

class MyTCPDF extends TCPDF {

    public function Header() {
        $this->Image('C:\\xampp\htdocs\GP-CICM\public\img\logo\\logocicmaoc.png', 15, 5, 20, 20,NULL, 'http://localhost/GP-CICM/public', '', true, 150, '', false, false, 0, false, false, false);
        $html = '<h5  style="text-align: center">MISSIONNAIRES DU CŒUR IMMACULE DE MARIE CICM</h5></br>'
                . '<h6  style="text-align: center">Congregatio Immaculati Cordis Mariae</h6></br>'
                . '<h6  style="text-align: center"><b>PROVINCE DE L\'AFRIQUE CENTRALE ET DE L\'OUEST (ACO)</b></h6><hr>';
        $this->writeHTML($html, true, false, true, false, '');
    }

    public function Footer() {
        $html = '<hr><h5  style="text-align: center">Maison Provinciale CICM Mvolyé B.P. 2861 Yaoundé Messa-Cameroun</h5></br>'
                . '<h6  style="text-align: center">Tél.fixe:(237) 243 59 52 46 Procure : C191 Email: provincialcam@yahoo.fr</h6></br>'
                . '<h6  style="text-align: center"><b>Cor Unum Et Anima Una</b></h6>';
        $this->writeHTML($html, true, false, true, false, '');
    }

}
