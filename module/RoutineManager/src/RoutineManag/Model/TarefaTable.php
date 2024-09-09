<?php

namespace RoutineManager\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class TarefaTable extends AbstractTableGateway {
    
    protected $table = "tarefas";
    
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Tarefa());
        $this->initialize();
    }
    
}
