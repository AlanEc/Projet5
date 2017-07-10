<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swap\PlatformBundle\Entity\Serivce;
use Swap\PlatformBundle\Form\ServiceType;
use Swap\PlatformBundle\Form\ServiceDetailsType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Swap\PlatformBundle\Entity\Service;
use Swap\UserBundle\Entity\User;

class SwapController extends Controller
{
	public function addSwapAction(Request $request)
    {
    	$service = new Service();
    	$user = new User();
    	$formBuilder = $this->get('form.factory')->create(ServiceType::class, $service);
    	$form = $this->container->get('Swap_form.FormCreator');
      $creationForm = $form->creation($formBuilder, $request, $service);
 
		if ($formBuilder->isValid()) { return $this->redirectToRoute('swap_ajouter_service_details', array(
      'id' => $service->getId()
      )); }

      return $this->render('SwapPlatformBundle:Service:ajouterSwap.html.twig', array(
      'form' => $formBuilder->createView(),
      ));
    }

    public function detailsSwapAction($id, Request $request)
    {
  		$repository = $this
  		->getDoctrine()
  		->getManager()
  		->getRepository('SwapPlatformBundle:Service')
  		;

      $user = $this->getUser(); 
  		$service = $repository->find($id);

      $formBuilder = $this->get('form.factory')->create(ServiceDetailsType::class, $service);
  		$form = $this->container->get('Swap_form.FormCreator');
  		$creationForm = $form->creation($formBuilder, $request, $service);

      $service->setUser($user);
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

  		return $this->render('SwapPlatformBundle:Service:detailsSwap.html.twig', array(
  		'form' => $formBuilder->createView(),
  		));
   	}

    public function searchAction()
    {
      $repository = $this
      ->getDoctrine()
      ->getManager()
      ->getRepository('SwapPlatformBundle:Service')
      ;

      $listSwaps = $repository->findAll();

    	return $this->render('SwapPlatformBundle:Service:searchSwap.html.twig', array(
      'listSwaps' => $listSwaps
      ));
   	}
}