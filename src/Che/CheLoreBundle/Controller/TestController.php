<?php

namespace Che\CheLoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Che\CheLoreBundle\Document\Test;

class TestController extends FOSRestController
{
    /**
     * @View(templateVar="tests")
     * @ApiDoc(
     *  resource=true,
     *  section="Tests",
     *  description="Get all tests",
     *  output = "array<Che\CheLoreBundle\Document\Test> as tests",
     *  statusCodes={
     *      200="Returned when successful",
     *  }
     * )
     */
    public function getTestsAction()
    {
        return $this->getDoctrine()->getRepository('CheLoreBundle:Test')->findAll();
    }

    /**
     * @View()
     * @ApiDoc(
     *  resource=true,
     *  section="Tests",
     *  description="Get Test by slug",
     *  output = "Che\CheLoreBundle\Document\Test",
     *  statusCodes={
     *      200="Returned when successful",
     *      404="Returned when test with given slug is not found"
     *  }
     * )
     * @ParamConverter("test", class="CheLoreBundle:Test", options={"repository_method" = "findOneBySlug"})
     * @param Test $test
     * @return \Che\CheLoreBundle\Document\Test
     */
    public function getTestAction(Test $test)
    {
        return $test;
    }
}
