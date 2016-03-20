<?php

namespace Document\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DocumentController
 *
 * @author dikoue
 */
use Application\Entity\Document;
use Zend\Validator\File\Size;
use Zend\File\Transfer\Adapter\Http;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

session_start();

class DocumentController extends AbstractActionController {

    //put your code here
    public function indexAction() {
        $documentService = $this->getServiceLocator()->get('Document\Service\DocumentService');
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }
        $personnel = $personnelService->getPersonnelById($id);
        $documents = $documentService->getDocumentsByIdPersonnel($personnel->getIdPersonnel(), $this->params()->fromRoute('page'));

        return new ViewModel(
                array('documents' => $documents));
    }

    public function addAction() {
        $errorDocument = "";
        $request = $this->getRequest();
        $documentService = $this->getServiceLocator()->get('Document\Service\DocumentService');
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toRoute('personnel/default', array('controller' => 'personnel', 'action' => 'list'));
        }

        $personnel = $personnelService->getPersonnelById($id);
        $document = new Document();
        if ($request->isPost()) {
            $document->setDescription($request->getPost('description'));
            $fichier = $this->params()->fromFiles('photo')['name'];
            $document->setType($request->getPost('type'));
            $document->setIdPersonnel($personnel);
            if ($fichier != NULL && $fichier !== "") {
                $document->setFichier($fichier);
                $size = new Size(array('min' => 10)); //minimum bytes filesize
                $adapter = new Http();
                $adapter->setValidators(array($size), $fichier);
                if (!$adapter->isValid()) {
                    $dataError = $adapter->getMessages();
                    $error = array();
                    foreach ($dataError as $key => $row) {
                        $error[] = $row;
                    }
                    $form->setMessages(array('image' => $error));
                } else {
                    $adapter->setDestination('public/documents/officiels');
                    if ($adapter->receive($fichier)) {
                        //echo $fichier . '\' successfully uploaded';
                    }
                }
                $documentService->saveDocument($document);
                $this->redirect()->toRoute('document/default', array('controller' => 'document', 'action' => 'index', 'id' => $personnel->getIdPersonnel()));
            } else {
                $errorDocument = "Veuillez charger le documenet svp !!!";
            }
        }
        return new ViewModel(
                array('personnels' => $documentService->getAllPersonnels(),
            'errorDocument' => $errorDocument,
            'document' => $document,
            'personnel' => $personnel
        ));
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}
