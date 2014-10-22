<?php

namespace Roxanne7\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Roxanne7\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class User extends BaseUser
{
	
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
    	parent::__construct();
    	$this->roles = array('User' => 'ROLE_USERS');
    }
    
    
    

}
