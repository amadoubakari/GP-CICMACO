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

namespace Fraternite;

return array(
    'controllers' => array(
        'invokables' => array(
            'Fraternite\Controller\Fraternite' => 'Fraternite\Controller\FraterniteController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'fraternite' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/Fraternite/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Fraternite\Controller',
                        'controller' => 'Fraternite',
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
            'fraternite' => __DIR__ . '/../view'
        ),
        'display_exceptions' => true,
    ),
    'service_manager' => array(
        'factories' => array(
            'Fraternite\Service\FraterniteService' => 'Fraternite\Service\Factory\FraterniteServiceFactory'
        ),
    ),
);
