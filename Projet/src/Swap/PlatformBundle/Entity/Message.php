<?php

namespace Swap\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="Swap\PlatformBundle\Repository\CommentRepository")
 */
class Message
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
     * @ORM\Column(name="serviceId", type="integer", nullable=true)
     */
    private $serviceId;

    /**
     * @ORM\ManyToOne(targetEntity="Swap\UserBundle\Entity\User",inversedBy="sendMessage")
     * @ORM\JoinColumn(nullable=true)
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="recipient", type="integer", nullable=true)
     */
    private $recipient;

      /**
     * @var int
     *
     * @ORM\Column(name="parenId", type="integer", nullable=true)
     */
    private $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;


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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set service
     *
     * @param \Swap\PlatformBundle\Entity\Service $service
     *
     * @return Comment
     */
    public function setService(\Swap\PlatformBundle\Entity\Service $service)
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

    /**
     * Set author
     *
     * @param \Swap\UserBundle\Entity\User $author
     *
     * @return Comment
     */
    public function setAuthor(\Swap\UserBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Swap\UserBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set recipient
     *
     * @param 
     *
     * @return Comment
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return \Swap\UserBundle\Entity\User
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     *
     * @return Message
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return integer
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return Message
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }
}
