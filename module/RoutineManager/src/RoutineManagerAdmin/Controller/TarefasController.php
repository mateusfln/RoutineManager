<?php

namespace RoutineManagerAdmin\Controller;

use Zend\View\Model\ViewModel;

class TarefasController extends CrudController
{

    public function __construct()
    {
        $this->entity = "RoutineManager\Entity\Tarefa";
        $this->form = "RoutineManagerAdmin\Form\Tarefa";
        $this->service = "RoutineManager\Service\Tarefa";
        $this->controller = "tarefas";
        $this->route = "routinemanager-admin";
    }

    public function newAction()
    {
        
        $form = $this->getServiceLocator()->get($this->form);

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editAction()
    {
        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function calendarioAction()
    {
        if ($this->getRequest()->isPost()) {
            $form = $this->getServiceLocator()->get($this->form);
            $request = $this->getRequest();
            $data = $request->getPost()->toArray();            
            $dataInJson = array_keys($data, 0)[0];
            
            $form->setData(json_decode($dataInJson, true));
                if ($form->isValid()) {
                    $service = $this->getServiceLocator()->get($this->service);
                    $service->insert(json_decode($dataInJson, true));

                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }
        }

        $events = $this->getEm()
            ->getRepository($this->entity)
            ->findAll();

        $users = $this->getEm()
            ->getRepository('RoutineManager\Entity\Usuario')
            ->fetchPairs();

        $eventArray = [];
        foreach ($events as $event) {
            $eventArray[] = [
                'event_id' => $event->getId(),
                'usuario' => $event->getUsuario()->getId(),
                'title' => $event->getTitulo(),
                'start' => $event->getDataHoraInicio()->format('Y-m-d\TH:i:s'),
                'end' => $event->getDataHoraFim()->format('Y-m-d\TH:i:s'),
            ];
        }
        $eventArray = json_encode($eventArray);

        return new ViewModel(array('eventsJson' => $eventArray, 'events' => $events, 'users' => $users));
    }
}
