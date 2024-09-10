<?php

namespace RoutineManager\Model;

class Tarefa {

    public $id;
    public $titulo;
    public $descricao;
    public $status;
    //public $usuarioId;
    public $createdAt;
    public $updatedAt;
    
    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->titulo = (isset($data['titulo'])) ? $data['titulo'] : null;
        $this->descricao = (isset($data['descricao'])) ? $data['descricao'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
        //$this->usuario->setId() = (isset($data['usuarioId'])) ? $data['usuarioId'] : null;
        $this->createdAt = (isset($data['createdAt'])) ? $data['createdAt'] : null;
        $this->updatedAt = (isset($data['updatedAt'])) ? $data['updatedAt'] : null;
    }
    
}
