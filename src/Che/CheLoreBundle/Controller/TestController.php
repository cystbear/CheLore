<?php

namespace Che\CheLoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Che\CheLoreBundle\Document\Test;

/**
 * @Route("/tests")
 */
class TestController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     * @Template
     */
    public function listAction()
    {
        return ['tests' => $this->getDoctrine()->getRepository('CheLoreBundle:Test')->findAll()];
    }

    /**
     * @Route("/{slug}")
     * @Method("GET")
     * @Template("CheLoreBundle:Test:show.html.twig", vars={"test"})
     * @param Test $test
     */
    public function showAction(Test $test)
    {
    }
}
