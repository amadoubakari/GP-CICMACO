<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Personnel;
use DateTime;
use Application\Utilitaire\Utilitaire;

session_start();

class PersonnelController extends AbstractActionController {

    public function accueilAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $pays = $personnelService->getPaysById(1);
        return new ViewModel(
                array('pays' => $pays));
    }

    public function addAction() {
        $msgEmail = NULL;
        $personnel = new Personnel();
        $request = $this->getRequest();
        if ($request->isPost()) {

            $personnel->setTypePersonnel("Pretre");
            $personnel->setIdService($request->getPost('service'));
            $personnel->setEcole("");
            $personnel->setFiliere("");
            $personnel->setNom($request->getPost('nom'));
            $personnel->setPrenom($request->getPost('prenom'));
            $personnel->setSexe($request->getPost('sexe'));
            $personnel->setDatedenaissance((new DateTime($request->getPost('dateDeNaissance'))));
            $personnel->setLieudenaissance($request->getPost('lieuDeNaissance'));
            $personnel->setGroupeethnique($request->getPost('groupeEthnique'));
            $personnel->setLanguematernelle($request->getPost('langueMaternelle'));
            $personnel->setDomicile($request->getPost('domicile'));
            $personnel->setStPatron((new DateTime($request->getPost('stPatron'))));

            //Check if email address is unique
            $email = $request->getPost('email');
            if ($email == "") {
                $personnel->setEmail($request->getPost('nom') . '_' . $request->getPost('prenom') . '@yahoo.fr');
            } elseif ($email !== "" && ($personnelService->checkUniqueEmail($email) == TRUE)) {
                $msgEmail = "L'adresse email ci est utilisé par un autre utilisateur !!!";
            } else {
                $personnel->setEmail($email);
            }

            $personnel->setTelephone($request->getPost('telephone'));
            //Nous récupérons le nom du fichier 
            $photoName = $this->params()->fromFiles('photo')['name'];
            $personnel->setPhoto($photoName);
            $personnel->setDateAdmission((new DateTime($request->getPost('dateAdmission'))));
            $personnel->setSuperieur($request->getPost('superieur'));
            //parametres d'authentification
            $personnel->setLogin($request->getPost('nom'));
            $personnel->setPassword($request->getPost('nom'));


            //Informations liées au père de l'étudiant
            $personnel->setNomPere($request->getPost('nomPere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEnViePere($request->getPost('enViePere'));
            $personnel->setOriginPere($request->getPost('originePere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEtatPsychologiquePere($request->getPost('etatPsychologiquePere'));
            $personnel->setTypeMariage($request->getPost('mariage'));



            //Informations relatives à la mère
            $personnel->setNomMere($request->getPost('nomMere'));
            $personnel->setOrigineMere($request->getPost('origineMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEnVieMere($request->getPost('enVieMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEtatPsychologiqueMere($request->getPost('etatPsychologiqueMere'));

            //Récupérer l'image et la sauvegarder dans un dossier quelconque du serveur

            $utilitaire = new Utilitaire();
            $utilitaire->fileUpload($photoName, 'public/documents/photos');
            $idp = $personnelService->getPaysById($request->getPost('pays'));
            $personnel->setIdPays($idp);
            //profil de l'utilisateur            
            $personnel->setProfil($personnelService->getProfilById($request->getPost('profil')));
            $personnelService->savePersonnel($personnel);
            $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }

        return new ViewModel(
                array('pays' => $personnelService->getAllPays(),
            'profils' => $personnelService->getAllProfils(),
            'personnel' => $personnel,
            'msgEmail' => $msgEmail));
    }

    public function listAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        return new ViewModel(
                array('personnels' => $personnelService->getAll($this->params()->fromRoute('page')),
            'fraternites' => $personnelService->getFraterniteById(7)));
    }

    public function addetudiantAction() {

        $request = $this->getRequest();
        $personnelService = $this->getServiceLocator()->get('personnelService');
        if ($request->isPost()) {

            $personnel = new Personnel();
            //$pays = new Pays(1, 'CAMEROUN', '+237');
            $personnel->setTypePersonnel("Etudiant");
            //$personnel->setIdPays($pays);
            $personnel->setIdService("");
            $personnel->setEcole($request->getPost('ecole'));
            $personnel->setFiliere($request->getPost('filiere'));
            $personnel->setNom($request->getPost('nom'));
            $personnel->setPrenom($request->getPost('prenom'));
            $personnel->setSexe($request->getPost('sexe'));
            $personnel->setDatedenaissance((new DateTime($request->getPost('dateDeNaissance'))));
            $personnel->setLieudenaissance($request->getPost('lieuDeNaissance'));
            $personnel->setGroupeethnique($request->getPost('groupeEthnique'));
            $personnel->setLanguematernelle($request->getPost('langueMaternelle'));
            $personnel->setDomicile($request->getPost('domicile'));
            $personnel->setStPatron((new DateTime($request->getPost('stPatron'))));
            $personnel->setEmail($request->getPost('email'));
            $personnel->setTelephone($request->getPost('telephone'));
            //Nous récupérons le nom du fichier 
            $photoName = $this->params()->fromFiles('photo')['name'];
            $personnel->setPhoto($photoName);
            $personnel->setDateAdmission((new DateTime($request->getPost('dateAdmission'))));
            $personnel->setSuperieur($request->getPost('superieur'));

            //parametres d'authentification
            $personnel->setLogin($request->getPost('nom'));
            $personnel->setPassword($request->getPost('nom'));



            //Informations liées au père de l'étudiant
            $personnel->setNomPere($request->getPost('nomPere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEnViePere($request->getPost('enViePere'));
            $personnel->setOriginPere($request->getPost('originePere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEtatPsychologiquePere($request->getPost('etatPsychologiquePere'));
            $personnel->setTypeMariage($request->getPost('mariage'));
            //Informations relatives à la mère
            $personnel->setNomMere($request->getPost('nomMere'));
            $personnel->setOrigineMere($request->getPost('origineMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEnVieMere($request->getPost('enVieMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEtatPsychologiqueMere($request->getPost('etatPsychologiqueMere'));

            //Récupérer l'image et la sauvegarder dans un dossier quelconque du serveur
            $utilitaire = new Utilitaire();
            $utilitaire->fileUpload($photoName, 'public/documents/photos');

            $idp = $personnelService->getPaysById($request->getPost('pays'));
            $personnel->setIdPays($idp);
            $personnel->setProfil($personnelService->getProfilById(1));
            $personnelService->savePersonnel($personnel);
            $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }

        return new ViewModel(
                array('pays' => $personnelService->getAllPays()));
    }

    public function editpretreAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'accueil'));
        }
        $personnel = $personnelService->getPersonnelById($id);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $personnel->setTypePersonnel("Pretre");
            //$personnel->setIdPays($pays);
            $personnel->setIdService($request->getPost('service'));
            $personnel->setEcole("");
            $personnel->setFiliere("");
            $personnel->setNom($request->getPost('nom'));
            $personnel->setPrenom($request->getPost('prenom'));
            $personnel->setSexe($request->getPost('sexe'));
            $personnel->setDatedenaissance((new DateTime($request->getPost('dateDeNaissance'))));
            $personnel->setLieudenaissance($request->getPost('lieuDeNaissance'));
            $personnel->setGroupeethnique($request->getPost('groupeEthnique'));
            $personnel->setLanguematernelle($request->getPost('langueMaternelle'));
            $personnel->setDomicile($request->getPost('domicile'));
            $personnel->setStPatron((new DateTime($request->getPost('stPatron'))));
            $personnel->setEmail($request->getPost('email'));
            $personnel->setTelephone($request->getPost('telephone'));
            //Nous récupérons le nom du fichier 
            $photoName = $this->params()->fromFiles('photo')['name'];

            $personnel->setDateAdmission((new DateTime($request->getPost('dateAdmission'))));
            $personnel->setSuperieur($request->getPost('superieur'));



            //Informations liées au père de l'étudiant
            $personnel->setNomPere($request->getPost('nomPere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEnViePere($request->getPost('enViePere'));
            $personnel->setOriginPere($request->getPost('originePere'));
            $personnel->setProfessionPere($request->getPost('professionPere'));
            $personnel->setEtatPsychologiquePere($request->getPost('etatPsychologiquePere'));
            $personnel->setTypeMariage($request->getPost('mariage'));



            //Informations relatives à la mère
            $personnel->setNomMere($request->getPost('nomMere'));
            $personnel->setOrigineMere($request->getPost('origineMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEnVieMere($request->getPost('enVieMere'));
            $personnel->setProfessionMere($request->getPost('professionMere'));
            $personnel->setEtatPsychologiqueMere($request->getPost('etatPsychologiqueMere'));

            //Récupérer l'image et la sauvegarder dans un dossier quelconque du serveur
            $utilitaire = new Utilitaire();
            $utilitaire->fileUpload($photoName, 'public/documents/photos');
            $idp = $personnelService->getPaysById($request->getPost('pays'));
            $personnel->setIdPays($idp);
            $personnel->setProfil($personnelService->getProfilById($request->getPost('profil')));
            $personnelService->editPersonnel($personnel);
            $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }
        return new ViewModel(
                array('personnels' => $personnels = $personnel,
            'pays' => $personnelService->getAllPays(),
            'profils' => $personnelService->getAllProfils()));
    }

    public function listpretreAction() {

        $personnelService = $this->getServiceLocator()->get('personnelService');
        return new ViewModel(
                array('pretres' => $personnelService->getAllListPretres()));
    }

    public function listetudiantAction() {

        $personnelService = $this->getServiceLocator()->get('personnelService');
        return new ViewModel(
                array('pretres' => $personnelService->getAllListEtudiants()));
    }

    public function deleteAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }
        $personnel = $personnelService->getPersonnelById($id);
        $personnel->setStatut(2);
        $personnelService->editPersonnel($personnel);

        return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
    }

}
