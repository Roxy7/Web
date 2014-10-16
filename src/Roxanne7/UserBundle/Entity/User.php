<?php

namespace Roxanne7\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Roxanne7\UserBundle\Entity\UserRepository")
 */
class User
{
	
	/**
	 * @ORM\OneToOne(targetEntity="Roxanne7\UserBundle\Entity\Profile", cascade={"persist"})
	 
	 */
	private $profile;
	
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
     * @ORM\Column(name="pseudo", type="string", length=100)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=100)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, unique=true)
     */
    private $mail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificationDate", type="datetime")
     */
    private $modificationDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="external", type="integer")
     */
    private $external;

    /**
     * @var integer
     *
     * @ORM\Column(name="wantMail", type="integer")
     */
    private $wantMail;

    /**
     * @var string
     *
     * @ORM\Column(name="cle", type="string", length=32)
     */
    private $cle;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer")
     */
    private $active;

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
     * Set pseudoFieldType[string]:FieldLength[100]:100
     *
     * @param string $pseudoFieldType[string]:FieldLength[100]:100
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudoFieldType[string]:FieldLength[100]:100
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     * @return User
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime 
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set external
     *
     * @param integer $external
     * @return User
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * Get external
     *
     * @return integer 
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * Set wantMail
     *
     * @param integer $wantMail
     * @return User
     */
    public function setWantMail($wantMail)
    {
        $this->wantMail = $wantMail;

        return $this;
    }

    /**
     * Get wantMail
     *
     * @return integer 
     */
    public function getWantMail()
    {
        return $this->wantMail;
    }

    /**
     * Set cle
     *
     * @param string $cle
     * @return User
     */
    public function setCle($cle)
    {
        $this->cle = $cle;

        return $this;
    }

    /**
     * Get cle
     *
     * @return string 
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    public function __construct()
    {
    	$this->creationDate = new \Datetime();
    	$this->modificationDate = new \Datetime();
    	$this->active = 0;
    	$this->wantMail = 1;
    	$this->external = 0;
     }

    /**
     * Set profile
     *
     * @param \Roxanne7\UserBundle\Entity\Profile $profile
     * @return User
     */
    public function setProfile(\Roxanne7\UserBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Roxanne7\UserBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
