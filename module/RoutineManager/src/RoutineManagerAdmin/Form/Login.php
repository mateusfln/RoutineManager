<?php

namespace RoutineManagerAdmin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Login extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('usuario');
        $this->setAttribute('method', 'post');

        
        $this->add([
            'name' => 'email',
            'type' => Element\Email::class,
            'options' => [
                'label' => 'Email',
            ],
            'attributes' => [
                'placeholder' => 'Digite seu email',
                'required' => true,
                'class' => 'form-control'
            ],
        ]);

        
        $this->add([
            'name' => 'password',
            'type' => Element\Password::class,
            'options' => [
                'label' => 'Senha',
            ],
            'attributes' => [
                'placeholder' => 'Digite sua senha',
                'required' => true, 
                'class' => 'form-control'
            ],
        ]);

        
        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Login',
                'class' => 'btn btn-success', 
            ],
        ]);
    }
}
