<?php

namespace App\Form;

use App\Entity\Trip;
use App\Entity\User;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Time;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cityDeparture', TextType::class, [
                'label' => 'Ville de depart'
            ])
            ->add('dateDeparture', DateType::class)
            ->add('departureTime', TimeType::class)
            ->add('cityDestination', TextType::class, [
                'label' => 'Ville de destinantion'
            ])
            ->add('dateArrival', DateType::class)
            ->add('timeArrival', TimeType::class)
            ->add('numberPlaces', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
