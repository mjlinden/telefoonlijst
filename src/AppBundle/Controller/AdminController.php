<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\AppBundle;
use AppBundle\Entity\Afdeling;
use AppBundle\Entity\Contact;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("admin/beheer", name="beheer")
     */
    public function beheerAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users=$userManager->findUsers();
        return $this->render('@App/default/beheer.html.twig',array('users'=>$users));
    }



    /**
     * @Route("/admin/reset/{id}", name="reset")
     */
    public function resetAction(int $id, Request $request )
    {

        $userManager = $this->get('fos_user.user_manager');
        $user=$userManager->findUserBy(array('id'=>$id));
        $user->setPlainPassword("qwerty");
        $userManager->updateUser($user);
        $this->addFlash(
            'notice',
            'wachtwoord reset!'
        );
        return $this->redirectToRoute('beheer');

    }

    /**
     * @Route("/admin/delete/{id}", name="delete")
     */
    public function deleteAction(int $id)
    {
        //$userManager = $this->get('fos_user.user_manager');
        //$user=$userManager->findUserBy(array('id'=>$id));



        //$userManager->deleteUser($user);
       $em=$this->getDoctrine()->getManager();
        $user= $this->getDoctrine()
           ->getRepository('AppBundle:User')->find(array('id'=>$id));
        $em->remove($user);
       $em->flush();

        $this->addFlash(
            'notice',
            'contact verwijderd!'
        );
        return $this->redirectToRoute('beheer');
    }

    /**
     * @Route("/admin/add", name="add")
     */

    public function addAction(Request $request)
    {
        // create a user and a contact
        $defaultData=[];

        $form = $this->createForm(UserType::class, $defaultData);
        $form->add('save', SubmitType::class, array('label'=>"toevoegen"));

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();

            $userManager = $this->get('fos_user.user_manager');
            $user=$userManager->createUser();
            $user->setUsername($data['gebruikersnaam']);
            $user->setPlainPassword($data['wachtwoord']);

            $user->setEnabled(true);
            $user->contact=new Contact($data['voornaam'],$data['achternaam']);
            $userManager->updateUser($user);


            $this->addFlash(
                'notice',
                'user toegevoegd!'
            );
            return $this->redirectToRoute('beheer');
        }
        return $this->render('AppBundle:default:user.html.twig',array('form'=>$form->createView(),
            'title'=>'Toevoegen van een mederwerker'));


    }
}
