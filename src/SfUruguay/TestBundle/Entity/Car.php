<?php

namespace SfUruguay\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Car
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Car
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=50)
     */
    private $brand;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="cars")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    public function setUsers($users)
    {
        $this->users->clear();
        foreach ($users as $user)
        {
            $this->users->add($user);
        }
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        $user->addCar($this);
        $this->users->add($user); // It's the same as: $this->users[] = $user;
        return $this;
    }

    public function __toString()
    {
        return $this->getBrand();
    }

    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }
}
