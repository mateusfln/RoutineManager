<?php

namespace RoutineManager;

return array(
    'controllers' => array(
        'invokables' => array(
            'RoutineManager\Controller\Index' => 'RoutineManager\Controller\IndexController',
            'rm-admin/auth' => 'RoutineManagerAdmin\Controller\AuthController',
            'tarefas' => 'RoutineManagerAdmin\Controller\TarefasController',
            'usuarios' => 'RoutineManagerAdmin\Controller\UsuariosController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'routinemanager-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'RoutineManager\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'routinemanager-admin-interna' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action]][/:id]',
                    'constraints' => array(
                        'id'=> '[0-9]+'
                    )
                ),
            ),
            'routinemanager-admin' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action][/page/:page]]',
                    'defaults' => array(
                        'action' => 'index',
                        'page' => 1
                    ),
                ),
            ),
            'routinemanager-admin-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/auth',
                    'defaults' => array(
                        'action' => 'index',
                        'controller'=>'rm-admin/auth'
                    ),
                ),
            ),
            'routinemanager-admin-logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/auth/logout',
                    'defaults' => array(
                        'action' => 'logout',
                        'controller'=>'rm-admin/auth'
                    ),
                ),
            ),
        ),
    ),
    'module_layouts' => array(
      'RoutineManager' => 'layout/layout',
      'RoutineManagerAdmin' => 'layout/layout-admin'
    ),
    'view_helpers' => [
        'invokables' => [
            'UserIdentity' => \RoutineManager\View\Helper\UserIdentity::class
        ],
    ],
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'routine-manager/index/index' => __DIR__ . '/../view/routine-manager/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);