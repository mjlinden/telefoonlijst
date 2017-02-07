<?php
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('voornaam', TextType::class
                , array('attr' => array(
                    'placeholder' => 'voornaam invoeren')))
            ->add('achternaam', TextType::class
                , array('attr' => array(
                    'placeholder' => 'achternaam invoeren')))
            ->add('gebruikersnaam', TextType::class
            , array('attr' => array('placeholder' => 'username invoeren')
            , 'constraints' => array(
                        new NotBlank(),
                        new Length(array('min' => 4))
                    )))
            ->add('wachtwoord', TextType::class
                , array('attr' => array('placeholder' => 'password invoeren')
                , 'constraints' => array(
                        new NotBlank(),
                        new Length(array('min' => 4))
                    )));





    }
}