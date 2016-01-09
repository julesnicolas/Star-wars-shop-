<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EshopBundle\Entity\products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $products = $em->getRepository('EshopBundle:products')->findall();

        if (!$products) {
            throw $this->createNotFoundException('Unable to find Products entity.');
        }

        return $this->render('EshopBundle:frontend:index.html.twig', array(
            'products' => $products,
        ));


    }
}
