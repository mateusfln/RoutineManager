<?php

namespace RoutineManager\Model;

class TarefasService {

    /**
     * @var RoutineManager\Model\TarefaTable
     */
    protected $tarefaTable;
    
    public function __construct(TarefaTable $table) {
        $this->tarefaTable = $table;
    }
    
    public function fetchAll() {
        $resultSet = $this->tarefaTable->select();
        return $resultSet;
    }
    
}
