<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/user/profiel/", name="profiel")
     */
    public function indexAction()
    {
        $id=$this->getUser()->contact->getId();

        $contact = $this->getDoctrine()
            ->getRepository('AppBundle:Contact')
            ->find($id);
        return $this->render('@App/default/profiel.html.twig',array('contact'=>$contact));
    }

    /**
     * @Route("/user/edit/", name="edit")
     */
    public function editAction( Request $request )
    {
        $id=$this->getUser()->getContact()->getId();

        $contact = $this->getDoctrine()
            ->getRepository('AppBundle:Contact')
            ->find($id);
        $form = $this->createForm(ContactType::class, $contact);
        $form->add('save', SubmitType::class, array('label'=>"aanpassen"));


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the contact (no queries yet)
            $em->persist($contact);


            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
            $this->addFlash(
                'notice',
                'contact aangepast!'
            );
            return $this->redirectToRoute('profiel');
        }

        return $this->render('AppBundle:default:contact.html.twig',array('form'=>$form->createView(),
            'title'=>'Profiel aanpassen'));

    }
}
