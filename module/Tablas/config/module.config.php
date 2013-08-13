<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'indexcontroller' => __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'indexcontroller' => 'Tablas\Controller\IndexController',
        ),//fgjghjfghj
    ),
    'router' => array(
        'routes' => array(
            'indexcontroller' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/tablas',
                    'defaults' => array(
                        'controller' => 'indexcontroller',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(                  
                ),
            ),
        ),
    ),
);
