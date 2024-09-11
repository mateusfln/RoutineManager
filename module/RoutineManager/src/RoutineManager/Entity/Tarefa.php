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
     * @ORM\Column(type="datetime")
     * @var \Datetime
     */
    protected $dataHoraInicio;

    /**
     * @ORM\Column(type="datetime")
     * @var \Datetime
     */
    protected $dataHoraFim;

    /**
     * @ORM\ManyToOne(targetEntity="RoutineManager\Entity\Usuario", inversedBy="tarefa")
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

    public function getDataHoraInicio() {
        return $this->dataHoraInicio;
    }

    public function setDataHoraInicio($dataHoraInicio) {
        $this->dataHoraInicio = $dataHoraInicio;
    }

    public function getDataHoraFim() {
        return $this->dataHoraFim;
    }

    public function setDataHoraFim($dataHoraFim) {
        $this->dataHoraFim = $dataHoraFim;
    }

    public function toArray() {
        return array(
            'id' => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao(),
            'status' => $this->getStatus(),
            'dataHoraInicio' => $this->getDataHoraInicio(),
            'dataHoraFim' => $this->getDataHoraFim(),
            'usuario_id' => $this->getUsuario()->getId(),
        );
    }

}
