<?php
namespace Diocese\Form;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



use Zend\Form\Form;

class DioceseForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('diocese');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'idDiocese',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nom',
            ),
        ));
        $this->add(array(
            'name' => 'telephone',
            'attributes' => array(
                'type'  => 'integer',
            ),
            'options' => array(
                'label' => 'Telephone',
            ),
        ));
        $this->add(array(
            'name' => 'adresse',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Adresse',
            ),
        ));
        $this->add(array(
            'name' => 'recteur',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Recteur',
            ),
        ));
        $this->add(array(
            'name' => 'econome',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Econome',
            ),
        ));
         $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'idSecteur',
            'attributes' => array(
                'type'  => 'integer',
            ),
            'options' => array(
                'label' => 'Secteur',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
