<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swap\PlatformBundle\Entity\Serivce;
use Swap\PlatformBundle\Form\MessageType;
use Swap\PlatformBundle\Form\ServiceDetailsType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Swap\PlatformBundle\Entity\Service;
use Swap\UserBundle\Entity\User;
use Swap\PlatformBundle\Entity\Message;

class MessageController extends Controller
{
	public function sendMessageAction($id, $idUser, Request $request)
    {
    	$message = new Message();
    	$formBuilder = $this->get('form.factory')->create(MessageType::class, $message);
    	$form = $this->container->get('Swap_form.FormCreator');
        $creationForm = $form->creation($formBuilder, $request, $message);

        $user = $this->getUser(); 
 
		if ($formBuilder->isValid()) { 
			// return $this->redirectToRoute('swap_ajouter_service_details', array(
   //        'id' => $service->getId()
   //        ));

		$message->setAuthor($user);
		$message->setServiceId($id);
		$message->setRecipient($idUser);
		$em = $this->getDoctrine()->getManager();
        $em->persist($message);
		$em->flush(); }

		return $this->render('SwapPlatformBundle:Service:messageSwap.html.twig', array(
		'form' => $formBuilder->createView(),
		));
    }

    public function mailBoxAction(Request $request) 
    {
    	$idUser = $this->getUser()->getId();
    	
		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('SwapPlatformBundle:Message')
		;

		$listMessage = $repository->findBy(
			array('recipient' => $idUser));

    	return $this->render('SwapPlatformBundle:Service:mailBox.html.twig', array(
		'listMessage' => $listMessage
		));
    }

    public function conversationAction($id, $recipientId, Request $request) 
    {
    	$message = new Message();
    	$formBuilder = $this->get('form.factory')->create(MessageType::class, $message);
    	$form = $this->container->get('Swap_form.FormCreator');
        $creationForm = $form->creation($formBuilder, $request, $message);

        $user = $this->getUser(); 
        $repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('SwapPlatformBundle:Message')
		;

		$listMessage = $repository->findBy(
			array('parentId' => $id));
 
		if ($formBuilder->isValid()) { 
			// return $this->redirectToRoute('swap_ajouter_service_details', array(
   //        'id' => $service->getId()
   //        ));

		$message->setAuthor($user);
		$message->setParentId($id);
		$message->setRecipient($recipientId);
		$em = $this->getDoctrine()->getManager();
        $em->persist($message);
		$em->flush(); }

    	return $this->render('SwapPlatformBundle:Message:conversation.html.twig', array(
    	'listMessage' => $listMessage,
		'form' => $formBuilder->createView(),
		));
    }
}