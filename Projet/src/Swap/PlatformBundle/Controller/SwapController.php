<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swap\PlatformBundle\Entity\Membre;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Swap\PlatformBundle\Form\MembreType;

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
		$membre = new Membre();

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
}		


