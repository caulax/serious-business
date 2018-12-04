<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Table(name="e_order")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="id_user", type="string", length=255)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @ORM\ManyToMany(targetEntity="Good")
     * @ORM\JoinTable(
     * name="order_goods",
     * joinColumns={@ORM\JoinColumn(name="id_order", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="id_good", referencedColumnName="id")}
     * )
     */
    private $goods = [];

    public function removeGood(Good $good) {
        return $this->goods->removeElement($good);
    }

    /**
     * @return mixed
     */
    public function getGoods()
    {
        return $this->goods;
    }

    /**
     * @param mixed $goods
     */
    public function setGoods($goods)
    {
        $this->goods[] = $goods;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $id
     */
    public function setUser($id)
    {
        $this->user = $id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}
