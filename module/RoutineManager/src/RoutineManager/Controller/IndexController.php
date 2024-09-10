<?php

namespace RoutineManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('RoutineManager\Entity\Tarefa');
        
        $tarefas = $repo->findAll();
        
        return new ViewModel(array('tarefas' => $tarefas));

    }

}
