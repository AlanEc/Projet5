<?php

namespace Swap\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * Membre
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Swap\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    protected $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255, nullable=true)
     */
    protected $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    protected $profession;

    /**
     * @ORM\OneToMany(targetEntity="Swap\PlatformBundle\Entity\Service", mappedBy="user", cascade={"persist"}))
     * @ORM\JoinColumn(nullable=true)
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity="Swap\PlatformBundle\Entity\Message", mappedBy="user", cascade={"persist"}))
     * @ORM\JoinColumn(nullable=true)
     */
    private $sendMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    // *
    //  * @ORM\Column(name="roles", type="array")
     
    // protected $roles = array();

    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="verificationMotDePasse", type="string", length=255, nullable=false)
     */
    private $verificationMotDePasse;


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
     * Set username
     *
     * @param string $username
     *
     * @return Membre
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Membre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Membre
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return Membre
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Membre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Membre
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

     public function getSalt()
    {
        return $this->salt;
    }

     public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set verificationMotDePasse
     *
     * @param string $verificationMotDePasse
     *
     * @return Membre
     */
    public function setVerificationMotDePasse($verificationMotDePasse)
    {
        $this->verificationMotDePasse = $verificationMotDePasse;

        return $this;
    }

    /**
     * Get verificationMotDePasse
     *
     * @return string
     */
    public function getVerificationMotDePasse()
    {
        return $this->verificationMotDePasse;
    }

    /**
     * Add service
     *
     * @param \Swap\PlatformBundle\Entity\Service $service
     *
     * @return User
     */
    public function addService(\Swap\PlatformBundle\Entity\Service $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \Swap\PlatformBundle\Entity\Service $service
     */
    public function removeService(\Swap\PlatformBundle\Entity\Service $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Add sendMessage
     *
     * @param \Swap\PlatformBundle\Entity\Message $sendMessage
     *
     * @return User
     */
    public function addSendMessage(\Swap\PlatformBundle\Entity\Message $sendMessage)
    {
        $this->sendMessage[] = $sendMessage;

        return $this;
    }

    /**
     * Remove sendMessage
     *
     * @param \Swap\PlatformBundle\Entity\Message $sendMessage
     */
    public function removeSendMessage(\Swap\PlatformBundle\Entity\Message $sendMessage)
    {
        $this->sendMessage->removeElement($sendMessage);
    }

    /**
     * Get sendMessage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSendMessage()
    {
        return $this->sendMessage;
    }
}
