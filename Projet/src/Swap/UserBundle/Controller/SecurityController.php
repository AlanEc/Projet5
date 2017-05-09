<?php

// src/Swap/UserBundle/Controller/SecurityController.php;
namespace Swap\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller

{

  public function loginAction(Request $request)

  {
    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirectToRoute('swap_platform_moncompte');
    }

    $authenticationUtils = $this->get('security.authentication_utils');

    return $this->render('SwapUserBundle:Security:login.html.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),
    ));
  }

  public function inscriptionAction(Request $request)
  {
      return $this->render('SwapUserBundle:Security:inscription.html.twig');
  }

}