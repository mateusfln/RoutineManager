<?php

namespace RoutineManager\Model;

class Tarefa {

    public $id;
    public $titulo;
    public $descricao;
    public $status;
    public $dataHoraInicio;
    public $dataHoraFim;
    public $usuario;
    
    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->titulo = (isset($data['titulo'])) ? $data['titulo'] : null;
        $this->descricao = (isset($data['descricao'])) ? $data['descricao'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
        $this->dataHoraInicio = (isset($data['dataHoraInicio'])) ? $data['dataHoraInicio'] : null;
        $this->dataHoraFim = (isset($data['dataHoraFim'])) ? $data['dataHoraFim'] : null;
        $this->usuario = (isset($data['usuario'])) ? $data['usuario'] : null;
    }
    
}
