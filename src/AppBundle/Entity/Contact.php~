<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-2016
 * Time: 12:47
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="contacten")
 */

class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="User", mappedBy="contact")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="vul voornaam in")
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="vul achternaam in")
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="selecteer een image")
     */
    private $foto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)

     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $plaats;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $telefoon;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     *
     *  @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     * * @Assert\NotBlank(message="vul emailadres in")
     */
    private $email;


    /**
     * @ORM\ManyToOne(targetEntity="Afdeling", inversedBy="contacts")
     * @ORM\JoinColumn(name="afdeling_id", referencedColumnName="id")
     */
    private $afdeling;

    /**
     * Many Contacts have Many Opleidingen.
     * @ORM\ManyToMany(targetEntity="Opleiding", inversedBy="contacts")
     * @ORM\JoinTable(name="diploma")
     */
    private $opleidingen;

    public function __construct($vnaam,$anaam) {
        $this->opleidingen = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setVoornaam($vnaam);
        $this->setAchternaam("$anaam");
        $this->setFoto("default.jpg");
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
     * Set voornaam
     *
     * @param string $voornaam
     *
     * @return Contact
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     *
     * @return Contact
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    /**
     * Get achternaam
     *
     * @return string
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    public function getNaam()
    {
        return $this->voornaam .' '. $this->achternaam;
    }
    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Contact
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Contact
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Contact
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set plaats
     *
     * @param string $plaats
     *
     * @return Contact
     */
    public function setPlaats($plaats)
    {
        $this->plaats = $plaats;

        return $this;
    }

    /**
     * Get plaats
     *
     * @return string
     */
    public function getPlaats()
    {
        return $this->plaats;
    }


    /**
     * Set telefoon
     *
     * @param string $telefoon
     *
     * @return Contact
     */
    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;

        return $this;
    }

    /**
     * Get telefoon
     *
     * @return string
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
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
     * Set afdeling
     *
     * @param \AppBundle\Entity\Afdeling $afdeling
     *
     * @return Contact
     */
    public function setAfdeling(\AppBundle\Entity\Afdeling $afdeling = null)
    {
        $this->afdeling = $afdeling;

        return $this;
    }

    /**
     * Get afdeling
     *
     * @return \AppBundle\Entity\Afdeling
     */
    public function getAfdeling()
    {
        return $this->afdeling;
    }

    /**
     * Add opleidingen
     *
     * @param \AppBundle\Entity\Opleiding $opleidingen
     *
     * @return Contact
     */
    public function addOpleidingen(\AppBundle\Entity\Opleiding $opleidingen)
    {
        $this->opleidingen[] = $opleidingen;

        return $this;
    }

    /**
     * Remove opleidingen
     *
     * @param \AppBundle\Entity\Opleiding $opleidingen
     */
    public function removeOpleidingen(\AppBundle\Entity\Opleiding $opleidingen)
    {
        $this->opleidingen->removeElement($opleidingen);
    }

    /**
     * Get opleidingen
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOpleidingen()
    {
        return $this->opleidingen;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Contact
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
