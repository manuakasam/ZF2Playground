<?php
namespace FormDependencies;

return array(
    'controllers'  => array(
        'invokables' => array(
            'formdependencies-controller-formcontroller' => 'FormDependencies\Controller\FormController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'form-dba-action'   => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form-dba-action',
                    'defaults' => array(
                        'controller' => 'formdependencies-controller-formcontroller',
                        'action'     => 'formDbAdapter',
                    ),
                ),
            ),
            'form-table-action' => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form-table-action',
                    'defaults' => array(
                        'controller' => 'formdependencies-controller-formcontroller',
                        'action'     => 'formTable',
                    ),
                ),
            ),
            'form-doctrine-action' => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/form-doctrine-action',
                    'defaults' => array(
                        'controller' => 'formdependencies-controller-formcontroller',
                        'action'     => 'formDoctrine',
                    ),
                ),
            ),
        ),
    ),
    'doctrine'     => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'filesystem',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default'             => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);