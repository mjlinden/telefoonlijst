<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *  @ORM\AttributeOverrides({
 *              @ORM\AttributeOverride(name="email", column=@ORM\Column(nullable=true)),
 *              @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(nullable=true, unique=false))
 * })
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Contact", inversedBy="user", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    public $contact;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return User
     */
    public function setContact(\AppBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \AppBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }
}
