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
                ->setAttributes(array('class' => 'form-select mb-2'))
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
                'class' => 'form-control mb-2',
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
                'class' => 'form-control mb-2',
                'id' => 'descricao',
                'placeholder' => 'Entre com a Descrição'
            ),
        ));
        
        $this->add([
            'type' => Element\Checkbox::class,
            'name' => 'status',
            'options' => [
                'label' => 'Feita',
                'value' => 1
            ],
            'attributes' => array(
                'class' => 'form-check-input mb-2',
            )
        ]);

        $this->add(array(
            'name' => 'dataHoraInicio',
            'type' => Element\Date::class,
            'options' => array(
                'label' => 'Data de inicio: ',
                'format' => 'Y-m-d'
            ),
            'attributes' => array(
                'class' => 'form-control mb-2',
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
                'class' => 'form-control mb-2',
                'id' => 'dataHoraFim',
                'placeholder' => 'Defina a data do fim da tarefa'
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success form-control bg-success'
                )
        ));
    }

}
