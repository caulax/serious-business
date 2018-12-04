<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Table(name="user_goods")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserGoodsRepository")
 */
class UserGoods
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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Good
     *
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
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
