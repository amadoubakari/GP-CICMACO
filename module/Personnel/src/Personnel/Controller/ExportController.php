<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Controller;

/**
 * Description of ExportController
 *
 * @author AMADOU BAKARI
 */
use Zend\Mvc\Controller\AbstractActionController;
use Personnel\Utilitaires\MyTCPDF;

session_start();

class ExportController extends AbstractActionController {

    public function exportpdfAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $personnel = $personnelService->getPersonnelById($this->params()->fromRoute('id'));
        $pdf = new MyTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('' . $personnel->getNom());
        $pdf->SetTitle('Document for example');
        $pdf->SetSubject('please am i sorry');
        $pdf->SetKeywords('we are on monday 14 september 2015');

        // set default header data
       // $pdf->SetHeaderData('logo_cicm.png', 18, ' MISSIONNAIRES DU CŒUR IMMACULE DE MARIE CICM', '      Congrega                   ', array(55, 117, 221), array(55, 117, 221));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(15);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------
        // set font
        $pdf->SetFont('times', '', 10);

        // add a page
        $pdf->AddPage();
        // Image example with resizing
        //$pdf->Image('images/image_demo.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

        /* NOTE:
         * *********************************************************
         * You can load external XHTML using :
         *
         * $html = file_get_contents('/path/to/your/file.html');
         *
         * External CSS files will be automatically loaded.
         * Sometimes you need to fix the path of the external CSS.
         * *********************************************************
         */
        //$pdf->Image('images/marie.jpg', 0, 0, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
        // $pdf->writeHTMLCell(100, 50, 10, 10, '<img src="images/marie.jpg" style="width:100px; heigh:100px');
        // define some HTML content with style
        $html = '<br><br><label style="font-weight:bold">&nbsp;Nom :</label>&nbsp;' . $personnel->getNom() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Prénom : </label>&nbsp;' . $personnel->getPrenom() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Statut :</label>&nbsp;' . $personnel->getTypePersonnel() . '  [' . $personnel->getIdService() . '  ' . $personnel->getEcole() . '  ' . $personnel->getFiliere() . ']<br><br>' .
                '<label style="font-weight:bold">&nbsp;Domicilié à : </label>&nbsp;' . $personnel->getDomicile() . '<br><br>';
        if ($personnel->getTypePersonnel() == "Pretre") {
            $html = $html . '<label style="font-weight:bold">&nbsp;En service dans : </label>&nbsp;' . $personnel->getIdService() . '<br><br>';
        } else {
            $html = $html . '<label style="font-weight:bold">&nbsp;Ecole : </label>&nbsp;' . $personnel->getEcole() . '<br><br>' .
                    '<label style="font-weight:bold">&nbsp;Filière : </label>&nbsp;' . $personnel->getFiliere() . '<br><br>';
        }


        $html = $html . '<label style="font-weight:bold">&nbsp;Pays : </label>&nbsp;' . $personnel->getIdPays()->getNom() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Né le: </label>&nbsp;' . $personnel->getDateDeNaissance()->format('d/m/Y') . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Lieu de naissance: </label>&nbsp;' . $personnel->getLieuDeNaissance() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Groupe Ethnique : </label>&nbsp;' . $personnel->getGroupeEthnique() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Langue Maternelle: </label>&nbsp;' . $personnel->getLangueMaternelle() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Saint patron : </label>&nbsp;' . $personnel->getStPatron()->format('d/m/Y') . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Adresse Email : </label>&nbsp;' . $personnel->getEmail() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Date d\'admission: </label>&nbsp;' . $personnel->getDateAdmission()->format('d/m/Y') . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Encadreur: </label>&nbsp;' . $personnel->getSuperieur() . '<br><br>' .
                '<label style="font-weight:bold; text-align:center">Informations liées au père </label><br><br>' .
                '<label style="font-weight:bold">&nbsp;Nom du père: </label>&nbsp;' . $personnel->getNomPere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Origine du père: </label>&nbsp;' . $personnel->getOriginPere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Profession: </label>&nbsp;' . $personnel->getProfessionPere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Est en vie ? : </label>&nbsp;' . $personnel->getEnViePere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Type de mariage: </label>&nbsp;' . $personnel->getTypeMariage() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Etat psychologique : </label>&nbsp;' . $personnel->getEtatPsychologiquePere() . '<br><br>' .
                '<label style="font-weight:bold; text-align:center">Informations liées à la mère </label><br><br>' .
                '<label style="font-weight:bold">&nbsp;Nom de la mère: </label>&nbsp;' . $personnel->getNomMere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Origine de la mère: </label>&nbsp;' . $personnel->getOrigineMere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Profession: </label>&nbsp;' . $personnel->getProfessionMere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Est en vie ? : </label>&nbsp;' . $personnel->getEnVieMere() . '<br><br>' .
                '<label style="font-weight:bold">&nbsp;Etat psychologique : </label>&nbsp;' . $personnel->getEtatPsychologiqueMere() . '<br><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
        // move pointer to last page
        //$pdf->SetXY(-100, -100);
        $pdf->Image('C:\xampp\htdocs\GP-CICM\public\documents\photos\\' . $personnel->getPhoto(), 165, 30, 30, 30, NULL, 'http://localhost/GP-CICM/public', '', true, 150, '', false, false, 1, false, false, false);
        $pdf->lastPage();

        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output($personnel->getNom() . ' ' . $personnel->getPrenom(), 'D');

