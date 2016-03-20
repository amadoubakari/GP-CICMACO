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
return array(
    'controllers' => array(
        'invokables' => array(
            'Diocese\Controller\Diocese' => 'Diocese\Controller\DioceseController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'diocese' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/diocese[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Diocese\Controller\Diocese',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'diocese' => __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
    'factories' => array(
        'Diocese\Service\DioceseService' => 'Diocese\Service\Factory\DioceseServiceFactory'
    )
),
);
