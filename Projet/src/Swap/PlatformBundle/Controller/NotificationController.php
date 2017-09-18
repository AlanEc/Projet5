<?php

namespace Swap\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NotificationController extends Controller
{
	function deleteAction($id)
	{
		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('SwapPlatformBundle:Reservation')
		;

		$reservation = $repository->findOneBy(
		array('id' => $id));
 		$reservation->DeleteNotification();

		$user = $this->getUser(); 
   		$date = new \Datetime();
   		$em = $this->getDoctrine()->getManager();
   		$em->persist($user);
        $em->flush();

	    return $this->render('SwapPlatformBundle:Swap:monCompte.html.twig', array(
	    'user' => $user,
	    'reservations' => $user->getReservationsMade(),
	    'servicesToRender' => $user->getUserReservation(),
	    'date' => $date
	    ));
	}
}