<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth;

return array(
    'controllers' => array(
        'invokables' => array(
            'Auth\Controller\Login' => 'Auth\Controller\LoginController',
            'Auth\Controller\Profil' => 'Auth\Controller\ProfilController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/Auth/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Auth\Controller',
                        'controller' => 'Login',
                        'action' => 'login',
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
            'auth' => __DIR__ . '/../view'
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
            'Auth\Service\IAuthService' => 'authService',
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
            'authService' => 'Auth\Service\ServiceFactory\AuthServiceFactory',
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
