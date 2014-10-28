<?php

namespace Roxanne7\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		
		
		parent::buildForm($builder, $options);
		
		// add your custom field
		$builder
			->add('name', null, array('label' => 'form.name', 'translation_domain' => 'Roxanne7UserBundle'))
			->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'Roxanne7UserBundle'))
			->add('username', null, array('label' => 'form.username', 'translation_domain' => 'Roxanne7UserBundle'))
			->add('plainPassword', 'repeated', array(
				'type' => 'password',
				'options' => array('translation_domain' => 'Roxanne7UserBundle'),
				'first_options' => array('label' => 'form.password'),
				'second_options' => array('label' => 'form.password_confirmation'),
				'invalid_message' => 'fos_user.password.mismatch',
			))
			->add('save',      'submit')
		;
		
	}

/*	
	public function getParent()
	{
		return 'fos_user_registration';
	}
*/

	public function getName()
	{
		return 'roxanne7_user_registration';
	}
	
	
}