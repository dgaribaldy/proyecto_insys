<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioCampoAfin
 *
 * @ORM\Table(name="usuario_campo_afin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioCampoAfinRepository")
 */
class UsuarioCampoAfin
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
     * @var int
     *
     * @ORM\Column(name="usuarioid", type="integer")
     */
    private $usuarioid;

    /**
     * @var string
     *
     * @ORM\Column(name="campoAfin", type="string", length=255)
     */
    private $campoAfin;


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
     * Set usuarioid
     *
     * @param integer $usuarioid
     *
     * @return usuarioCampoAfin
     */
    public function setUsuarioid($usuarioid)
    {
        $this->usuarioid = $usuarioid;

        return $this;
    }

    /**
     * Get usuarioid
     *
     * @return int
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Set campoAfin
     *
     * @param string $campoAfin
     *
     * @return usuarioCampoAfin
     */
    public function setCampoAfin($campoAfin)
    {
        $this->campoAfin = $campoAfin;

        return $this;
    }

    /**
     * Get campoAfin
     *
     * @return string
     */
    public function getCampoAfin()
    {
        return $this->campoAfin;
    }
}

