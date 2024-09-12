<?php

namespace RoutineManager\Service;

use Doctrine\ORM\EntityManager;
use RoutineManager\Entity\Configurator;

class Tarefa extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "RoutineManager\Entity\Tarefa";
    }
    
    public function insert(array $data) {
        $entity = new $this->entity($data);
        
        $usuario = $this->em->getReference("RoutineManager\Entity\Usuario", $data['usuario']);
        $entity->setUsuario($usuario);
        //var_dump($entity);die;
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
        
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        $entity = Configurator::configure($entity,$data);
        
        $usuario = $this->em->getReference("RoutineManager\Entity\Usuario", $data['usuario']);
        $entity->setUsuario($usuario);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}
