<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Utilitaire;

/**
 * Description of Utilitaire
 *
 * @author AMADOU BAKARI
 */
use Zend\Validator\File\Size;
use Zend\File\Transfer\Adapter\Http;

class Utilitaire implements IUtilitaire {

    public function fileUpload($fileName, $folderName) {
        if ($fileName != NuLL || $fileName !== "") {
            $size = new Size(array('min' => 100)); //minimum bytes filesize
            $adapter = new Http();
            $adapter->setValidators(array($size), $fileName);
            if (!$adapter->isValid()) {
                $dataError = $adapter->getMessages();
                $error = array();
                foreach ($dataError as $key => $row) {
                    $error[] = $row;
                }
               // $form->setMessages(array('image' => $error));
            } else {
                $adapter->setDestination($folderName);
                if ($adapter->receive($fileName)) {
                    //echo $photoName . '\' successfully uploaded';
                }
            }
        }
    }

}
