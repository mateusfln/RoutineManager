<?php

namespace RoutineManager\Service;

use Doctrine\ORM\EntityManager;
use RoutineManager\Entity\Configurator;

class Usuario extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "RoutineManager\Entity\Usuario";
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);

        if (empty($data['password']))
            unset($data['password']);

        $entity = Configurator::configure($entity, $data);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

}
