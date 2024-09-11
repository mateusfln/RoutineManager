<?php

namespace RoutineManagerAdmin\Form;

use DoctrineORMModule\Options\EntityManager;
use Zend\Form\Form,
    Zend\Form\Element,
    Zend\Form\Element\Select;

class Tarefa extends Form {
    
    protected $usuarios;

    public function __construct($name = null, array $usuarios = null) {
        parent::__construct('tarefa');
        $this->usuarios = $usuarios;

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new TarefaFilter);

        $usuario = new Select();
        
        $usuario->setLabel("Usuario")
                ->setName("usuario")
                ->setOptions(array('value_options' => $this->usuarios)
        );
        $this->add($usuario);

        $this->add(array(
            'name' => 'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'titulo',
            'options' => array(
                'type' => 'text',
                'label' => 'Título'
            ),
            'attributes' => array(
                'id' => 'titulo',
                'placeholder' => 'Entre com o titulo'
            )
        ));
        
        $this->add(array(
            'name' => 'descricao',
            'options' => array(
                'type' => 'text',
                'label' => 'Descrição'
            ),
            'attributes' => array(
                'id' => 'descricao',
                'placeholder' => 'Entre com a Descrição'
            ),
        ));
        
        $this->add(array(
            'name' => 'status',
            'options' => array(
                'type' => 'text',
                'label' => 'Status da tarefa'
            ),
            'attributes' => array(
                'id' => 'status',
                'placeholder' => 'Defina o status da tarefa'
            ),
        ));

        $this->add(array(
            'name' => 'dataHoraInicio',
            'type' => Element\Date::class,
            'options' => array(
                'label' => 'Data de inicio: ',
                'format' => 'Y-m-d'
            ),
            'attributes' => array(
                'id' => 'dataHoraInicio',
                'placeholder' => 'Defina a data de inicio da tarefa'
            ),
        ));

        $this->add(array(
            'name' => 'dataHoraFim',
            'type' => Element\Date::class,
            'options' => array(
                'label' => 'Data do fim: ',
                'format' => 'Y-m-d'
            ),
            'attributes' => array(
                'id' => 'dataHoraFim',
                'placeholder' => 'Defina a data do fim da tarefa'
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }

}
