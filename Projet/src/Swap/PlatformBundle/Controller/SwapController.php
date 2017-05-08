<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swap\PlatformBundle\Entity\Membre;
use Swap\PlatformBundle\Entity\MembreInscription;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Swap\PlatformBundle\Form\MembreType;
use Swap\PlatformBundle\Form\MembreInscriptionType;

class SwapController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwapPlatformBundle:Swap:index.html.twig');
    }

    public function compteAction()
    {
        return $this->render('SwapPlatformBundle:Swap:monCompte.html.twig');
    }

    public function modalAction()
    {
        return $this->render('SwapPlatformBundle:Swap:modal.html.twig');
    }

    public function profilAction(Request $request)
    {
    	$session = new Session();
    	$idMembre = $session->get('id');

		$repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('SwapPlatformBundle:Membre')
          ;

        $membre = $repository->findOneBy(
          array('id' => $idMembre)
          );

		$formBuilder = $this->get('form.factory')->create(MembreType::class, $membre);

		if ($request->isMethod('POST')) {
		$formBuilder->handleRequest($request);

			if ($formBuilder->isValid()) {
			$em = $this->getDoctrine()->getManager();

			$em->persist($membre);

			$em->flush();
			}
		}

		return $this->render('SwapPlatformBundle:Swap:profil.html.twig', array(
		'form' => $formBuilder->createView(),
		));
	}

	public function inscriptionAction(Request $request)
    {
    	$session = new Session();

		$membreInscription = new Membre();

		$formBuilder = $this->get('form.factory')->create(MembreInscriptionType::class, $membreInscription);

		if ($request->isMethod('POST')) {
		$formBuilder->handleRequest($request);

			if ($formBuilder->isValid()) {
			$em = $this->getDoctrine()->getManager();

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


