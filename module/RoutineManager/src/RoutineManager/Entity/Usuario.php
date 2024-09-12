<?php

namespace RoutineManager\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="RoutineManager\Entity\UsuarioRepository")
 */
class Usuario {


    public function __construct($options = null) {
        Configurator::configure($this, $options);
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->tarefas = new ArrayCollection();
    }
    /**
     * @ORM\OneToMany(targetEntity="RoutineManager\Entity\Tarefa", mappedBy="usuario")
     */
    private $tarefas;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $salt;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $this->encryptPassword($password);
        return $this;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getTarefas()
    {
        return $this->tarefas;
    }

    public function encryptPassword($password) {
        $hashSenha = hash('sha512', $password . $this->salt);
        for ($i = 0; $i < 64000; $i++) {
            $hashSenha = hash('sha512', $hashSenha);
        }
        return $hashSenha;
    }

    public function toArray() {
        return array(
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'salt' => $this->salt,
            'tarefas' => $this->getTarefas()
        );
    }
}
