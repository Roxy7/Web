<?php

namespace Roxanne7\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	public function findActive()
	{
		  $qb = $this->createQueryBuilder('a');
		
		  $qb->where('a.active = :active')->setParameter('active', 1);
		
		  return $qb->getQuery()->getResult();
	}
	


}
