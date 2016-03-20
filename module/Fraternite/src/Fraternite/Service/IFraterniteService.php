<?php
namespace Fraternite\Service;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Application\Entity\Fraternite;
/**
 * Description of IFraterniteService
 *
 * @author dikoue
 */
interface IFraterniteService {
    //put your code here
    public function saveFraternite(Fraternite $fraternite);

    public function getAllFraternite();

    public function deleteFraternite($id);
    
    public function updateFraternite(Fraternite $fraternite);

    public function getAllPersonnels();
    
    public function getFraterniteById($id);
}
