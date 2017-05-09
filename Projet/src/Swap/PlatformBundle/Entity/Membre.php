<?php

namespace Swap\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="Swap\PlatformBundle\Repository\MembreRepository")
 */
class Membre implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="verificationMotDePasse", type="string", length=255, nullable=false)
     */
    private $verificationMotDePasse;

    public function eraseCredentials()

  {

  }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
}

