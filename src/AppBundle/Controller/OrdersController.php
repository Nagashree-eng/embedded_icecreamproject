<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Orders;
use AppBundle\Form\OrdersType;
use Epita\CrmBundle\Entity\Category;
use Epita\CrmBundle\Form\Type\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class OrdersController extends Controller
{

    /**
     * @Route("/orders")
     */
    public function homeAction()
    {
        return $this->render('AppBundle::home.html.twig');
    }

    /**
     * @Route("/icecreamorder", name="icecreamorder")
     * @Template()
     */
    public function icecreamorderAction(Request $request)
    {
        $user = new Orders();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(OrdersType::class,$user);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $totalamount = $this->container->get('calculate')->addamount($user);

                $user->setAmount($totalamount);
                $em->persist($user);
                $em->flush();

            }
        }
        return $this->render('AppBundle:Orders:index.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("{id}/editorder", name="editorder")
     * @Template()
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editorderAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Orders')->find($id);
        $form = $this->createForm(OrdersType::class,$user);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $totalamount = $this->container->get('calculate')->addamount($user);

                $user->setAmount($totalamount);
                $em->persist($user);
                $em->flush();

            }
        }
        return $this->render('AppBundle:Orders:edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}

