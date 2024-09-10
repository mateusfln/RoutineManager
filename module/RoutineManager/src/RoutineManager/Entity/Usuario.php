<?php

namespace RoutineManager\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuarios")
 * @ORM\Entity(repositoryClass="RoutineManager\Entity\UsuarioRepository")
 */
class Usuario {

    /**
     * @ORM\OneToMany(targetEntity="RoutineManager\Entity\Tarefa", mappedBy="usuario")
     * @var Tarefa[]
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
    protected $senha;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $salt;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->tarefas = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $this->encryptPassword($senha);
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function encryptPassword($senha) {
        $hashSenha = hash('sha512', $senha . $this->salt);
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
            'password' => $this->getSenha(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s'),
        );
    }
}
