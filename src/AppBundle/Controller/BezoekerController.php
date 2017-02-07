<?php

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Afdeling;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class BezoekerController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $this->addFlash(
            'notice',
            'Welkom!'
        );
        return $this->render('AppBundle:default:index.html.twig');
    }

    /**
     * @Route("/telefoonlijst", name="telefoonlijst")
     */
    public function telefoonlijstAction()
    {
        $contacten = $this->getDoctrine()
            ->getRepository('AppBundle:Contact')->findAll();

        return $this->render('AppBundle:default:telefoonlijst.html.twig',array('contacten'=>$contacten));
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detailAction(int $id)
    {
        $contact = $this->getDoctrine()
            ->getRepository('AppBundle:Contact')
            ->find($id);

        return $this->render('AppBundle:default:details.html.twig',array('contact'=>$contact));
    }

}
