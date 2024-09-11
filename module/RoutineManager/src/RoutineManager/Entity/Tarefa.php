<?php

namespace RoutineManager\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tarefas")
 * @ORM\Entity(repositoryClass="RoutineManager\Entity\TarefaRepository")
 */
class Tarefa {

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
    protected $titulo;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $descricao;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="RoutineManager\Entity\Tarefa", inversedBy="usuario")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function toArray() {
        return array(
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
            'status' => $this->getStatus(),
            'usuarioId' => $this->getUsuario()->getId(),
        );
    }

}
