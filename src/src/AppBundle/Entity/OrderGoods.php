<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Table(name="order_goods")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\OrderGoodsRepository")
 */
class OrderGoods
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Order
     * @ORM\Column(name="id_order", type="integer", length=6)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order", referencedColumnName="id")
     * })
     */
    private $order;

    /**
     * @var \AppBundle\Entity\Good
     * @ORM\Column(name="id_good", type="integer", length=6)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Good")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="good", referencedColumnName="id")
     * })
     */
    private $good;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return Good
     */
    public function getGood()
    {
        return $this->good;
    }

    /**
     * @param Good $good
     */
    public function setGood(Good $good)
    {
        $this->good = $good;
    }
}
