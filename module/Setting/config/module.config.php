<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setting;

return array(
    'controllers' => array(
        'invokables' => array(
            'Setting\Controller\Setting' => 'Setting\Controller\SettingController',
            'Setting\Controller\Pays' => 'Setting\Controller\PaysController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'setting' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/Setting/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Setting\Controller',
                        'controller' => 'Pays',
                        'action' => 'list',
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
                                'id' => '[0-9]*',
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
            'setting' => __DIR__ . '/../view'
        ),
        'display_exceptions' => true,
    ),
    //gestion d'injection de dependance
    'service_manager' => array(
        'abstract_factories' => array(
        // Valid values include names of classes implementing
        // AbstractFactoryInterface, instances of classes implementing
        // AbstractFactoryInterface, or any PHP callbacks
        //'SomeModule\Service\FallbackFactory',
        ),
        'aliases' => array(
        // Aliasing a FQCN to a service name
        //'Application\Entity\User' => 'user',
        'Setting\Service\IPaysService' => 'paysService',
        // Aliasing a name to a known service name
        //'AdminUser' => 'User',
        // Aliasing to an alias
        //'SuperUser' => 'AdminUser',
        ),
        'factories' => array(
        // Keys are the service names.
        // Valid values include names of classes implementing
        // FactoryInterface, instances of classes implementing
        // FactoryInterface, or any PHP callbacks
        'paysService' => 'Setting\Service\Factory\PaysServiceFactory',
        //'UserForm' => function ($serviceManager) {
        // $form = new SomeModule\Form\User();
        // Retrieve a dependency from the service manager and inject it!
        //$form->setInputFilter($serviceManager->get('UserInputFilter'));
        //return $form;
        //},
        ),
        'invokables' => array(
        // Keys are the service names
        // Values are valid class names to instantiate.
        //'UserInputFilter' => 'SomeModule\InputFilter\User',
        ),
        'services' => array(
        // Keys are the service names
        // Values are objects
        //'Auth' => new SomeModule\Authentication\AuthenticationService(),
        ),
        'shared' => array(
        // Usually, you'll only indicate services that should **NOT** be
        // shared -- i.e., ones where you want a different instance
        // every time.
        //'userService' => true,
        ),
    ),
);