        //============================================================+
        // END OF FILE
        //============================================================+


        return new ViewModel();
    }

    public function listepersonnelsAction() {
        $personnelService = $this->getServiceLocator()->get('personnelService');
        $personnels = $personnelService->getListPersonnels();
        $pdf = new MyTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('Document for example');
        $pdf->SetSubject('please am i sorry');
        $pdf->SetKeywords('we are on monday 14 september 2015');

        // set default header data
        $pdf->SetHeaderData('logo_cicm.png', 18, '                CICM-ACO (Coeur Immaculé Marie de l\'Afrique Centrale et de l\'Ouest)', '                                             Liste de personnels', array(55, 117, 221), array(55, 117, 221));


        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(15);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------
        // set font
        $pdf->SetFont('times', '', 10);

        $pdf->AddPage();

        /* NOTE:
         * *********************************************************
         * You can load external XHTML using :
         *
         * $html = file_get_contents('/path/to/your/file.html');
         *
         * External CSS files will be automatically loaded.
         * Sometimes you need to fix the path of the external CSS.
         * *********************************************************
         */

        // define some HTML content with style
        $html = '
			<table class="first" cellpadding="1" cellspacing="1">
			 <tr class="active" style="background-color: #D6EBFF">
				<th style="width:75">Nom</th>
				<th style="width:75">Pr&eacute;nom</th>				
				<th style="width:75">T&eacute;l&eacute;phone</th>
				<th style="width:145">Adresse Email</th>
                                <th style="width:60">Statut</th>
                                <th style="width:80">Supérieur</th>                                
				<th style="width:120">Ecole/Commission</th>
			</tr>
		   '

        ;

        $content = '';
        foreach ($personnels as $personnel) {
            $chaine = '<tr>
				<td style="width:75">' . $personnel->getNom() . '</td>
				<td style="width:75">' . $personnel->getPrenom() . '</td>				
				<td style="width:75">' . $personnel->getTelephone() . '</td>
				<td style="width:145">' . $personnel->getEmail() . '</td>
                                <td style="width:60">' . $personnel->getTypePersonnel() . '</td>
                                <td style="width:80">' . $personnel->getSuperieur() . '</td>
                                <td style="width:120">' . $personnel->getIdService() . '' . $personnel->getEcole() . '</td>
			</tr>';
            $content = $content . $chaine;
        }
        $html = $html . $content . '</table>';




        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output('Liste de personnels du CICM-ACO.pdf', 'D');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function modeleAction() {
        $pdf = new MyTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CICM - ACO');
        $pdf->SetTitle('Modele de fichiers du CICMACO ');
        $pdf->SetSubject('Modele de fichiers du CICM-ACO');
        $pdf->SetKeywords('we are on monday 14 september 2015');

        // set default header data
        $pdf->SetHeaderData('logo_cicm.png', 18, '                               CICM-ACO', '                  Coeur Immaculé Marie de l\'Afrique Centrale et de l\'Ouest', array(55, 117, 221), array(55, 117, 221));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(15);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------
        // set font
        $pdf->SetFont('times', '', 10);

        // add a page
        $pdf->AddPage();
        //Close and output PDF document
        $pdf->Output('Modele de fichier du CICM-ACO', 'D');

        //============================================================+
        // END OF FILE
        //============================================================+


        return new ViewModel();
    }

}
