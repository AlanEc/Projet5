<?php

namespace Swap\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="Swap\PlatformBundle\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\ManyToOne(targetEntity="Swap\UserBundle\Entity\User",inversedBy="services")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=true)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="ModeResa", type="string", length=255, nullable=true)
     */
    private $modeResa;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrePersonnes", type="integer", nullable=true)
     */
    private $nombrePersonnes;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="vegetarien", type="string", length=255, nullable=true)
     */
    private $vegetarien;


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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Service
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set modeResa
     *
     * @param string $modeResa
     *
     * @return Service
     */
    public function setModeResa($modeResa)
    {
        $this->modeResa = $modeResa;

        return $this;
    }

    /**
     * Get modeResa
     *
     * @return string
     */
    public function getModeResa()
    {
        return $this->modeResa;
    }

    /**
     * Set nombrePersonnes
     *
     * @param integer $nombrePersonnes
     *
     * @return Service
     */
    public function setNombrePersonnes($nombrePersonnes)
    {
        $this->nombrePersonnes = $nombrePersonnes;

        return $this;
    }

    /**
     * Get nombrePersonnes
     *
     * @return int
     */
    public function getNombrePersonnes()
    {
        return $this->nombrePersonnes;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Service
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set vegetarien
     *
     * @param string $vegetarien
     *
     * @return Service
     */
    public function setVegetarien($vegetarien)
    {
        $this->vegetarien = $vegetarien;

        return $this;
    }

    /**
     * Get vegetarien
     *
     * @return string
     */
    public function getVegetarien()
    {
        return $this->vegetarien;
    }

    /**
     * Set user
     *
     * @param \Swap\UserBundle\Entity\User $user
     *
     * @return Service
     */
    public function setUser(\Swap\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Swap\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
