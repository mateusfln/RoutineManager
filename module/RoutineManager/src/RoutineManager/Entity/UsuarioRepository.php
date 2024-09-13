<?php

namespace RoutineManager\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository {

    public function findByEmailAndPassword($email, $password) {
        $user = $this->findOneByEmail($email);
        if ($user) {
            $hashSenha = $user->encryptPassword($password);
           // var_dump($hashSenha );die;

            if ($hashSenha == $user->getPassword()) {
                return $user;
            }
            else
                return false;
        }
        else
            return false;
    }

    public function fetchPairs()
    {
        $entities = $this->findAll();
        $array = array();

        foreach ($entities as $entity){
            $array[$entity->getId()] = $entity->getNome();
        }
        return $array;
    }
}
