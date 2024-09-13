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

        $entity = new \RoutineManager\Entity\Tarefa();
        $entity->setTitulo($data['titulo']);
        $entity->setDescricao($data['descricao']);
        $entity->setStatus($data['status']);
        $entity->setDataHoraInicio(new \DateTime($data['dataHoraInicio']));
        $entity->setDataHoraFim(new \DateTime($data['dataHoraFim']));

        // var_dump($entity);die;
        
        $usuario = $this->em->getReference("RoutineManager\Entity\Usuario", $data['usuario_id']);
        // var_dump($usuario);die;
        $entity->setUsuario($usuario);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
        
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);

        $entity->setTitulo($data['titulo']);
        $entity->setDescricao($data['descricao']);
        $entity->setStatus($data['status']);
        $entity->setDataHoraInicio(new \DateTime($data['dataHoraInicio']));
        $entity->setDataHoraFim(new \DateTime($data['dataHoraFim']));
        $usuario = $this->em->getReference("RoutineManager\Entity\Usuario", $data['usuario_id']);
        $entity->setUsuario($usuario);
        // var_dump($entity);die;

        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}
