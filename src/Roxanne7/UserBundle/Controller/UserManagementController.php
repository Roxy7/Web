<?php

namespace Roxanne7\UserBundle\Controller;

use Roxanne7\UserBundle\Entity\User;
use Roxanne7\UserBundle\Form\Type\RegistrationFormType;
use Roxanne7\UserBundle\Form\Type\ProfileFormType;
use Roxanne7\UserBundle\Entity\Profile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;


class UserManagementController extends Controller
{

	public function RegisterAction(Request $request)
	{
		 
		$user = new User;
		$form = $this->get('form.factory')->create(new RegistrationFormType, $user);
		 
		$form->handleRequest($request);
		 
		// On vérifie que les valeurs entrées sont correctes
		// (Nous verrons la validation des objets en détail dans le prochain chapitre)
		if ($form->isValid()) {
			// On l'enregistre notre objet $advert dans la base de données, par exemple
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			 
			$request->getSession()->getFlashBag()->add('notice', 'User bien enregistrée.');
			 
			// On redirige vers la page de visualisation de l'annonce nouvellement créée
			return $this->redirect($this->generateUrl('Roxanne7_vinnity_index'));
		}
		
		return $this->render('Roxanne7UserBundle:Management:register.html.twig', array(
				'form' => $form->createView(),
		));
    
	}
	
	public function ProfileAction(Request $request)
	{

		$user = $this->getUser();
		if (!is_object($user) || !$user instanceof UserInterface) {
			throw new AccessDeniedException('This user does not have access to this section.');
		}
		/** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */

        $form = $this->get('form.factory')->create(new ProfileFormType, $user);


        $form->setData($user);

        
		$form->handleRequest($request);
			
		if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('Roxanne7_vinnity_index');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }

        return $this->render('Roxanne7UserBundle:Management:profile.html.twig', array(
            'form' => $form->createView()
        ));
	
	}
	
	
}
