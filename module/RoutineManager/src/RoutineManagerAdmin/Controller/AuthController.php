<?php

namespace RoutineManagerAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

use RoutineManagerAdmin\Form\Login as LoginForm;

class AuthController extends AbstractActionController {

    public function indexAction() {

        $form = new LoginForm;
        $error = false;
        $request = $this->getRequest();
        // echo '<pre/>';
        // var_dump($request);
        // var_dump($form);
        // die;
        if ($request->isPost()) {
            $form->setData($request->getPost()->toArray());
            if ($form->isValid()) {
                $data = $request->getPost()->toArray();

                $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $sessionStorage = new SessionStorage("RoutineManagerAdmin");
                $auth->setStorage($sessionStorage);

                $authAdapter = $this->getServiceLocator()->get('RoutineManager\Auth\Adapter');
                $authAdapter->setUsername($data['email'])
                        ->setPassword($data['password']);
                
                // echo '<pre>';
                // var_dump($auth->authenticate($authAdapter));
                // die;
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $sessionStorage->write($auth->getIdentity()['user'], null);

                    return $this->redirect()->toRoute("routinemanager-admin", array('controller' => 'index'));
                }else
                    $error = true;
            }
        }
        
        return new ViewModel(array('form'=>$form,'error'=>$error));
    }
    
    public function logoutAction() {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage('RoutineManagerAdmin'));
        $auth->clearIdentity();
        
        return $this->redirect()->toRoute('routinemanager-admin-auth');
    }

}