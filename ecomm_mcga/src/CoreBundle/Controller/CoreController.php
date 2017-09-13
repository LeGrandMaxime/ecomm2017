<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    // La page d'accueil
  public function indexAction()
  {
    // On retourne simplement la vue de la page d'accueil
    return $this->get('templating')->renderResponse('CoreBundle:Core:index.html.twig');

    // La méthode raccourcie $this->render('...') est parfaitement valable
  }
}
