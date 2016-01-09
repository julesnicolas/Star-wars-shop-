<?php
namespace EshopBundle\Controller;

use EshopBundle\Entity\products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $product = $em->getRepository('EshopBundle:products')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        return $this->render('EshopBundle:frontend:view.html.twig', array(
            'product' => $product,
        ));
    }

    public function addAction(Request $request)
    {
        $advert = new products();


        $form = $this->get('form.factory')->createBuilder('form', $advert)

        ->add('datetime', 'date')
        ->add('title',    'text')
        ->add('abstract', 'text')
        ->add('content',  'textarea')
        ->add('price',   'number')
        ->add('status', 'checkbox', array('required' => false))
        ->add('categories', 'entity', array(
            'class'    => 'EshopBundle:categories',
            'property' => 'title',
            'multiple' => false,
            'expanded' => false
        ))
        ->add('save',   'submit')
        ->getForm();


        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');


            return $this->redirect($this->generateUrl('eshop_newproduct_view', array('id' => $advert->getId())));

        }

        return $this->render('EshopBundle:backend:add.html.twig', array(
            'form' => $form->createView(),

        ));

    }

    public function editAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('EshopBundle:products')->find($id);

        if (null === $advert) {

            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");

        }

        $form = $this->get('form.factory')->createBuilder('form', $advert)

            ->add('datetime', 'date')
            ->add('title',    'text')
            ->add('abstract', 'text')
            ->add('content',  'textarea')
            ->add('price',   'number')
            ->add('status', 'checkbox', array('required' => false))
            ->add('categories', 'entity', array(
                'class'    => 'EshopBundle:categories',
                'property' => 'title',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('save',   'submit')
            ->getForm();


        if ($form->handleRequest($request)->isValid()) {

            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirect($this->generateUrl('eshop_newproduct_view', array('id' => $advert->getId())));

        }

        return $this->render('EshopBundle:backend:edit.html.twig', array(

            'form' => $form->createView(),

            'advert' => $advert

        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('EshopBundle:products')->find($id);


        if (null === $advert) {

            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");

        }

        $form = $this->createFormBuilder()->getForm();


        if ($form->handleRequest($request)->isValid()) {

            $em->remove($advert);

            $em->flush();


            $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");


            return $this->redirect($this->generateUrl('eshop_home'));

        }

        return $this->render('EshopBundle:backend:delete.html.twig', array(

            'advert' => $advert,

            'form'   => $form->createView()

        ));

    }


}
