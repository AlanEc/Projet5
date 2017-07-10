<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swap\UserBundle\Entity\User;
use Swap\UserBundle\Entity\UserInscription;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Swap\UserBundle\Form\UserType;
use Swap\UserBundle\Form\UserInscriptionType;

class ProfilController extends Controller
{
  public function accountAction()
  {
  	$session = new Session();
  	$idMembre = $session->get('id');
    return $this->render('SwapPlatformBundle:Swap:monCompte.html.twig');
  }

  public function profilAction(Request $request)
  {

  	$session = new Session();
  	$idMembre = $session->get('id');

    $repository = $this
    ->getDoctrine()
    ->getManager()
    ->getRepository('SwapUserBundle:User')
    ;

    $membre = $repository->findOneBy(
      array('id' => $idMembre)
    );

		$formBuilder = $this->get('form.factory')->create(UserType::class, $membre);
		$form = $this->container->get('Swap_form.FormCreator');
    $creationForm = $form->creation($formBuilder, $request, $membre);

		return $this->render('SwapPlatformBundle:Swap:profil.html.twig', array(
		'form' => $formBuilder->createView(),
		));
  }

	public function inscriptionAction(Request $request)
  {
    $session = new Session();
		$membreInscription = new User();
		$formBuilder = $this->get('form.factory')->create(UserInscriptionType::class, $membreInscription);

		if ($request->isMethod('POST')) {
		    $formBuilder->handleRequest($request);

  		if ($formBuilder->isValid()) {
  		$em = $this->getDoctrine()->getManager();
  		$membreInscription->setEnabled(true);
  		$em->persist($membreInscription);
  		$em->flush();
  		}

  		$idMembre = $membreInscription->getId();
  		$session->set('id', $idMembre);
  		return $this->redirectToRoute('swap_platform_moncompte');
		}

		return $this->render('SwapPlatformBundle:Swap:inscription.html.twig', array(
		'form' => $formBuilder->createView(),
		));
	}
}		


