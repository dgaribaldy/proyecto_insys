<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudRepository")
 */
class Solicitud
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var date
     *
     * @ORM\Column(name="fecha", type="date", length=255)
     */
    private $fecha;

    /**
     * @var Usuario
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="misSolicitudes")
     */
    private $usuarioSolicitante;



    /**
     * @var int
     *
     * @ORM\Column(name="usuario_asignado_id", type="integer")
     *
     */
    private $usuarioasignado;

    /**
     * @var string
     *
     * @ORM\Column(name="campo_afin", type="string", length=255)
     */
    private $campo_afin;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return solicitud
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return solicitud
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param date $fecha
     *
     * @return solicitud
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set usuariosolicitante
     *
     * @param integer $usuariosolicitante
     *
     * @return solicitud
     */
    public function setUsuariosolicitante($usuariosolicitante)
    {
        $this->usuariosolicitante = $usuariosolicitante;

        return $this;
    }

    /**
     * Get usuariosolicitante
     *
     * @return int
     */
    public function getUsuariosolicitante()
    {
        return $this->usuariosolicitante;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return solicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set usuarioAsignado
     *
     * @param integer $usuarioAsignado
     *
     * @return solicitud
     */
    public function setUsuarioAsigId($usuarioasignado)
    {
        $this->usuario_asig_id = $usuarioasignado;

        return $this;
    }

    /**
     * Get usuarioAsigId
     *
     * @return int
     */
    public function getUsuarioasignado()
    {
        return $this->usuarioasignado;
    }

    /**
     * Set campoAfin
     *
     * @param string $campoAfin
     *
     * @return solicitud
     */
    public function setCampoAfin($campo_afin)
    {
        $this->campo_afin = $campo_afin;

        return $this;
    }

    /**
     * Get campoAfin
     *
     * @return string
     */
    public function getCampo_afin()
    {
        return $this->campo_afin;
    }
}

