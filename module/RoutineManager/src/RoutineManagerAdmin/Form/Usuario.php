<?php

namespace RoutineManagerAdmin\Form;

use Zend\Form\Form;

class Usuario extends Form {
    
    public function __construct($name = null) {
        parent::__construct('usuario');
        
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new UsuarioFilter);
        
        $this->add(array(
           'name' =>'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));
        
        $this->add(array(
           'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome'
            ),
            'attributes' => array(
                'placeholder' => 'Entre com o nome',
                'class' => 'form-control mb-2',
            )
        ));
        
        $this->add(array(
           'name' => 'email',
            'options' => array(
                'type' => 'email',
                'label' => 'Email'
            ),
            'attributes' => array(
                'placeholder' => 'Entre com o email',
                'class' => 'form-control mb-2',
            )
        ));

        $this->add(array(
           'name' => 'password',
            'options' => array(
                'type' => 'Password',
                'label' => 'Senha'
            ),
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control mb-2',
            )
        ));
        
        $this->add(array(
           'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success bg-success form-control mb-2',
            )
        ));
    }
}
