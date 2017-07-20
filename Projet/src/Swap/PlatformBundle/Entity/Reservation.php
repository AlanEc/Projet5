<?php

namespace Swap\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="Swap\PlatformBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // *
    //  * @var string
    //  *
    //  * @ORM\Column(name="statut", type="string", length=255)
     
    // private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDeparture", type="date", length=255)
     */
    private $dateDeparture;

    /**
     * @var string
     *
     * @ORM\Column(name="dateArrival", type="date", length=255)
     */
    private $dateArrival;

    /**
     * @ORM\ManyToOne(targetEntity="Swap\UserBundle\Entity\User",inversedBy="reservationsMade")
     * @ORM\JoinColumn(nullable=true)
     */
    private $UserReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=255)
     */
    private $service;

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
     * Set status
     *
     * @param string $status
     *
     * @return Reservation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateDeparture
     *
     * @param string $dateDeparture
     *
     * @return Reservation
     */
    public function setDateDeparture($dateDeparture)
    {
        $this->dateDeparture = $dateDeparture;

        return $this;
    }

    /**
     * Get dateDeparture
     *
     * @return string
     */
    public function getDateDeparture()
    {
        return $this->dateDeparture;
    }

    /**
     * Set dateArrival
     *
     * @param string $dateArrival
     *
     * @return Reservation
     */
    public function setDateArrival($dateArrival)
    {
        $this->dateArrival = $dateArrival;

        return $this;
    }

    /**
     * Get dateArrival
     *
     * @return string
     */
    public function getDateArrival()
    {
        return $this->dateArrival;
    }

    /**
     * Set userReservation
     *
     * @param \Swap\UserBundle\Entity\User $userReservation
     *
     * @return Reservation
     */
    public function setUserReservation(\Swap\UserBundle\Entity\User $userReservation = null)
    {
        $this->UserReservation = $userReservation;

        return $this;
    }

    /**
     * Get userReservation
     *
     * @return \Swap\UserBundle\Entity\User
     */
    public function getUserReservation()
    {
        return $this->UserReservation;
    }

    /**
     * Set service
     *
     * @param \Swap\PlatformBundle\Entity\Service $service
     *
     * @return Reservation
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Swap\PlatformBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

}
