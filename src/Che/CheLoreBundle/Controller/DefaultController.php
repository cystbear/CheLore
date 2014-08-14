<?php

namespace Che\CheLoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CheLoreBundle:Default:index.html.twig', array('name' => 'CheLore'));
    }
}
