<?php

namespace RoutineManager;

use Zend\Mvc\ModuleRouteListener,
    Zend\Mvc\MvcEvent,
    Zend\ModuleManager\ModuleManager;
use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;
use RoutineManager\Model\TarefaTable;
use RoutineManager\Service\Tarefa as TarefaService;
use RoutineManager\Service\Usuario as UsuarioService;
use RoutineManager\Auth\Adapter as AuthAdapter;
use RoutineManagerAdmin\Form\Tarefa as TarefaFrm;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ . 'Admin' => __DIR__ . '/src/' . __NAMESPACE__ . "Admin",
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap($e) {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
                    $controller = $e->getTarget();
                    $controllerClass = get_class($controller);
                    $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                    $config = $e->getApplication()->getServiceManager()->get('config');
                    if (isset($config['module_layouts'][$moduleNamespace])) {
                        $controller->layout($config['module_layouts'][$moduleNamespace]);
                    }
                }, 98);
    }

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        
        $sharedEvents->attach("Zend\Mvc\Controller\AbstractActionController", 
                MvcEvent::EVENT_DISPATCH,
                array($this,'validaAuth'),100);
    }
    
    public function validaAuth($e)
    {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage('RoutineManager'));
        
        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
        //var_dump($auth->getIdentity());die;
        
        if (!$auth->hasIdentity() and ($matchedRoute == "routinemanager-admin")) {
            return $controller->redirect()->toRoute("routinemanager-admin-auth");
        }
    }

    public function getServiceConfig() {

        return array(
            'factories' => array(
                'RoutineManager\Model\TarefaService' => function($service) {
                    $dbAdapter = $service->get('Zend\Db\Adapter\Adapter');
                    $tarefaTable = new TarefaTable($dbAdapter);
                    $tarefaService = new Model\TarefaService($tarefaTable);
                    return $tarefaService;
                },
                'RoutineManager\Service\Tarefa' => function($service) {
                    return new TarefaService($service->get('Doctrine\ORM\EntityManager'));
                },
                'RoutineManager\Service\Usuario' => function($service) {
                    return new UsuarioService($service->get('Doctrine\ORM\EntityManager'));
                },
                'RoutineManagerAdmin\Form\Tarefa' => function($service) {
                    $em = $service->get('Doctrine\ORM\EntityManager');
                    $repository = $em->getRepository('RoutineManager\Entity\Usuario');
                    $usuarios = $repository->fetchPairs();
                    return new TarefaFrm(null, $usuarios);
                },
                'RoutineManager\Auth\Adapter' => function($service) {
                    return new AuthAdapter($service->get('Doctrine\ORM\EntityManager'));
                },
            ),
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity()
            ) 
        );
    }
}