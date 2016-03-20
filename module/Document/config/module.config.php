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
            'Document\Controller\Document' => 'Document\Controller\DocumentController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'document' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/Document/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Document\Controller',
                        'controller' => 'Document',
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
                    'paginator-doctrine' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[page/:page]',
                            'constraints' => array(
                                'page' => '[0-9]*',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'Document\Controller',
                                'controller' => 'Document',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'document' => __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Document\Service\DocumentService' => 'Document\Service\Factory\DocumentServiceFactory'
        )
    ),
);
