<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of module
 *
 * @author dikoue
 */

namespace Evenement;

return array(
    'controllers' => array(
        'invokables' => array(
            'Evenement\Controller\Evenement' => 'Evenement\Controller\EvenementController',
            'Evenement\Controller\EventAjax' => 'Evenement\Controller\EventAjaxController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'evenement' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/Evenement/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Evenement\Controller',
                        'controller' => 'Evenement',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'evenement' => __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy'),
        'display_exceptions' => true,
    ),
    'service_manager' => array(
        'factories' => array(
            'Evenement\Service\EvenementService' => 'Evenement\Service\Factory\EvenementServiceFactory'
        ),
    ),
);
