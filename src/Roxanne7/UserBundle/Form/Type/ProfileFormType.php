<?php
namespace Roxanne7\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileFormType extends AbstractType
{
	
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
	
	
	
		// add your custom field
		$builder
		->add('username')
		->add('name')
		->add('email')
		->add('save',      'submit');

	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Roxanne7\UserBundle\Entity\User'
		));
	}
	
/*	
	public function getParent()
	{
		return 'fos_user_profile';
	}
	
*/	
	public function getName()
	{
		return 'roxanne7_user_profile';
	}
	
}