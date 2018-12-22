<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estatu
 *
 * @ORM\Table(name="estatu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstatuRepository")
 */
class Estatu
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
     * @var bool
     *
     * @ORM\Column(name="espera", type="boolean")
     */
    private $espera;

    /**
     * @var bool
     *
     * @ORM\Column(name="proceso", type="boolean")
     */
    private $proceso;

    /**
     * @var bool
     *
     * @ORM\Column(name="terminado", type="boolean")
     */
    private $terminado;

    /**
     * @var bool
     *
     * @ORM\Column(name="cancelado", type="boolean")
     */
    private $cancelado;

    /**
     * @var bool
     *
     * @ORM\Column(name="pausado", type="boolean")
     */
    private $pausado;

    /**
     * @var bool
     *
     * @ORM\Column(name="asignado", type="boolean")
     */
    private $asignado;


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
     * Set espera
     *
     * @param boolean $espera
     *
     * @return Estatu
     */
    public function setEspera($espera)
    {
        $this->espera = $espera;

        return $this;
    }

    /**
     * Get espera
     *
     * @return bool
     */
    public function getEspera()
    {
        return $this->espera;
    }

    /**
     * Set proceso
     *
     * @param boolean $proceso
     *
     * @return Estatu
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get proceso
     *
     * @return bool
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set terminado
     *
     * @param boolean $terminado
     *
     * @return Estatu
     */
    public function setTerminado($terminado)
    {
        $this->terminado = $terminado;

        return $this;
    }

    /**
     * Get terminado
     *
     * @return bool
     */
    public function getTerminado()
    {
        return $this->terminado;
    }

    /**
     * Set cancelado
     *
     * @param boolean $cancelado
     *
     * @return Estatu
     */
    public function setCancelado($cancelado)
    {
        $this->cancelado = $cancelado;

        return $this;
    }

    /**
     * Get cancelado
     *
     * @return bool
     */
    public function getCancelado()
    {
        return $this->cancelado;
    }

    /**
     * Set pausado
     *
     * @param boolean $pausado
     *
     * @return Estatu
     */
    public function setPausado($pausado)
    {
        $this->pausado = $pausado;

        return $this;
    }

    /**
     * Get pausado
     *
     * @return bool
     */
    public function getPausado()
    {
        return $this->pausado;
    }

    /**
     * Set asignado
     *
     * @param boolean $asignado
     *
     * @return Estatu
     */
    public function setAsignado($asignado)
    {
        $this->asignado = $asignado;

        return $this;
    }

    /**
     * Get asignado
     *
     * @return bool
     */
    public function getAsignado()
    {
        return $this->asignado;
    }
}

