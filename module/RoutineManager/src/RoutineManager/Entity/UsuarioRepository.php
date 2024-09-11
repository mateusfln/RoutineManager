<?php

namespace RoutineManager\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository {

    public function findByEmailAndPassword($email, $senha) {

        $usuario = $this->findOneByEmail($email);
        if ($usuario) {
            $hashSenha = $usuario->encryptPassword($senha);

            if ($hashSenha == $usuario->getSenha()) {
                return $usuario;
            }
            else
                return false;
        }
        else
            return false;
    }

}
