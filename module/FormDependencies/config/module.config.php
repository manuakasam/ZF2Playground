<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'formdependencies-controller-formcontroller' => 'FormDependencies\Controller\FormController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'form-dba-action' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form-dba-action',
                    'defaults' => array(
                        'controller' => 'formdependencies-controller-formcontroller',
                        'action'     => 'formDbAdapter',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);