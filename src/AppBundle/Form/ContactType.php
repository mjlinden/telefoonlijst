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


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('voornaam', TextType::class
        , array('attr' => array(
        'placeholder' => 'voornaam invoeren')))
        ->add('achternaam', TextType::class)
        ->add('adres',TextType::class)
        ->add('plaats',TextType::class)
        ->add('postcode',TextType::class)

        ->add('telefoon',TextType::class)
        ->add('email',EmailType::class)
            ->add('afdeling',EntityType::class,
        array('class' => 'AppBundle:Afdeling',
            'choice_label'=>'naam',))

            ->add('opleidingen',EntityType::class,
                array('class'=>'AppBundle\Entity\Opleiding',
                    'choice_label'=>'naam',
                    'multiple'=>true,
                    'expanded'=>true,
                    ))
        ->add('foto',TextType::class);

     }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',

        ));
    }
}